<?php

include("connect.php");

$priorityResult = $mysqli->query("SELECT MAX(priority) FROM woo_works WHERE category = '".$mysqli->real_escape_string($_POST['category'])."'");
$priority = $priorityResult->fetch_array(MYSQLI_NUM);

echo "<select id='addWorkPriority' name='addWorkPriority'>";

for($i = 0; $i <= $priority[0]; $i++) {
	echo "<option value='".($i + 1)."'"; if($i == $priority[0]) {echo " selected";} echo ">".($i + 1)."</option>";
}

echo "</select>";