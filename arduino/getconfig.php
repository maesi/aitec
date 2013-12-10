<?php
require_once '../init.php';
echo ConfigReader::getConfig(HttpMethod::getValue(Config::$ARDUINO_CONFIG_KEY), $db);
?>