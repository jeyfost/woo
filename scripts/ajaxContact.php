<?php

include("connect.php");
require_once("recaptchaLib.php");

$secret = "6LfNbyETAAAAACo25-rBaST_5KGAcceaZ-M9xfMN";
$response = null;
$reCaptcha = new ReCaptcha($secret);

$name = $mysqli->real_escape_string($_POST['name']);
$email = $mysqli->real_escape_string($_POST['email']);
$theme = $mysqli->real_escape_string($_POST['theme']);
$text = $mysqli->real_escape_string($_POST['message']);

$response = $reCaptcha->verifyResponse($_SERVER['REMOTE_ADDR'], $_POST['g-recaptcha-response']);

if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if($response != null && $response->success) {
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
        echo "captcha";
    }
} else {
    echo "email";
}