<?php

include("connect.php");

$categoryResult = $mysqli->query("SELECT * FROM woo_price WHERE category = '".$mysqli->real_escape_string($_POST['id'])."'");

echo "
	<label for='priceSelect'>Пункт прайса:</label>
	<br />
	<select name='priceSelect' id='priceSelect' onchange='pricePointSelect()'>
		<option disabled selected>- Выберите раздел -</option>
";

while($category = $categoryResult->fetch_assoc()) {
	echo "<option value='".$category['id']."'>".$category['service']."</option>";
}

echo "
	</select>
	<br /><br />
	<div id='pricePointContainer'></div>
";