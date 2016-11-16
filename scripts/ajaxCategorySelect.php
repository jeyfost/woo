<?php

include("connect.php");

$workResult = $mysqli->query("SELECT * FROM woo_works WHERE category = '".$mysqli->real_escape_string($_POST['category'])."' ORDER by name");

echo "<br /><br /><label for='editWorkSelect'>Работа:</label><br /><select id='editWorkSelect' name='editWorkSelect' onchange='workSelect()'><option disabled selected>- Выберите работу -</option>";

while($work = $workResult->fetch_assoc()) {
	echo "<option value='".$work['id']."'>".$work['name']."</option>";
}

echo "</select><div id='editWorkContainer'></div>";