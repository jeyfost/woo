<?php

include("connect.php");

$secret = "6LfNbyETAAAAACo25-rBaST_5KGAcceaZ-M9xfMN";

$captcha = "";
if(isset($_POST["g-recaptcha-response"])) {
	$captcha = $_POST["g-recaptcha-response"];
}

$response = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$_SERVER["REMOTE_ADDR"]), true);

$name = $mysqli->real_escape_string($_POST['name']);
$email = $mysqli->real_escape_string($_POST['email']);
$subject = $mysqli->real_escape_string($_POST['subject']);
$text = $mysqli->real_escape_string($_POST['message']);

if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if($captcha and $response['success'] != false) {
        $from = $name;
        $subject = "Сообщение с сайта WooWoo | ".$subject;
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