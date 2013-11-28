<?php
require_once '../init.php';

switch(HttpMethod::getValue(Config::$ARDUINO_CONFIG_KEY)) {
	case Config::$ARDUINO_CONFIG_MOISTURE:
		$field = "moisture_threshold";
		break;
	case Config::$ARDUINO_CONFIG_DAYLIGHT:
		$field = "daylight_threshold";
		break;
	case Config::$ARDUINO_CONFIG_COST:
		$field = "beer_cost";
		break;
	default:
		echo "INVALID KEY OR VALUE";
		exit;
}

$sql = "SELECT " . $field . " FROM arduino_config";
$stmt = $db->prepare($sql);
$stmt->execute();
$stmt->bind_result($value);
$stmt->fetch();

echo $value;
?>