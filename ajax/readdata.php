<?php
require_once '../init.php';
$client = HttpMethod::getGetValue(Config::$AJAX_CLIENT_ID_KEY);

$sql = "SELECT daylight, moisture, measuredate FROM arduino_data";
$stmt = $db->prepare($sql);
$stmt->execute();
$stmt->bind_result($daylight, $moisture, $measuredate);
$first = true;
$return = array();
while($stmt->fetch()) {
	$arr = array($daylight, $moisture, $measuredate);
	array_push($return, $arr);
}
echo json_encode($return);
?>
