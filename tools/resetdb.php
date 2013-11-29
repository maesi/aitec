<?php
require_once '../init.php';

$file = file_get_contents('../sql/dbscript_arduino.sql');

if($db->multi_query($file)) {
	echo "Datenbank frisch erstellt.";
} else {
	echo "Fehler beim erstellen der Datenbank<br />";
	echo $db->errno . ": " . $db->error;
}