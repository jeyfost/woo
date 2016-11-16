<?php

session_start();

if(!isset($_SESSION['userID']) or $_SESSION['userID'] != 1) {
	header("Location: ../index.php");
}

include("connect.php");
include("simpleImage.php");

$category = $mysqli->real_escape_string($_POST['addWorkCategory']);
$name = $mysqli->real_escape_string($_POST['addWorkName']);
$technique = $mysqli->real_escape_string($_POST['addWorkTechnique']);
$description = $mysqli->real_escape_string($_POST['addWorkDescription']);
$priority = $mysqli->real_escape_string($_POST['addWorkPriority']);

$maxPriorityResult = $mysqli->query("SELECT MAX(priority) FROM woo_works WHERE category = '".$category."'");
$maxPriority = $maxPriorityResult->fetch_array(MYSQLI_NUM);

if($_FILES['addWorkMainPhoto']['error'] == 0 and substr($_FILES['addWorkMainPhoto']['type'], 0, 5) == "image") {
	$path = pathinfo($_FILES['addWorkMainPhoto']['name']);
	$extension = $path['extension'];
	$previewName = md5(time().$_FILES['addWorkMainPhoto']['name']).".".$extension;
	$previewUploadDir = "../img/works/preview/";
	$previewTmpName = $_FILES['addWorkMainPhoto']['tmp_name'];
	$previewUpload = $previewUploadDir.$previewName;

	if($maxPriority[0] >= $priority) {
		$workResult = $mysqli->query("SELECT * FROM woo_works WHERE category = '".$category."'");
		while($work = $workResult->fetch_assoc()) {
			if($work['priority'] >= $priority) {
				$mysqli->query("UPDATE woo_works SET priority = '".($work['priority'] + 1)."' WHERE id = '".$work['id']."'");
			}
		}
	}

	if($mysqli->query("INSERT INTO woo_works (name, preview, technics, description, category, priority) VALUES ('".$name."', '".$previewName."', '".$technique."', '".$description."', '".$category."', '".$priority."')")) {

		$image = new SimpleImage();
		$image->load($_FILES['addWorkMainPhoto']['tmp_name']);
		$image->resize(300, 300);
		$image->save($previewUpload);

		$mainSmallUploadDir = "../img/works/small/";
		$mainSmallUpload = $mainSmallUploadDir.$previewName;

		$mainBigUploadDir = "../img/works/big/";
		$mainBigUpload = $mainBigUploadDir.$previewName;

		$workIDResult = $mysqli->query("SELECT MAX(id) FROM woo_works");
		$workID = $workIDResult->fetch_array(MYSQLI_NUM);

		if($mysqli->query("INSERT INTO woo_works_photos (big, small, work_id, main) VALUES ('".$previewName."', '".$previewName."', '".$workID[0]."', '1')")) {
			$image = new SimpleImage();
			$image->load($_FILES['addWorkMainPhoto']['tmp_name']);
			$image->resizeToWidth(480);
			$image->save($mainSmallUpload);

			move_uploaded_file($_FILES['addWorkMainPhoto']['tmp_name'], $mainBigUpload);

			if(count($_FILES['addWorkPhotos']['name']) > 0) {
				$count = 0;
				$result = 0;
				$cycle = 0;

				for($j = 0; $j < count($_FILES['addWorkPhotos']['name']); $j++) {
					$count++;
					$cycle++;

					if(!empty($_FILES['addWorkPhotos']['name'][$j]) and $_FILES['addWorkPhotos']['error'][$j] == 0 and substr($_FILES['addWorkPhotos']['type'][$j], 0, 5) == "image") {
						$path = pathinfo($_FILES['addWorkPhotos']['name'][$j]);
						$extension = $path['extension'];
						$photoName = md5(time().$_FILES['addWorkPhotos']['name'][$j]).".".$extension;
						$photoBigUpload = $mainBigUploadDir.$photoName;
						$photoSmallUpload = $mainSmallUploadDir.$photoName;

						if($mysqli->query("INSERT INTO woo_works_photos (big, small, work_id, main) VALUES ('".$photoName."', '".$photoName."', '".$workID[0]."', '0')")) {
							$image = new SimpleImage();
							$image->load($_FILES['addWorkPhotos']['tmp_name'][$j]);
							$image->resizeToWidth(480);
							$image->save($photoSmallUpload);

							move_uploaded_file($_FILES['addWorkPhotos']['tmp_name'][$j], $photoBigUpload);

							$result++;
						}
					}
				}

				if($cycle == 0) {
					$_SESSION['addWork'] = "ok";
					header("Location: ../admin/pages/addWork.php");
				} else {
					if($result != 0) {
						if($result == $cycle) {
							$_SESSION['addWork'] = "ok";
							header("Location: ../admin/pages/addWork.php");
						} else {
							$_SESSION['workCategory'] = $category;
							$_SESSION['workName'] = $name;
							$_SESSION['workTechnique'] = $technique;
							$_SESSION['workDescription'] = $description;
							$_SESSION['workPriority'] = $priority;
							$_SESSION['addWork'] = "partly";

							header("Location: ../admin/pages/addWork.php");
						}
					} else {
						$_SESSION['workCategory'] = $category;
						$_SESSION['workName'] = $name;
						$_SESSION['workTechnique'] = $technique;
						$_SESSION['workDescription'] = $description;
						$_SESSION['workPriority'] = $priority;
						$_SESSION['addWork'] = "additions";

						header("Location: ../admin/pages/addWork.php");
					}
				}
			} else {
				$_SESSION['addWork'] = "ok";
				header("Location: ../admin/pages/addWork.php");
			}
		} else {
			$_SESSION['workCategory'] = $category;
			$_SESSION['workName'] = $name;
			$_SESSION['workTechnique'] = $technique;
			$_SESSION['workDescription'] = $description;
			$_SESSION['workPriority'] = $priority;
			$_SESSION['addWork'] = "preview";

			header("Location: ../admin/pages/addWork.php");
		}
	} else {
		$_SESSION['workCategory'] = $category;
		$_SESSION['workName'] = $name;
		$_SESSION['workTechnique'] = $technique;
		$_SESSION['workDescription'] = $description;
		$_SESSION['workPriority'] = $priority;
		$_SESSION['addWork'] = "failed";

		header("Location: ../admin/pages/addWork.php");
	}
} else {
	$_SESSION['workCategory'] = $category;
	$_SESSION['workName'] = $name;
	$_SESSION['workTechnique'] = $technique;
	$_SESSION['workDescription'] = $description;
	$_SESSION['workPriority'] = $priority;
	$_SESSION['addWork'] = "main";

	header("Location: ../admin/pages/addWork.php");
}