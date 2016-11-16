<?php

include("connect.php");

$id = $mysqli->real_escape_string($_POST['id']);

$photoResult = $mysqli->query("SELECT * FROM woo_works_photos WHERE id = '".$id."'");
$photo = $photoResult->fetch_assoc();

if($mysqli->query("DELETE FROM woo_works_photos WHERE id = '".$id."'")) {
	unlink("../img/works/small/".$photo['small']);
	unlink("../img/works/big/".$photo['big']);

	echo "a";
} else {
	echo "b";
}