<?php
function __autoload($class_name) {
	$ext = '.php';
	$class_dir = dirname ( __FILE__ ).'/class/';
	$file = $class_dir. $class_name . $ext;
	@require_once $file;
}

require_once dirname ( __FILE__ ).'/../aitec.db.conf.inc.php';
?>