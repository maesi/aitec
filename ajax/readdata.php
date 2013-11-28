<?php
require_once '../init.php';
$client = HttpMethod::getGetValue(Config::$AJAX_CLIENT_ID_KEY);

$sql = "SELECT daylight, moisture, measuredate FROM arduino_data";
$stmt = $db->prepare($sql);
$stmt->execute();
$stmt->bind_result($daylight, $moisture, $measuredate);
$first = true;
while($stmt->fetch()) {
	if($first) {
		$first = false;
	} else {
		echo Config::$LINE_SEPARATOR;
	}
	echo $daylight . Config::$DATA_SEPARATOR . $moisture . Config::$DATA_SEPARATOR . $measuredate;
}
?>