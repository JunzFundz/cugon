<?php

require('../database/Connection.php');
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Login extends Dbh
{
    public function sendMail($email)
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
        $mail->Subject = 'Forgot Password';
        $mail->Body = 'Hello ' . $email . ',<br><br>Please confirm your email by clicking the confirm button.<br><br>
        <a href="http://localhost/cugon/dist/new-password?email=' . $email . '" type="button" class="text-gray-900 bg-gradient-to-r from-teal-200 to-lime-200 hover:bg-gradient-to-l hover:from-teal-200 hover:to-lime-200 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-teal-700 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Teal to Lime</a>
        <br>';

        $mail->send();
    }

    public function login($password, $email)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $stored_password = $row["password"];
                if (password_verify($password, $stored_password)) {
                    $_SESSION['username'] = $row["username"];
                    $_SESSION['user_id'] = $row["user_id"];
                    $_SESSION['email'] = $row["email"];

                    $redirect = ($_SESSION['user_id'] === 321) ? '../Admin/welcome.php' : '../User/Items.php';

                    return [
                        'success' => true,
                        'redirect' => $redirect
                    ];
                } else {
                    return [
                        'success' => false,
                        'error' => 'Incorrect Password'
                    ];
                }
            }
        } else {
            return [
                'success' => false,
                'error' => 'Account not found'
            ];
        }
    }

    public function checkEmail($email)
    {
        $stmt = $this->connect()->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['email'];
            $this->sendMail($email);
            return true;
        } else {
            return false;
        }
    }

    public function updatePassword($email, $newPasswordHash)
    {
        $stmt = $this->connect()->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param('ss', $newPasswordHash, $email);
        $result = $stmt->execute();

        return $result;
    }
}
