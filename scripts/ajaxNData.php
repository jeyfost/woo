<?php

include("connect.php");

$textResult = $mysqli->query("SELECT n_text FROM woo_text");
$text = $textResult->fetch_array(MYSQLI_NUM);

echo $text[0];