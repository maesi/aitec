<?php
require_once '../init.php';
$client = HttpMethod::getGetValue(Config::$AJAX_CLIENT_ID_KEY);

$sql = "SELECT daylight, moisture, measuredate FROM arduino_data";
$stmt = $db->prepare($sql);
$stmt->execute();
$stmt->bind_result($daylight, $moisture, $measuredate);
$first = true;
$daylight_arr = array();
$moisture_arr = array();
$counter = 1;
while($stmt->fetch()) {
	array_push($daylight_arr, array($counter ,$daylight));
	array_push($moisture_arr, array($counter ,$moisture));
	$counter ++;
}
echo json_encode(array($daylight_arr, $moisture_arr));
?>
