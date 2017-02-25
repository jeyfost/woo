<?php

include("connect.php");

$workResult = $mysqli->query("SELECT * FROM woo_works WHERE id = '".$mysqli->real_escape_string($_POST['id'])."'");
$work = $workResult->fetch_assoc();

$maxPriorityResult = $mysqli->query("SELECT MAX(priority) FROM woo_works WHERE category = '".$mysqli->real_escape_string($_POST['category'])."'");
$maxPriority = $maxPriorityResult->fetch_array(MYSQLI_NUM);

echo "
	<br />
	<label for='editWorkPriority'>Позиция в разделе:</label>
	<br />
	<select id='editWorkPriority' name='editWorkPriority'>
";

for($i = 0; $i < $maxPriority[0]; $i++) {
	echo "<option value='".($i + 1)."'"; if($work['priority'] == ($i + 1)) {echo " selected";} echo ">".($i + 1)."</option>";
}

echo "
	</select>
	<br /><br />
	<label for='editWorkName'>Название:</label>
	<br />
	<input type='text' id='editWorkName' name='editWorkName' value='".$work['name']."' />
	<br /><br />
	<label for='editWorkMainPhoto'>Основная фотография:</label>
	<a href='../../img/works/preview/".$work['preview']."' rel='shadowbox'><img src='../../img/works/preview/".$work['preview']."' /></a>
	<br />
	<input type='file' id='editWorkMainPhoto' name='editWorkMainPhoto' />
	<br /><br />
	<label for='editWorkPhotos'>Дополнительные фотографии:</label>
	<br />
";

$photoResult = $mysqli->query("SELECT * FROM woo_works_photos WHERE work_id = '".$work['id']."'");
while($photo = $photoResult->fetch_assoc()) {
	if($photo['main'] != '1') {
		echo "
			<div class='admPhoto' id='admPhoto".$photo['id']."'>
				<a href='../../img/works/big/".$photo['big']."' rel='shadowbox[additions]' onmouseover='deleteBlock(1, \"admPhotoDelete".$photo['id']."\")'><img src='../../img/works/small/".$photo['small']."' /></a>
				<div class='admPhotoDelete' id='admPhotoDelete".$photo['id']."' onclick='deletePhoto(\"".$photo['id']."\")'><img src='../../img/admin/delete.png' title='Удалить фотографию' /></div>
			</div>
		";
	}
}

echo "
	<div style='clear: both;'></div>
	<input type='file' id='editWorkPhotos' name='editWorkPhotos[]' multiple />
	<br /><br />
	<label for='editWorkTechnique'>Техника:</label>
	<br />
	<input type='text' id='editWorkTechnique' name='editWorkTechnique' value='".$work['technics']."' />
	<br /><br />
	<label for='editWorkDescription'>Описание:</label>
	<br />
	<textarea id='editWorkDescription' name='editWorkDescription' onkeydown='textAreaHeight(this)'>".$work['description']."</textarea>
	<br /><br />
	<div id='admButton'>
		<span class='nameFont'>Редактировать</span>
	</div>
";