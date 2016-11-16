<?php

include("connect.php");

$id = $mysqli->real_escape_string($_POST['id']);
$name = $mysqli->real_escape_string($_POST['name']);
$price = $mysqli->real_escape_string($_POST['price']);
$unit = $mysqli->real_escape_string($_POST['unit']);
$description = $mysqli->real_escape_string($_POST['description']);

if($mysqli->query("UPDATE woo_price SET service = '".$name."', price = '".$price."', unit = '".$unit."', description = '".$description."' WHERE id = '".$id."'")) {
	echo "a";
} else {
	echo "b";
}