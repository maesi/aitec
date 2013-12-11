<?php
class ConfigReader {

	public static function getConfig($key, $db) {
		$field = self::getField($key);
		if($field != null) {
		
			$sql = "SELECT " . $field . " FROM arduino_config";
			$stmt = $db->prepare($sql);
			$stmt->execute();
			$stmt->bind_result($value);
			$stmt->fetch();
			return $value;
		}
		return null;
	}
	
	public static function getAll($db) {
		$ret = "moisture_threshold".self::getConfig(Config::$ARDUINO_CONFIG_MOISTURE_EMPTY, $db)."-";
		$ret .= "daylight_threshold".self::getConfig(Config::$ARDUINO_CONFIG_DAYLIGHT, $db)."-";
		$ret .= "beer_cost".self::getConfig(Config::$ARDUINO_CONFIG_COST, $db)."-";
		return $ret;
	}

	private static function getField($key) {
		$field = null;
		switch($key) {
			case Config::$ARDUINO_CONFIG_MOISTURE_EMPTY:
				$field = "moisture_threshold_empty";
				break;
			case Config::$ARDUINO_CONFIG_MOISTURE_FULL:
				$field = "moisture_threshold_full";
				break;
			case Config::$ARDUINO_CONFIG_DAYLIGHT:
				$field = "daylight_threshold";
				break;
			case Config::$ARDUINO_CONFIG_COST:
				$field = "beer_cost";
				break;
		}
		return $field;
	}

}