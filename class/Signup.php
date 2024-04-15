<?php

require('../database/Connection.php');
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Signup extends Dbh
{
    private $username;
    private $email;
    private $phone;
    private $hashed;
    private $formattedDate;
    private $otp;
    private $token;
    private $verified;

    public function __construct($username, $email, $phone, $hashed, $otp, $formattedDate, $token, $verified)
    {
        $this->username    = $username;
        $this->email       = $email;
        $this->phone       = $phone;
        $this->hashed    = $hashed;
        $this->formattedDate = $formattedDate;
        $this->otp         = $otp;
        $this->token        = $token;
        $this->verified       = $verified;
    }

    public function checkUser()
    {
        $stmt = $this->connect()->prepare('SELECT username, email FROM users WHERE username = ? OR email = ?;');

        $stmt->bind_param('ss', $this->username, $this->email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows) {
            return false;
        } else {
            $this->setUser();
            return true;
        }
        return $result;
    }

    public function sendOTP()
    {
        $mail = new PHPMailer(true);

        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->SMTPAuth   = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->Username   = 'junzfundador142@gmail.com';
        $mail->Password   = 'kpwztuxkqtchzhup';

        $mail->setFrom('junzfundador142@gmail.com');
        $mail->addAddress($this->email);

        $mail->isHTML(true);
        $mail->Subject = 'Here is the subject';
        $mail->Body    = "Hello $this->email,<br><br>Your OTP is: $this->otp<br><br>Best regards,<br>The Team";
        $mail->AltBody = "Hello ,\n\nYour OTP is:  $this->otp\n\nBest regards,\nThe Team";

        $mail->send();
    }

    private function setUser()
    {

        $stmt = $this->connect()->prepare('INSERT INTO users (username, email, phone, password, otp, created_at, token, verified) VALUES (?,?,?,?,?,?,?,?)');
        
        $stmt->bind_param('ssisisss', $this->username, $this->email, $this->phone, $this->hashed, $this->otp,$this->formattedDate, $this->token, $this->verified);
        $result = $stmt->execute();
        return $result;
    }

    public function verify()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE token = ?');
        $stmt->bind_param('s', $this->token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $rows = $result->fetch_assoc();
            return $rows;
        } else {
            return false;
        }
    }

    public function sendCode()
    {
        $stmt = $this->connect()->prepare('SELECT email, otp FROM users WHERE email = ? AND token = ?');
        $stmt->bind_param('ss', $this->email, $this->token);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $this->otp = $row['otp'];
            $this->email = $row['email'];

            $this->sendOTP();
    
            return true;
        } else {
            return false;
        }
    }

    public function setVerified($otp)
    {
        $check = $this->connect()->prepare('SELECT COUNT(*) as count FROM users WHERE otp = ?');
        $check->bind_param('s', $otp);
        $check->execute();
        $checkResult = $check->get_result();
        $row = $checkResult->fetch_assoc();
    
        if ($row['count'] > 0) {
            $stmt = $this->connect()->prepare('UPDATE users SET verified = "yes" WHERE otp = ?');
            $stmt->bind_param('s', $otp);
            $result = $stmt->execute();
            
            return $result;
        } else {
            return false;
        }
    }
    
    
    
    
}
