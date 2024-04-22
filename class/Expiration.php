<?php

require('C:/wamp64/www/cugon/database/Connection.php');
// require('../vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Expiration extends Dbh
{
    public function run()
    {
        while (true) {
            $this->booking();
            sleep(60);
        }
    }

    public function booking()
    {
        $currentDate = date("Y-m-d");
        $query = "SELECT * FROM res_tb WHERE end = ? AND status != 'EXPIRED' LIMIT 100";
        $stmt = $this->connect()->prepare($query);
        $stmt->bind_param('s', $currentDate);
        $stmt->execute();
        $result = $stmt->get_result();
        
        while ($row = $result->fetch_assoc()) {
            $id = $row['res_id'];

            $query = "UPDATE res_tb SET status = 'EXPIRED' WHERE res_id = ?";
            $stmt = $this->connect()->prepare($query);
            $stmt->bind_param('i', $id);
            $stmt->execute();
        }
    }
}

    // public function updateStatusToExpired($id)
    // {
    //     $query = "UPDATE res_tb SET status = 'EXPIRED' WHERE res_id = ?";
    //     $stmt = $this->connect()->prepare($query);
    //     $stmt->bind_param('i', $id);
    //     $stmt->execute();
    // }

    // public function sendPaymentInfo($email)
    // {
    //     $mail = new PHPMailer(true);

    //     $mail->isSMTP();
    //     $mail->SMTPAuth   = true;
    //     $mail->Host = "smtp.gmail.com";
    //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //     $mail->Port = 587;

    //     $mail->Username   = 'junzfundador142@gmail.com';
    //     $mail->Password   = 'kpwztuxkqtchzhup';

    //     $mail->setFrom('junzfundador142@gmail.com');
    //     $mail->addAddress($email);

    //     $mail->isHTML(true);
    //     $mail->Subject = 'Payment to your request';
    //     $mail->Body    = "Hello $email,<br><br>Your request is expired: \n\n";
    //     $mail->send();
    // }
