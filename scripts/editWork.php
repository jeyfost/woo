<?php

session_start();

include("connect.php");
include("simpleImage.php");

$updates = 0;

$category = $mysqli->real_escape_string($_POST['editWorkCategory']);
$workID = $mysqli->real_escape_string($_POST['editWorkSelect']);
$priority = $mysqli->real_escape_string($_POST['editWorkPriority']);
$name = $mysqli->real_escape_string($_POST['editWorkName']);
$technique = $mysqli->real_escape_string($_POST['editWorkTechnique']);
$description = $mysqli->real_escape_string($_POST['editWorkDescription']);

$workResult = $mysqli->query("SELECT * FROM woo_works WHERE id = '".$workID."'");
$work = $workResult->fetch_assoc();

if($priority != $work['priority']) {
	if($priority > $work['priority']) {
		$mysqli->query("UPDATE woo_works SET priority = '".$priority."' WHERE id = '".$workID."'");
		$workSelectedResult = $mysqli->query("SELECT * FROM woo_works WHERE category = '".$category."'");
		while($workSelected = $workSelectedResult->fetch_assoc()) {
			if($workSelected['id'] != $workID and $workSelected['priority'] > $work['priority'] and $workSelected['priority'] <= $priority) {
				if($mysqli->query("UPDATE woo_works SET priority = '".($workSelected['priority'] - 1)."' WHERE id = '".$workSelected['id']."'")) {
					$updates++;
				}
			}
		}
	} else {
		$mysqli->query("UPDATE woo_works SET priority = '".$priority."' WHERE id = '".$workID."'");
		$workSelectedResult = $mysqli->query("SELECT * FROM woo_works WHERE category = '".$category."'");
		while($workSelected = $workSelectedResult->fetch_assoc()) {
			if($workSelected['id'] != $workID and $workSelected['priority'] < $work['priority'] and $workSelected['priority'] >= $priority) {
				if($mysqli->query("UPDATE woo_works SET priority = '".($workSelected['priority'] + 1)."' WHERE id = '".$workSelected['id']."'")) {
					$updates++;
				}
			}
		}
	}
}

if($work['name'] != $name or $work['description'] != $description or $work['technics'] != $technique) {
	if($mysqli->query("UPDATE woo_works SET name = '".$name."', technics = '".$technique."', description = '".$description."' WHERE id = '".$workID."'")) {
		$updates++;
	}
}

if(!empty($_FILES['editWorkMainPhoto']) and $_FILES['editWorkMainPhoto']['error'] == 0 and substr($_FILES['editWorkMainPhoto']['type'], 0, 5) == "image") {
	$path = pathinfo($_FILES['editWorkMainPhoto']['name']);
	$extension = $path['extension'];
	$previewName = md5(time().$_FILES['editWorkMainPhoto']['name']).".".$extension;
	$previewUploadDir = "../img/works/preview/";
	$previewUpload = $previewUploadDir.$previewName;

	if($mysqli->query("UPDATE woo_works SET preview = '".$previewName."' WHERE id = '".$workID."'")) {
		unlink("../img/works/preview/".$work['preview']);

		$image = new SimpleImage();
		$image->load($_FILES['editWorkMainPhoto']['tmp_name']);
		$image->resize(300, 300);
		$image->save($previewUpload);

		$photoResult = $mysqli->query("SELECT * FROM woo_works_photos WHERE work_id = '".$workID."' AND main = '1'");
		$photo = $photoResult->fetch_assoc();

		if($mysqli->query("UPDATE woo_works_photos SET big = '".$previewName."', small = '".$previewName."' WHERE work_id = '".$workID."' AND main = '1'")) {
			unlink("../img/works/small/".$photo['small']);
			unlink("../img/works/big/".$photo['big']);

			$smallUpload = "../img/works/small/".$previewName;
			$image->load($_FILES['editWorkMainPhoto']['tmp_name']);
			$image->resizeToWidth(480);
			$image->save($smallUpload);

			$bigUpload = "../img/works/big/".$previewName;
			move_uploaded_file($_FILES['editWorkMainPhoto']['tmp_name'], $bigUpload);

			$updates++;
		}
	}
}

if(count($_FILES['editWorkPhotos']['name']) > 0) {
	for($j = 0; $j < count($_FILES['editWorkPhotos']['name']); $j++) {
		if(!empty($_FILES['editWorkPhotos']['name'][$j]) and $_FILES['editWorkPhotos']['error'][$j] == 0 and substr($_FILES['editWorkPhotos']['type'][$j], 0, 5) == "image") {
			$path = pathinfo($_FILES['editWorkPhotos']['name'][$j]);
			$extension = $path['extension'];
			$photoName = md5(time().$_FILES['editWorkPhotos']['name'][$j]).".".$extension;
			$bigUpload = "../img/works/big/".$photoName;
			$smallUpload = "../img/works/small/".$photoName;

			if($mysqli->query("INSERT INTO woo_works_photos (big, small, work_id, main) VALUES ('".$photoName."', '".$photoName."', '".$workID."', '0')")) {
				$image = new SimpleImage();
				$image->load($_FILES['editWorkPhotos']['tmp_name'][$j]);
				$image->resizeToWidth(480);
				$image->save($smallUpload);

				move_uploaded_file($_FILES['editWorkPhotos']['tmp_name'][$j], $bigUpload);

				$updates++;
			}
		}
	}
}

if($updates > 0) {
	$_SESSION['editWork'] = "ok";
} else {
	$_SESSION['editWork'] = "none";
}

header("Location: ../admin/pages/editWork.php");