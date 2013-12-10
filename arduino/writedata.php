<?php
require_once '../init.php';

$client_id = HttpMethod::getValue(Config::$ARDUINO_CLIENT_ID_KEY); 
$daylight = HttpMethod::getValue(Config::$ARDUINO_DATA_DAYLIGHT_KEY); 
$moisture = HttpMethod::getValue(Config::$ARDUINO_DATA_MOISTURE_KEY); 

echo DataWriter::writeData($client_id, $daylight, $moisture, $db);

?>