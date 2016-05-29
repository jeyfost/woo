<?php

include("connect.php");

$name = trim(htmlspecialchars($_POST['name']));
$email = trim(htmlspecialchars($_POST['email']));
$theme = trim(htmlspecialchars($_POST['theme']));
$text = trim(htmlspecialchars($_POST['message']));

if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $from = $name;
    $subject = "Сообщение с сайта WooWoo | ".$theme;
    $to = "1@1.cc";

    $hash = md5(date('r', time()));

    $headers = "From: ".$from."\nReply-To: ".$email."\nMIME-Version: 1.0";
    $headers .= "\nContent-Type: multipart/mixed; boundary = \"PHP-mixed-".$hash."\"\n\n";

    $message = "--PHP-mixed-".$hash."\n";
    $message .= "Content-Type: text/html; charset=\"windows-1251\"\n";
    $message .= "Content-Transfer-Encoding: 8bit\n\n";
    $message .= $text."\n";
    $message .= "--PHP-mixed-".$hash."\n";

    if(@mail($to, $subject, $message, $headers)) {
        echo "ok";
    } else {
        echo "failed";
    }

} else {
    echo "email";
}