<?php
	include('config.php');
	include('const.php');

	$mysqli = new mysqli($host, $user, $password, $db);

	if(!$mysqli)
	{
		printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
	}
	
	$mysqli->query("SET NAMES 'UTF-8'");
	$mysqli->query("SET CHARACTER SET 'UTF-8'");
	$mysqli->query("SET SESSION collation_connection = 'utf8_general_ci';");