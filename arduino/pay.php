<?php
require_once '../init.php';

$client_id = HttpMethod::getValue(Config::$ARDUINO_CLIENT_ID_KEY); 

if(PayHandler::pay($client_id, $db)) {
	echo Config::$ARDUINO_WRITE_DATA_OK;
} else {
	echo Config::$ARDUINO_WRITE_DATA_ERROR;
}
?>