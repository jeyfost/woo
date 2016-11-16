<?php

include("connect.php");

$categoryResult = $mysqli->query("SELECT category FROM woo_price_categories WHERE id = '".$mysqli->real_escape_string($_POST['id'])."'");
$category = $categoryResult->fetch_array(MYSQLI_NUM);

echo $category[0];