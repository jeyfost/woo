<?php

session_start();

include("connect.php");

$login = $mysqli->real_escape_string($_POST['login']);
$password = md5(md5($mysqli->real_escape_string($_POST['password'])));

if($mysqli->query("UPDATE users SET login = '".$login."', password = '".$password."' WHERE id = '".$_SESSION['userID']."'")) {
	echo "a";
} else {
	echo "b";
}