<?php

include("connect.php");

$text = $mysqli->real_escape_string($_POST['text']);

if($mysqli->query("UPDATE woo_price_categories SET category = '".$text."' WHERE id = '".$mysqli->real_escape_string($_POST['id'])."'")) {
	echo "a";
} else {
	echo "b";
}