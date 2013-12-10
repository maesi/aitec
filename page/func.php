<?php 
$new_action = 'new';
if(isset($_GET[$new_action])) {
	BeerHandler::close($_POST['client'], $db);
}
$new_action_url	= PageHandler::getCurrentPageUrl()."&".$new_action;
?>
<form action='<?php echo $new_action_url; ?>' method='post'>
	<table>
		<!-- <tr>
			<td><label for="client">Client-ID</label></td>
			<td><input name="client" type='number' value='1' /></td>
		</tr>-->
		<tr>
			<td><input name="client" type='hidden' value='1' /></td>
			<td><input type="submit" value='Neues Bier bestellen' /></td>
		</tr>
	</table>
</form>

<?php 
$pay_action = 'pay';
if(isset($_GET[$pay_action])) {
	PayHandler::pay($_POST['client'], $db);
}
$pay_action_url	= PageHandler::getCurrentPageUrl()."&".$pay_action;
?>

<form action='<?php echo $pay_action_url; ?>' method='post'>
<input name="client" type='hidden' value='1' /><input type="submit" value='Bezahlen' />
</form>
<?php 
	echo BeerHandler::notPayedBeerCount(1, $db) . " Bier(e) noch nicht bezahlt.";
?>
