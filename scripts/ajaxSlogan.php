<?php

include("connect.php");

$text = $mysqli->real_escape_string(nl2br($_POST['text']));

if($mysqli->query("UPDATE woo_text SET about_slogan = '".$text."'")) {
	echo "a";
} else {
	echo "b";
}