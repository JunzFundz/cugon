<?php

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->Username   = 'junzfundador142@gmail.com';
$mail->Password   = 'kpwztuxkqtchzhup';

$mail->setFrom('pentest840@gmail.com');
$mail->addAddress("junzfundador142@gmail.com");

$mail->Subject = "HI";
$mail->Body = "djfjhfsdhfhlksd";

$mail->send();