<?php
class BeerHandler {
	
	public static function create($client_id, $arduino_data_id, $db) {
		$id = self::search($client_id, $db);
		if($id < 1) {
			$sql = "
				INSERT INTO arduino_beer (start_data_id) VALUES (?)
			";
			$stmt = $db->prepare($sql);
			$stmt->bind_param('i', $arduino_data_id);
			$stmt->execute();
		}
	}
	
	public static function close($client_id, $db) {
		$id = self::search($client_id, $db);
		if(strlen($id) > 0) {
			$sql = "
				UPDATE arduino_beer SET end_data_id= (
					SELECT MAX( id ) 
					FROM arduino_data
					WHERE client_id=?
					GROUP BY client_id
				)
				WHERE id=?
			";
			$stmt = $db->prepare($sql);
			$stmt->bind_param('ii', $client_id, $id);
			$stmt->execute();
		}
	}
	
	private static function search($client_id, $db) {
		$sql = "
			SELECT b.id 
			FROM arduino_beer AS b
			INNER JOIN arduino_data AS d ON b.start_data_id = d.id
			WHERE b.end_data_id IS NULL AND d.client_id=?
		";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('i', $client_id);
		$stmt->execute();
		$stmt->bind_result($beer_id);
		$stmt->fetch();
		return $beer_id;
		
	}
	
	public static function pay($client_id, $bill_id, $db) {
		$openBeers = self::searchNotPayed($client_id, $db);
		$sql = "
			UPDATE arduino_beer SET bill_id=? WHERE id=?
		";
		$stmt = $db->prepare($sql);
		foreach ($openBeers as $beer_id) {
			$stmt->bind_param('ii', $bill_id, $beer_id);
			$stmt->execute();
		}
	}
	
	public static function notPayedBeerCount($client_id, $db) {
		return count(self::searchNotPayed($client_id, $db));
	}
	
	private static function searchNotPayed($client_id, $db) {
		$sql = "
			SELECT b.id 
			FROM arduino_beer AS b
			INNER JOIN arduino_data AS d ON b.start_data_id = d.id
			WHERE d.client_id=? AND b.bill_id IS NULL;
		";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('i', $client_id);
		$stmt->execute();
		$stmt->bind_result($beer_id);
		$ret = array();
		while($stmt->fetch()) {
			array_push($ret, $beer_id);
		}
		return $ret;
		
	}
	
}