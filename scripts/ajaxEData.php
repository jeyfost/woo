<?php

include("connect.php");

$textResult = $mysqli->query("SELECT e_text FROM text");
$text = $textResult->fetch_array(MYSQLI_NUM);

echo $text[0];