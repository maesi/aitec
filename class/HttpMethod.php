<?php

class HttpMethod  {
	
	public static function getValue($key) {
		if(Config::$ARDUINO_USE_HTTP_POST) {
			return self::getPostValue($key);
		} else {
			return self::getGetValue($key);
		}
	}
	
	public static function getPostValue($key) {
		return @$_POST[$key];
	}
	
	public static function getGetValue($key) {
		return @$_GET[$key];
	}
}
?>