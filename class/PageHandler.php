<?php
class PageHandler {
	
	public static function getCurrentPageUrl() {
		$ret = "?";
		if(isset($_GET[Config::$PAGE_KEY])) {
			$ret .= Config::$PAGE_KEY."=".$_GET[Config::$PAGE_KEY];
			
		}
		return $ret;
	}
	
}