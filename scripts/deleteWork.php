<?php

include("connect.php");

$id = $mysqli->real_escape_string($_POST['id']);

$workResult = $mysqli->query("SELECT * FROM woo_works WHERE id = '".$id."'");
$work = $workResult->fetch_assoc();

$delete = 0;
$additions = 0;

if($mysqli->query("DELETE FROM woo_works WHERE id = '$id'")) {
	unlink("../img/works/preview/".$work['preview']);

	$mainPhotoResult = $mysqli->query("SELECT * FROM woo_works_photos WHERE work_id = '".$id."' AND main = '0'");
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
	if($delete == 1 and $files == $photoResult->num_rows) {
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