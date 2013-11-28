<?php
require_once '../init.php';

$client_id = HttpMethod::getValue(Config::$ARDUINO_CLIENT_ID_KEY); 
$daylight = HttpMethod::getValue(Config::$ARDUINO_DATA_DAYLIGHT_KEY); 
$moisture = HttpMethod::getValue(Config::$ARDUINO_DATA_MOISTURE_KEY); 

$stmt = $db->prepare("INSERT INTO arduino_data (client_id, daylight, moisture) VALUES (?, ?, ?)");
$stmt->bind_param("iii", $client_id, $daylight, $moisture);
if($stmt->execute()) {
	echo Config::$ARDUINO_WRITE_DATA_OK;
} else {
	echo Config::$ARDUINO_WRITE_DATA_ERROR;
}

?>