<?php
require('../database/Connection.php');
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Transactions extends Dbh
{
    public function get_users_transactions()
    {
        $sql = "SELECT transactions.*, users.*, items.*, res_tb.quantity, res_tb.res_number, res_tb.res_id, transactions.activity
        FROM transactions
        INNER JOIN users ON transactions.user_id = users.user_id
        INNER JOIN items ON transactions.item_id = items.i_id
        INNER JOIN res_tb ON transactions.reservation_number = res_tb.res_number
        WHERE transactions.status='Paid' AND
        res_tb.status = 'Approved'
        ";

        $result = $this->connect()->query($sql);
        return $result;
    }

    public function userPending($userId)
    {
        $sql = "SELECT * 
        FROM res_tb
        INNER JOIN users ON res_tb.user_id = users.user_id 
        INNER JOIN items ON res_tb.item_id = items.i_id 
        WHERE users.user_id= '$userId' AND res_tb.status='Pending'";

        $result = $this->connect()->query($sql);

        if ($result && $result->num_rows > 0) {
            $transactions = array();

            while ($row = $result->fetch_assoc()) {
                $date1 = date_create($row['start']);
                $date2 = date_create($row['end']);
                $interval = date_diff($date1, $date2);
                $days = $interval->days * 24;

                $row['duration_hours'] = $days;
                $transactions[] = $row;
            }
            return $transactions;
        } else {
            return null;
        }
    }
    public function userAlltran($userId)
    {
        $sql = "SELECT *
        FROM res_tb
        INNER JOIN users ON res_tb.user_id = users.user_id 
        INNER JOIN items ON res_tb.item_id = items.i_id 
        WHERE users.user_id= '$userId' AND res_tb.status IN ('Approved', 'Cancelled', 'Declined')";

        $result = $this->connect()->query($sql);

        if ($result && $result->num_rows > 0) {
            $transactions = array();

            while ($row = $result->fetch_assoc()) {
                $date1 = date_create($row['start']);
                $date2 = date_create($row['end']);
                $interval = date_diff($date1, $date2);
                $days = $interval->days * 24;

                $row['duration_hours'] = $days;
                $transactions[] = $row;
            }
            return $transactions;
        } else {
            return null;
        }
    }

    public function sendMail($to, $res_number)
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
        $mail->addAddress($to);

        $mail->isHTML(true);
        $mail->Subject = 'Booking Expired';
        $mail->Body    = "Hello $to,<br><br>Your booking with transaction number $res_number has expired. Please make a new booking.<br><br>Best regards,<br>The Team";
        $mail->AltBody = "Hello,\n\nYour booking with transaction number $res_number has expired. Please make a new booking.\n\nBest regards,\nThe Team";
        $mail->send();
    }

    public function userRecords($userID)
    {
        $sql = "SELECT res.*, us.*
                FROM res_tb res
                INNER JOIN users us ON res.user_id = us.user_id
                WHERE res.user_id =? AND res.status = 'Approved'";

        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }
    public function printReceipt($userID)
    {
        $sql = $this->connect()->prepare("SELECT transactions.*, users.*, items.*, res_tb.quantity 
        FROM transactions
        INNER JOIN users ON transactions.user_id = users.user_id
        INNER JOIN items ON transactions.item_id = items.i_id
        INNER JOIN res_tb ON transactions.reservation_number = res_tb.res_number
        WHERE transactions.status='Paid' AND transactions.user_id=?");
    
        $sql->bind_param("i", $userID);
        $sql->execute();
    
        $result = $sql->get_result();
        $data = [];
    
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    
        return ['data' => $data, 'num_rows' => count($data)];
    }

    public function startIn($user, $t_number, $r_number)
    {
        $stmt = $this->connect()->prepare("UPDATE transactions SET time_in = NOW(), activity = 'In progress' WHERE user_id = ? AND reservation_number = ? AND transaction_number = ?");
        
        $stmt->bind_param("iii", $user, $r_number, $t_number);
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function timeOut($user, $t_number, $r_number)
    {
        $stmt = $this->connect()->prepare("UPDATE transactions SET time_out = NOW(), activity = 'Completed' WHERE user_id = ? AND reservation_number = ? AND transaction_number = ?");
        
        $stmt->bind_param("iii", $user, $r_number, $t_number);
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    

    public function userNotification($user_id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM res_tb
        INNER JOIN users ON res_tb.user_id=users.user_id
        WHERE users.user_id = ?");

        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}
