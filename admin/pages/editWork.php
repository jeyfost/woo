<?php

session_start();

include("../../scripts/connect.php");

if($_SESSION['userRole'] != ADMINISTRATOR) {
	header("Location: ../index.php");
}

?>

<!doctype html>

<html>

<head>

    <meta charset="utf-8">

    <link rel='stylesheet' type='text/css' href='../../css/style.css'>
	<link rel='stylesheet' type='text/css' href='../../js/shadowbox/shadowbox.css'>

    <link rel="icon" href="../../img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">

    <link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

    <title>Панель администрирования</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="../../js/admMenu.js"></script>
	<script type="text/javascript" src="../../js/admEditWork.js"></script>
	<script type="text/javascript" src="../../js/shadowbox/shadowbox.js"></script>

</head>

<body>
	<div id="upperMenu">
		<div class="umc">
			<div class="umc" style="padding-left: 0;"><img src="../../img/admin/favicon.png" style="margin-top: 14px;" /></div>
			<div style="margin-top: 11px; relative; float: left;">
				<b>Система управления сайтом</b>
				<br />
				woowoo.ru
			</div>
		</div>
		<div class="uml"></div>
		<a href="../../index.php" target="_blank" onmouseover="umcBG(1, 'umc2')" onmouseout="umcBG(0, 'umc2')">
			<div class="umc" id="umc2">
				<div class="umc" style="padding-left: 0;"><img src="../../img/admin/monitor.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Просмотр сайта
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="addWork.php" onmouseover="umcBG(1, 'umc3')" onmouseout="umcBG(0, 'umc3')">
			<div class="umc" id="umc3">
				<div class="umc" style="padding-left: 0;"><img src="../../img/admin/add.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Добавить работу
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="editWork.php" onmouseover="umcBG(1, 'umc4')" onmouseout="umcBG(0, 'umc4')">
			<div class="umc" id="umc4" style="background-color: #595959;">
				<div class="umc" style="padding-left: 0;"><img src="../../img/admin/edit.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Редактирование работ
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="deleteWork.php" onmouseover="umcBG(1, 'umc5')" onmouseout="umcBG(0, 'umc5')">
			<div class="umc" id="umc5">
				<div class="umc" style="padding-left: 0;"><img src="../../img/admin/delete.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Удаление работ
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="text.php" onmouseover="umcBG(1, 'umc6')" onmouseout="umcBG(0, 'umc6')">
			<div class="umc" id="umc6">
				<div class="umc" style="padding-left: 0;"><img src="../../img/admin/text.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Редактирование текстов
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="account.php" onmouseover="umcBG(1, 'umc7')" onmouseout="umcBG(0, 'umc7')">
			<div class="umc" id="umc7">
				<div class="umc" style="padding-left: 0;"><img src="../../img/admin/settings.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Управление учётной записью
				</div>
			</div>
		</a>
		<div class="uml"></div>
		<a href="exit.php" onmouseover="umcBG(1, 'umc8')" onmouseout="umcBG(0, 'umc8')">
			<div class="umc" id="umc8">
				<div class="umc" style="padding-left: 0;"><img src="../../img/admin/exit.png" style="margin-top: 21px;" /></div>
				<div style="margin-top: 18px; relative; float: left;">
					Выход
				</div>
			</div>
		</a>
		<div class="uml"></div>
	</div>
	<div style="clear: both;"></div>

	<div id="adminContent">
		<h1>Редактирование работ</h1>
		<div style="font-size: 18px; margin-top: -20px;">Раздел редактирования работ</div>
		<br /><br />
		<form method="post" enctype="multipart/form-data" id="editWorkForm" name="editWorkForm" action="../../scripts/editWork.php">
			<div id="admResponseField" style="opacity: 1; <?php if(isset($_SESSION['editWork']) and $_SESSION['editWork'] == "ok") {echo "color: #53acff;";} else {echo "color: #a22222;";} ?>">
				<?php
					if(isset($_SESSION['editWork'])) {
						switch($_SESSION['editWork']) {
							case "ok":
								echo "Работа успешно отредактирована.";
								break;
							case "none":
								echo "Изменения не были зафиксированы.";
								break;
							default: break;
						}
						echo "<br /><br />";
						unset($_SESSION['editWork']);
					}
				?>
			</div>
			<label for="editWorkCategory">Раздел:</label>
			<br />
			<select id="editWorkCategory" name="editWorkCategory" onchange="categorySelect()">
				<option disabled selected>- Выберите раздел -</option>
				<?php
					$categoryResult = $mysqli->query("SELECT * FROM works_categories");
					while($category = $categoryResult->fetch_assoc()) {
						echo "<option value='".$category['id']."'>".$category['category_name']."</option>";
					}
				?>
			</select>
			<div id="editContainer"></div>
		</form>
	</div>

</body>

</html>