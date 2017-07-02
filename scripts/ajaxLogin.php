<?php

session_start();

include("connect.php");

$login = $mysqli->real_escape_string($_POST['login']);
$password = md5(md5($mysqli->real_escape_string($_POST['password'])));

$dataResult = $mysqli->query("SELECT * FROM users WHERE login = '".$login."'");
$data = $dataResult->fetch_assoc();

if($data['password'] == $password) {
	$_SESSION['userID'] = $data['id'];
	$_SESSION['userRole'] = $data['role'];
	echo "a";
} else {
	echo "b";
}