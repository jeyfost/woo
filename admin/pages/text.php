<?php

session_start();

if(!isset($_SESSION['userID']) or $_SESSION['userID'] != 1) {
	header("Location: ../index.php");
}

include("../../scripts/connect.php");

if(!empty($_REQUEST['action'])) {
	$action = $mysqli->real_escape_string($_REQUEST['action']);
}

?>

<!doctype html>

<html>

<head>

    <meta charset="utf-8">

    <link rel='stylesheet' type='text/css' href='../../css/style.css'>

    <link rel="icon" href="../../img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">

    <link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

    <title>Панель администрирования</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="../../js/admMenu.js"></script>
	<script type="text/javascript" src="../../js/admText.js"></script>

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
			<div class="umc" id="umc4">
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
			<div class="umc" id="umc6" style="background-color: #595959;">
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

	<div id="leftMenu">
		<div class="lmc" style="font-size: 24px; font-family: 'Open Sans Condensed', sans-serif;">Главная</div>
		<a href="text.php?action=1" <?php if($action != 1) {echo "onmouseover='lmcBG(1, \"lmc1\")' onmouseout='lmcBG(0, \"lmc1\")'";} ?>>
			<div class="lmc" id="lmc1" style="margin-top: 10px; <?php if($action == 1) {echo "background-color: #2e2e2e;";} ?>">
				<div style="position: relative; float: left; margin-top: 3px;"><img src="../../img/admin/info.png" /></div>
				<div style="margin-left: 5px; position: relative; float: left;">Текст "Кто мы?"</div>
			</div>
		</a>
		<a href="text.php?action=2" <?php if($action != 2) {echo "onmouseover='lmcBG(1, \"lmc2\")' onmouseout='lmcBG(0, \"lmc2\")'";} ?>>
			<div class="lmc" id="lmc2" <?php if($action == 2) {echo "style='background-color: #2e2e2e;'";} ?>>
				<div style="position: relative; float: left; margin-top: 3px;"><img src="../../img/admin/e.png" /></div>
				<div style="margin-left: 5px; position: relative; float: left;">Текст о Жене</div>
			</div>
		</a>
		<a href="text.php?action=3" <?php if($action != 3) {echo "onmouseover='lmcBG(1, \"lmc3\")' onmouseout='lmcBG(0, \"lmc3\")'";} ?>>
			<div class="lmc" id="lmc3" <?php if($action == 3) {echo "style='background-color: #2e2e2e;'";} ?>>
				<div style="position: relative; float: left; margin-top: 3px;"><img src="../../img/admin/n.png" /></div>
				<div style="margin-left: 5px; position: relative; float: left;">Текст о Наташе</div>
			</div>
		</a>
		<a href="text.php?action=4" <?php if($action != 4) {echo "onmouseover='lmcBG(1, \"lmc4\")' onmouseout='lmcBG(0, \"lmc4\")'";} ?>>
			<div class="lmc" id="lmc4" <?php if($action == 4) {echo "style='background-color: #2e2e2e;'";} ?>>
				<div style="position: relative; float: left; margin-top: 3px;"><img src="../../img/admin/slogan.png" /></div>
				<div style="margin-left: 5px; position: relative; float: left;">Слоган</div>
			</div>
		</a>
		<div class="lml"></div>
		<div class="lmc" style="font-size: 24px; font-family: 'Open Sans Condensed', sans-serif; margin-top: 10px;">Прайс</div>
		<a href="text.php?action=5" <?php if($action != 5) {echo "onmouseover='lmcBG(1, \"lmc5\")' onmouseout='lmcBG(0, \"lmc5\")'";} ?>>
			<div class="lmc" id="lmc5" style="margin-top: 10px; <?php if($action == 5) {echo "background-color: #2e2e2e;";} ?>">
				<div style="position: relative; float: left; margin-top: 3px;"><img src="../../img/admin/division.png" /></div>
				<div style="margin-left: 5px; position: relative; float: left;">Разделы</div>
			</div>
		</a>
		<a href="text.php?action=6" <?php if($action != 6) {echo "onmouseover='lmcBG(1, \"lmc6\")' onmouseout='lmcBG(0, \"lmc6\")'";} ?>>
			<div class="lmc" id="lmc6" <?php if($action == 6) {echo "style='background-color: #2e2e2e;'";} ?>>
				<div style="position: relative; float: left; margin-top: 3px;"><img src="../../img/admin/dollar.png" /></div>
				<div style="margin-left: 5px; position: relative; float: left;">Пункты прайса</div>
			</div>
		</a>
		<div class="lml"></div>
	</div>

	<div id="adminContent">
		<?php
			switch($_REQUEST['action']) {
				case "1":
					$textResult = $mysqli->query("SELECT team_text FROM woo_text");
					$text = $textResult->fetch_array(MYSQLI_NUM);
					$text = str_replace("<br />", "", $text[0]);

					echo "
						<h1>Текст \"Кто мы?\"</h1>
						<div style='font-size: 18px; margin-top: -20px;'>Текст находится на главной странице возле фотографий</div>
						<br /><br />
						<form id='aboutTextForm' method='post'>
							<div id='admResponseField'></div>
							<label for='aboutTextTextarea'>Текст:</label>
							<br />
							<textarea name='aboutTextTextarea' id='aboutTextTextarea' class='admTextarea' onkeydown='textAreaHeight(this)'>".$text."</textarea>
							<br /><br />
							<div id='admButton1'>
								<span class='nameFont'>Редактировать</span>
							</div>
						</form>
					";
					break;
				case "2":
					$textResult = $mysqli->query("SELECT e_text FROM woo_text");
					$text = $textResult->fetch_array(MYSQLI_NUM);
					$text = str_replace("<br />", "", $text[0]);

					echo "
						<h1>Текст о Жене</h1>
						<div style='font-size: 18px; margin-top: -20px;'>Текст появляется при наведении курсора на фотографию Жени на главной странице</div>
						<br /><br />
						<form id='aboutTextForm' method='post'>
							<div id='admResponseField'></div>
							<label for='aboutTextTextarea'>Текст:</label>
							<br />
							<textarea name='aboutTextTextarea' id='aboutTextTextarea' class='admTextarea' onkeydown='textAreaHeight(this)'>".$text."</textarea>
							<br /><br />
							<div id='admButton2'>
								<span class='nameFont'>Редактировать</span>
							</div>
						</form>
					";
					break;
				case "3":
					$textResult = $mysqli->query("SELECT n_text FROM woo_text");
					$text = $textResult->fetch_array(MYSQLI_NUM);
					$text = str_replace("<br />", "", $text[0]);

					echo "
						<h1>Текст о Наташе</h1>
						<div style='font-size: 18px; margin-top: -20px;'>Текст появляется при наведении курсора на фотографию Наташи на главной странице</div>
						<br /><br />
						<form id='aboutTextForm' method='post'>
							<div id='admResponseField'></div>
							<label for='aboutTextTextarea'>Текст:</label>
							<br />
							<textarea name='aboutTextTextarea' id='aboutTextTextarea' class='admTextarea' onkeydown='textAreaHeight(this)'>".$text."</textarea>
							<br /><br />
							<div id='admButton3'>
								<span class='nameFont'>Редактировать</span>
							</div>
						</form>
					";
					break;
				case "4":
					$textResult = $mysqli->query("SELECT about_slogan FROM woo_text");
					$text = $textResult->fetch_array(MYSQLI_NUM);
					$text = str_replace("<br />", "", $text[0]);

					echo "
						<h1>Слоган</h1>
						<div style='font-size: 18px; margin-top: -20px;'>Слоган находится в нижней части главной страницы</div>
						<br /><br />
						<form id='aboutTextForm' method='post'>
							<div id='admResponseField'></div>
							<label for='aboutTextTextarea'>Слоган:</label>
							<br />
							<textarea name='aboutTextTextarea' id='aboutTextTextarea' class='admTextarea' onkeydown='textAreaHeight(this)'>".$text."</textarea>
							<br /><br />
							<div id='admButton4'>
								<span class='nameFont'>Редактировать</span>
							</div>
						</form>
					";
					break;
				case "5":
					$priceCategoryResult = $mysqli->query("SELECT * FROM woo_price_categories");

					echo "
						<h1>Разделы прайса</h1>
						<div style='font-size: 18px; margin-top: -20px;'>Редактирование разделов прайса</div>
						<br /><br />
						<form id='aboutTextForm' method='post'>
							<div id='admResponseField'></div>
							<label for='priceCategorySelect'>Раздел:</label>
							<br />
							<select name='priceCategorySelect' id='priceCategorySelect' onchange='priceCategory()'>
								<option disabled selected>- Выберите раздел -</option>
					";

					while($priceCategory = $priceCategoryResult->fetch_assoc()) {
						echo "<option value='".$priceCategory['id']."'>".$priceCategory['category']."</option>";
					}

					echo "
							</select>
							<br /><br />
							<div id='priceCategoryContainer'></div>
						</form>
					";
					break;
				case "6":
					$priceCategoryResult = $mysqli->query("SELECT * FROM woo_price_categories");

					echo "
						<h1>Пункты прайса</h1>
						<div style='font-size: 18px; margin-top: -20px;'>Редактирование пунктов прайса</div>
						<br /><br />
						<form id='aboutTextForm' method='post'>
							<div id='admResponseField'></div>
							<label>Раздел:</label>
							<br />
							<select name='priceCategorySelect' id='priceCategorySelect' onchange='priceCategory2()'>
								<option disabled selected>- Выберите раздел -</option>
							";

					while($priceCategory = $priceCategoryResult->fetch_assoc()) {
						echo "<option value='".$priceCategory['id']."'>".$priceCategory['category']."</option>";
					}

					echo "
							</select>
							<br /><br />
							<div id='priceCategoryContainer'></div>
						</form>
						</form>
					";
					break;
				default:
					echo "
						<h1>Раздел редактирования текстов</h1>
						<div style='font-size: 18px; margin-top: -20px;'>Для начала работы выберите действие в меню слева</div>
					";
					break;
			}
		?>
	</div>

	<div style="clear: both;"></div>

</body>

</html>