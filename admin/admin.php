<?php

session_start();

const SECRET_LOGIN = "gospozha";

if(!isset($_SESSION['userID']) or $_SESSION['userID'] != 1) {
	header("Location: ../index.php");
}

include("../scripts/connect.php");

$userResult = $mysqli->query("SELECT * FROM users WHERE id = '".$_SESSION['userID']."'");
$user = $userResult->fetch_assoc();

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

    <title>Панель администрирования</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="../js/admMenu.js"></script>
	<script type="text/javascript" src="../js/admin.js"></script>

</head>

<body>
	<div id="upperMenu">
		<div class="umc">
			<div class="umc" style="padding-left: 0;"><img src="../img/admin/favicon.png" style="margin-top: 14px;" /></div>
			<div style="margin-top: 11px; relative; float: left;">
				<b>Система управления сайтом</b>
				<br />
				woowoo.ru
			</div>
		</div>
		<div class="uml"></div>
		<a href="../index.php" target="_blank" onmouseover="umcBG(1, 'umc2')" onmouseout="umcBG(0, 'umc2')">
			<div class="umc" id="umc2">
				<div class="umc" style="padding-left: 0;"><img src="../img/admin/monitor.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Просмотр сайта
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="pages/addWork.php" onmouseover="umcBG(1, 'umc3')" onmouseout="umcBG(0, 'umc3')">
			<div class="umc" id="umc3">
				<div class="umc" style="padding-left: 0;"><img src="../img/admin/add.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Добавить работу
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="pages/editWork.php" onmouseover="umcBG(1, 'umc4')" onmouseout="umcBG(0, 'umc4')">
			<div class="umc" id="umc4">
				<div class="umc" style="padding-left: 0;"><img src="../img/admin/edit.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Редактирование работ
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="pages/deleteWork.php" onmouseover="umcBG(1, 'umc5')" onmouseout="umcBG(0, 'umc5')">
			<div class="umc" id="umc5">
				<div class="umc" style="padding-left: 0;"><img src="../img/admin/delete.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Удаление работ
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="pages/text.php" onmouseover="umcBG(1, 'umc6')" onmouseout="umcBG(0, 'umc6')">
			<div class="umc" id="umc6">
				<div class="umc" style="padding-left: 0;"><img src="../img/admin/text.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Редактирование текстов
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="pages/account.php" onmouseover="umcBG(1, 'umc7')" onmouseout="umcBG(0, 'umc7')">
			<div class="umc" id="umc7">
				<div class="umc" style="padding-left: 0;"><img src="../img/admin/settings.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Управление учётной записью
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="pages/exit.php" onmouseover="umcBG(1, 'umc8')" onmouseout="umcBG(0, 'umc8')">
			<div class="umc" id="umc8">
				<div class="umc" style="padding-left: 0;"><img src="../img/admin/exit.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Выход
				</div>
			</div>
		</a>
		<div class="uml"></div>
	</div>

	<center>
		<table style="vertical-align: middle; margin-top: 80px;">
			<tbody>
				<tr>
					<td><h1>Добро пожаловать, <span style="color: #a22222; font-weight: bold;"><?= $user['login'] ?></span></h1></td>
					<?php
						if($user['login'] == SECRET_LOGIN) {
							echo "<td style='width: 150px;'><img src='/img/admin/whip.png' /></td>";
						}
					?>
				</tr>
			</tbody>
		</table>
		<br /><br />
		<span style="font-size: 24px;">Для начала работы нужно выбрать действие в меню &uarr;</span>
		<?php
			if($user['login'] == SECRET_LOGIN) {
				echo "
					<br /><br />
					<span style='font-size: 20px; color: #a22222; font-weight: bold;'>Дa будет боль!</span>
				";
			}
		?>
	</center>

</body>

</html>