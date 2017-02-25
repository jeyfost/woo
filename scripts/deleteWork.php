<?php

include("connect.php");

$id = $mysqli->real_escape_string($_POST['id']);

$workResult = $mysqli->query("SELECT * FROM woo_works WHERE id = '".$id."'");
$work = $workResult->fetch_assoc();

$maxPriorityResult = $mysqli->query("SELECT MAX(priority) FROM woo_works WHERE category = '".$work['category']."'");
$maxPriority = $maxPriorityResult->fetch_array(MYSQLI_NUM);

$photosCountResult = $mysqli->query("SELECT COUNT(id) FROM woo_works_photos WHERE work_id = '".$id."'");
$photosCount = $photosCountResult->fetch_array(MYSQLI_NUM);

$delete = 0;
$additions = 0;

if($mysqli->query("DELETE FROM woo_works WHERE id = '$id'")) {
	unlink("../img/works/preview/".$work['preview']);

	if($maxPriority[0] > $work['priority']) {
		$worksResult = $mysqli->query("SELECT * FROM woo_works WHERE category = '".$work['category']."' ORDER BY priority");
		while($works = $worksResult->fetch_assoc()) {
			if($works['priority'] > $work['priority']) {
				$mysqli->query("UPDATE woo_works SET priority = '".($works['priority'] - 1)."' WHERE id = '".$works['id']."'");
			}
		}
	}

	$mainPhotoResult = $mysqli->query("SELECT * FROM woo_works_photos WHERE work_id = '".$id."' AND main = '1'");
	$mainPhoto = $mainPhotoResult->fetch_assoc();

	if($mysqli->query("DELETE FROM woo_works_photos WHERE id = '".$mainPhoto['id']."'")) {
		unlink("../img/works/big/".$mainPhoto['big']);
		unlink("../img/works/small/".$mainPhoto['small']);

		$delete = 1;
		$files = 0;

		$photoResult = $mysqli->query("SELECT * FROM woo_works_photos WHERE work_id = '".$id."'");
		if($photoResult->num_rows > 0) {
			$additions = 1;
			while($photo = $photoResult->fetch_assoc()) {
				if($mysqli->query("DELETE FROM woo_works_photos WHERE id = '".$photo['id']."'")) {
					unlink("../img/works/big/".$photo['big']);
					unlink("../img/works/small/".$photo['small']);

					$files++;
				}
			}
		}
	}
}

if($additions == 1) {
	if($delete == 1 and $files == $photosCount[0]) {
		echo "a";
	} else {
		echo "b";
	}
} else {
	if($delete == 1) {
		echo "a";
	} else {
		echo "b";
	}
}