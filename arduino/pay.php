<?php
require_once '../init.php';

$client_id = HttpMethod::getValue(Config::$ARDUINO_CLIENT_ID_KEY); 

// TODO: implement

if(strlen($client_id) > 0) {
	echo Config::$ARDUINO_WRITE_DATA_OK;
} else {
	echo Config::$ARDUINO_WRITE_DATA_ERROR;
}
?>