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

    <link rel="icon" href="../../img/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="../../img/favicon.ico" type="image/x-icon">

    <link href='https://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>

    <title>Панель администрирования</title>

    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="../../js/admMenu.js"></script>
	<script type="text/javascript" src="../../js/admWork.js"></script>

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
			<div class="umc" id="umc3" style="background-color: #595959;">
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
		<h1>Добавление работ</h1>
		<div style="font-size: 18px; margin-top: -20px;">Раздел добавления новых работ</div>
		<br /><br />
		<form method="post" enctype="multipart/form-data" id="addWorkForm" name="addWorkForm" action="../../scripts/addWork.php">
			<?php
				$categoryResult = $mysqli->query("SELECT * FROM works_categories");
			?>
			<div id="admResponseField" <?php if(isset($_SESSION['addWork']) and $_SESSION['addWork'] == "ok") {echo "style='color: #53acff; opacity: 1;'";} else {echo "style='color: #a22222; opacity: 1;'";} ?>>
				<?php
					if(isset($_SESSION['addWork'])) {
						switch($_SESSION['addWork']) {
							case "ok":
								echo "Работа успешно добавлена.<br /><br />";
								break;
							case "failed":
								echo "При добавлении работы произошла ошибка. Попробуйте снова.<br /><br />";
								break;
							case "main":
								echo "Выберите основную фотографию.<br /><br />";
								break;
							case "preview":
								echo "При загрузке основной фотографии произошла ошибка. Попробуйте снова.<br /><br />";
								break;
							case "partly":
								echo "Работа успешно добавлена, однако на сервер были загружены не все дополнительные фотографии.<br /><br />";
								break;
							case "additions":
								echo "Работа успешно добавлена, однако дополнительные фотографии не были загружены на сервер.<br /><br />";
								break;
							default: break;
						}
						unset($_SESSION['addWork']);
					}
				?>
			</div>
			<label for="addWorkCategory">Раздел:</label>
			<br />
			<select id="addWorkCategory" name="addWorkCategory" onchange="priority()">
				<option disabled <?php if(!isset($_SESSION['workCategory'])) {echo "selected";} ?>>- Выберите раздел -</option>
				<?php
					while($category = $categoryResult->fetch_assoc()) {
						echo "<option value='".$category['id']."'"; if(isset($_SESSION['workCategory']) and $_SESSION['workCategory'] == $category['id']) {echo " selected";} echo ">".$category['category_name']."</option>";
					}
				?>
			</select>
			<br /><br />
			<label for="addWorkPriority">Позиция в разделе:</label>
			<br />
			<div id="priorityContainer">
				<select name="addWorkPriority" id="addWorkPriority">
				<?php
					if(isset($_SESSION['workPriority']) and isset($_SESSION['workCategory'])) {
						$maxPriorityResult = $mysqli->query("SELECT MAX(priority) FROM woo_works WHERE category = '".$_SESSION['workCategory']."'");
						$maxPriority = $maxPriorityResult->fetch_array(MYSQLI_NUM);

						for($i = 0; $i <= $maxPriority[0]; $i++) {
							echo "<option value='".($i + 1)."'"; if($_SESSION['workPriority'] == ($i + 1)) {echo " selected";} echo ">".($i + 1)."</option>";
						}
					} else {
						echo "<option disabled selected>- Для выбора приоритета выберите категорию -</option>";
					}

					unset($_SESSION['workCategory']);
					unset($_SESSION['workPriority']);
				?>
				</select>
			</div>
			<br /><br />
			<label for="addWorkName">Название:</label>
			<br />
			<input type="text" id="addWorkName" name="addWorkName" <?php if(isset($_SESSION['workName'])) {echo "value='".$_SESSION['workName']."'"; unset($_SESSION['workName']);} ?> />
			<br /><br />
			<label for="addWorkMainPhoto">Основная фотография:</label>
			<br />
			<input type="file" id="addWorkMainPhoto" name="addWorkMainPhoto" />
			<br /><br />
			<label for="addWorkPhotos">Дополнительные фотографии:</label>
			<br />
			<input type="file" id="addWorkPhotos" name="addWorkPhotos[]" multiple />
			<br /><br />
			<label for="addWorkTechnique">Техника:</label>
			<br />
			<input type="text" id="addWorkTechnique" name="addWorkTechnique" <?php if(isset($_SESSION['workTechnique'])) {echo "value='".$_SESSION['workTechnique']."'"; unset($_SESSION['workTechnique']);} ?> />
			<br /><br />
			<label for="addWorkDescription">Описание:</label>
			<br />
			<textarea id="addWorkDescription" name="addWorkDescription" onkeydown="textAreaHeight(this)"><?php if(isset($_SESSION['workDescription'])) {echo $_SESSION['workDescription']; unset($_SESSION['workDescription']);} ?></textarea>
			<br /><br />
			<div id="admButton">
				<span class="nameFont">Добавить</span>
			</div>
		</form>
	</div>

</body>

</html>