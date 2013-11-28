<?php
function __autoload($class_name) {
	$ext = '.php';
	$class_dir = dirname ( __FILE__ ).'/class/';
	$file = $class_dir. $class_name . $ext;
	@include_once $file;
}

$db = new mysqli(Config::$DB_HOST, Config::$DB_USER, Config::$DB_PW, Config::$DB_NAME);
?>