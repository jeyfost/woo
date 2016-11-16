<?php

include("connect.php");

$pointResult = $mysqli->query("SELECT * FROM woo_price WHERE id = '".$mysqli->real_escape_string($_POST['id'])."'");
$point = $pointResult->fetch_array();

$unitResult = $mysqli->query("SELECT * FROM woo_units");

echo "
	<form method='post'>
		<label for='pricePointNameInput'>Название:</label>
		<br />
		<input type='text' name='pricePointName' id='pricePointNameInput' value='".$point['service']."' />
		<br /><br />
		<label for='pricePointPriceInput'>Стоимость:</label>
		<br />
		<input type='number' name='pricePointPrice' id='pricePointPriceInput' value='".$point['price']."' />
		<br /><br />
		<label for='pricePointUnit'>Единица измерения:</label>
		<br />
		<select name='pricePointUnitSelect' id='pricePointUnitSelect'>
";

while($unit = $unitResult->fetch_assoc()) {
	echo "<option value='".$unit['id']."'"; if($unit['id'] == $point['id']) {echo " selected";} echo ">".$unit['unit']."</option>";
}

echo "
		</select>
		<br /><br />
		<label for='pricePointDescription'>Описание:</label>
		<br />
		<textarea id='pricePointDescription' onkeydown='textAreaHeight(this)'>".$point['description']."</textarea>
		<br /><br />
		<div id='admButton6' onmouseover='admButtonMouseEvents(1, \"admButton6\")' onmouseout='admButtonMouseEvents(0, \"admButton6\")' onclick='pricePointEdit()'>
			<span class='nameFont'>Редактировать</span>
			<div class='overlay' id='buttonOverlay'></div>
		</div>
	</form>
";