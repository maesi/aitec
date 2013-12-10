<?php
class DataWriter {
	public static function writeData($client_id, $daylight, $moisture, $db) {
		$stmt = $db->prepare("INSERT INTO arduino_data (client_id, daylight, moisture) VALUES (?, ?, ?)");
		$stmt->bind_param("iii", $client_id, $daylight, $moisture);
		if($stmt->execute()) {
			if($moisture < ConfigReader::getConfig(Config::$ARDUINO_CONFIG_MOISTURE_EMPTY, $db)) {
				BeerHandler::close($client_id, $db);
			} else if($moisture > ConfigReader::getConfig(Config::$ARDUINO_CONFIG_MOISTURE_FULL, $db)) {
				BeerHandler::create($client_id, $stmt->insert_id, $db);
			}
			return Config::$ARDUINO_WRITE_DATA_OK;
		} else {
			return Config::$ARDUINO_WRITE_DATA_ERROR;
		}
	}
}