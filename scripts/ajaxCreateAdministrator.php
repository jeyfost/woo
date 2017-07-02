<?php
/**
 * Created by PhpStorm.
 * User: jeyfost
 * Date: 02.07.2017
 * Time: 14:53
 */

include("connect.php");

$login = $mysqli->real_escape_string($_POST['login']);
$password = md5(md5($mysqli->real_escape_string($_POST['password'])));

$loginCheckResult = $mysqli->query("SELECT COUNT(id) FROM users WHERE login = '".$login."'");
$loginCheck = $loginCheckResult->fetch_array(MYSQLI_NUM);

if($loginCheck[0] == 0) {
	if($mysqli->query("INSERT INTO users (login, role, password) VALUES ('".$login."', '".ADMINISTRATOR."', '".$password."')")) {
		echo "a";
	} else {
		echo "b";
	}
} else {
	echo "c";
}