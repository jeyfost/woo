<?php

include("connect.php");

$workResult = $mysqli->query("SELECT * FROM woo_works WHERE category = '".$mysqli->real_escape_string($_POST['category'])."'");

echo "
		<br />
		<label for='deleteWorkSelect'>Работа:</label>
		<br />
		<select id='deleteWorkSelect' name='deleteWorkSelect' onchange='showDeleteButton()'>
		<option disabled selected>- Выберете работу -</option>
	";

while($work = $workResult->fetch_assoc()) {
	echo "<option value='".$work['id']."'>".$work['name']."</option>";
}

echo "
	</select>
	<div id='deleteButtonContainer'></div>
";