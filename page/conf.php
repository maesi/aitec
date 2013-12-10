<?php 
	$action = 'save';
	if(isset($_GET[$action])) {
		$stmt = $db->prepare("UPDATE arduino_config SET moisture_threshold_empty=?, moisture_threshold_full=?, daylight_threshold=?, beer_cost=?");
		$stmt->bind_param('iiid', $_POST['moisture_empty'], $_POST['moisture_full'], $_POST['daylight'], $_POST['cost']);
		if($stmt->execute()) {
			echo "Konfiguration gespeichert.";
		} else {
			echo "Fehler beim speichern der Konfiguration";
		}
	}

	$stmt = $db->prepare("SELECT moisture_threshold_empty, moisture_threshold_full, daylight_threshold, beer_cost FROM arduino_config");
	$stmt->execute();
	$stmt->bind_result($moisture_threshold_empty, $moisture_threshold_full, $daylight_threshold, $beer_cost);
	$stmt->fetch();
	
	$action_url	= PageHandler::getCurrentPageUrl()."&".$action;
?>
<form action='<?php echo $action_url; ?>' method='post'>
	<table>
		<tr>
			<td><label for='moisture'>Grenzwert (Feuchtigkeit leer)</label></td>
			<td><input name='moisture_empty' type='number' min='0' max='1000' value='<?php echo $moisture_threshold_empty; ?>' /></td>
		</tr>
		<tr>
			<td><label for='moisture'>Grenzwert (Feuchtigkeit voll)</label></td>
			<td><input name='moisture_full' type='number' min='0' max='1000' value='<?php echo $moisture_threshold_full; ?>' /></td>
		</tr>
		<tr>
			<td><label for='daylight'>Grenzwert (Tageslicht)</label></td>
			<td><input name='daylight' type='number' min='0' max='1000' value='<?php echo $daylight_threshold; ?>' /></td>
		</tr>
		<tr>
			<td><label for="cost">Preis pro Bier</label></td>
			<td><input name="cost" type='number' step='any' value='<?php echo $beer_cost; ?>' /></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" value='Speichern' /></td>
		</tr>
	</table>
</form>
