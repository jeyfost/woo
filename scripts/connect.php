<?php
	include('config.php');
	
	$mysqli = new mysqli($host, $user, $password, $db);

	if(!$mysqli)
	{
		printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
	}
	
	$mysqli->query("SET NAMES 'UTF-8'");
	$mysqli->query("SET CHARACTER SET 'UTF-8'");