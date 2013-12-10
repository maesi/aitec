<?php
class PayHandler {
	
	public static function pay($client_id, $db) {
		self::createBill($client_id, $db);
		return true;
	}
	
	private static function createBill($client_id, $db) {
		$refills = BeerHandler::notPayedBeerCount($client_id, $db);
		$total = ConfigReader::getConfig(Config::$ARDUINO_CONFIG_COST, $db) * $refills;
		$sql = "
			INSERT INTO arduino_bills (client_id, refills, beer_cost) VALUES (?,?,?)
		";
		$stmt = $db->prepare($sql);
		$stmt->bind_param('iid', $client_id, $refills, $total);
		if($stmt->execute()) {
			BeerHandler::pay($client_id, $stmt->insert_id, $db);
		}
		
	}
	
}