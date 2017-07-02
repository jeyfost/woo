<?php

session_start();

unset($_SESSION['userID']);
unset($_SESSION['userRole']);

header("Location: ../../index.php");