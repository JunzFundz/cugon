<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email 
{
    public function sendMail($email, $subject, $message)
    {
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username   = 'junzfundador142@gmail.com';
        $mail->Password   = 'kpwztuxkqtchzhup';

        $mail->setFrom('junzfundador142@gmail.com');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        $mail->send();
    }
}