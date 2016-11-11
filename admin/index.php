<?php

session_start();

if(isset($_SESSION['userID']) and $_SESSION['userID'] == 1) {
	header("Location: admin.php");
}

?>

<!doctype html>

<html>

<head>

    <meta charset="utf-8">

    <link rel='stylesheet' type='text/css' href='../css/style.css'>

    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

    <link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

    <title>Вход в панель администрирования</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="../js/admin.js"></script>

</head>

<body style="text-align: center;">
	<div style="margin-top: 40px; width: 100%;">
		<span style="font-size: 29px;">Вход в панель администрирования</span>
	</div>

	<div id="enterForm">
		<form method="post" id="admEnterForm">
			<div id="admResponseField"></div>
			<label for="admLogin">Логин:</label>
			<br />
			<input type="text" name="admLogin" id="admLogin" />
			<br /><br />
			<label for="admPassword">Пароль:</label>
			<br />
			<input type="password" name="admPassword" id="admPassword" />
			<br /><br />
			<div id="button">
				<span class="nameFont">Войти</span>
				<div class="overlay" id="buttonOverlay"></div>
			</div>
		</form>
	</div>

</body>

</html>