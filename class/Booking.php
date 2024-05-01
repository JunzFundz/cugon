<?php

require_once('../database/Connection.php');
require_once('../vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

interface BookingInterface
{
    public function __construct();
    public function getItem($i_id);
    public function itemRating($i_id);
    public function itemRatingall($i_id);
    public function data($i_id);
    public function fetchRequest();
    public function tableData();
    public function checkData();
    public function viewRequest($userID, $resID, $itemID);
    public function checkNewData($userID);
    public function approveReq($userID, $itemID, $item, $resID, $resNumber, $total, $date_booked, $transaction_number, $status, $quantity);
    public function declineReq($id, $res_id, $res_number, $reason);
    public function cancelBookReq($res_id);
    public function validateBooking($quantity, $available);
    public function sendPaymentInfo($email);
    public function regBooking($res_number, $itemId, $email, $item, $userId, $quantity, $price, $payment, $total_in_day, $reg_date, $created_at, $status, $message);
    public function stayBooking($res_number, $itemId, $email, $item, $userId, $quantity, $price, $payment, $total_in_day, $start_date, $end_date, $created_at, $status, $message);
    public function usersTransaction($user_id);
    public function adminViewTran();
    public function startIn($res_id);
    public function addtoCart($item_id, $user_id, $quantity);
    public function viewCartItems($user_id);
    public function removeFromCart($itemId, $userId);
}

class Booking extends Dbh implements BookingInterface
{
    public function __construct()
    {
        $db = new Dbh;
        $this->conn = $db->connect();
    }

    public function getItem($i_id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM items WHERE i_id = ?");
        $stmt->bind_param("i", $i_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function itemRating($i_id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM item_ratings WHERE item_id = ?");
        $stmt->bind_param("i", $i_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $ratings = [];
        while ($row = $result->fetch_assoc()) {
            $ratings[] = $row;
        }

        return $ratings;
    }

    public function itemRatingall($i_id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM item_ratings WHERE item_id = ?");
        $stmt->bind_param("i", $i_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $ratingCounts = array(
            '1' => 0,
            '2' => 0,
            '3' => 0,
            '4' => 0,
            '5' => 0
        );

        while ($row = $result->fetch_assoc()) {
            $rating = $row['rating_data'];
            if (isset($ratingCounts[$rating])) {
                $ratingCounts[$rating]++;
            }
        }

        return array(
            'ratings' => $result->fetch_all(MYSQLI_ASSOC),
            'counts' => $ratingCounts
        );
    }

    public function data($i_id)
    {
        $stmt = $this->connect()->prepare("SELECT client_username,rating_data,quality,service ,comments,date_posted, item_id, COUNT(item_id) AS total_ratings, COUNT(client_id) AS clients FROM item_ratings WHERE item_id = ?");
        $stmt->bind_param("i", $i_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function fetchRequest()
    {
        $stmt = "SELECT * 
        FROM res_tb
        INNER JOIN users 
        ON res_tb.user_id = users.user_id";

        $statusRequest = $this->connect()->query($stmt);
        return $statusRequest;
    }

    public function tableData()
    {
        $stmt = "SELECT *
                FROM users u
                INNER JOIN res_tb rt ON rt.user_id = u.user_id 
                INNER JOIN items it ON rt.item_id = it.i_id 
                WHERE rt.status = 'Pending'";

        $result = $this->connect()->query($stmt);
        return $result;
    }

    public function checkData()
    {
        $sql = "SELECT u.email, u.phone,  u.username, u.user_id, rt.reg_date, rt.start, rt.end, rt.created_at, rt.payment, rt.res_id, rt.total,
        COUNT(*) AS pending_count, 
        GROUP_CONCAT(rt.res_number) AS res_numbers,
        GROUP_CONCAT(it.i_name) AS item_names,
        GROUP_CONCAT(it.i_price) AS item_prices,
        GROUP_CONCAT(rt.quantity) AS item_quantities,
        GROUP_CONCAT(rt.item_id) AS item_ids,
        GROUP_CONCAT(it.i_id) AS i_ids
                FROM users u
                INNER JOIN res_tb rt ON rt.user_id = u.user_id 
                INNER JOIN items it ON rt.item_id = it.i_id 
                WHERE rt.status = 'Pending'
                GROUP BY u.email, u.phone, u.user_id";

        $result = $this->connect()->query($sql);
        return $result;
    }

    public function viewRequest($userID, $resID, $itemID)
    {
        $stmt = $this->connect()->prepare("SELECT * 
        FROM res_tb re
        INNER JOIN users us
        INNER JOIN items it
        ON re.item_id=it.i_id
        WHERE us.user_id = ? AND re.res_id = ? AND re.item_id = ?");
        
        $stmt->bind_param("iii", $userID, $resID, $itemID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function checkNewData($userID)
    {
        $stmt = $this->connect()->prepare("SELECT u.email, u.phone, u.user_id, rt.start, rt.end, rt.reg_date, rt.created_at,
            GROUP_CONCAT(rt.res_number) AS res_numbers,
            GROUP_CONCAT(it.i_name) AS item_names,
            GROUP_CONCAT(it.i_price) AS item_prices,
            GROUP_CONCAT(rt.quantity) AS item_quantities,
            GROUP_CONCAT(rt.item_id) AS item_ids,
            GROUP_CONCAT(it.i_id) AS i_ids
            FROM users u
            INNER JOIN res_tb rt ON rt.user_id = u.user_id 
            INNER JOIN items it ON rt.item_id = it.i_id 
            WHERE u.user_id = ? AND rt.status = 'Pending'
            GROUP BY u.email, u.phone, u.user_id");
        $stmt->bind_param("i", $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function approveReq($userID, $itemID, $item, $resID, $resNumber, $total, $date_booked, $transaction_number, $status, $quantity)
    {
        $updateStmt = $this->connect()->prepare("UPDATE res_tb SET status='Approved' WHERE user_id = ? AND item_id = ? AND res_number = ?");
        $updateStmt->bind_param("iii", $userID, $itemID, $resNumber);
        $result = $updateStmt->execute();

        if ($result) {
            $insertStmt = $this->connect()->prepare("INSERT INTO transactions (transaction_number, reservation_number, user_id, item_id, item_name, date_booked, date_approved, total, status, activity) VALUES (?,?,?,?,?,?,NOW(),?,?,'No show')");
            $insertStmt->bind_param("iiiissis", $transaction_number, $resNumber, $userID, $itemID, $item, $date_booked, $total, $status);
            $result = $insertStmt->execute();

            if ($result) {
                $updateItem = $this->connect()->prepare("UPDATE items SET i_quantity = i_quantity - ? WHERE i_id = ?");
                $updateItem->bind_param("ii", $quantity, $itemID);
                $result = $updateItem->execute();

                if ($result) {
                    $notification = $this->connect()->prepare("INSERT INTO notifications (user_id, updates, date_posted) VALUES (?,?, NOW())");
                    $notification->bind_param("is", $userID, $status);
                    $result = $notification->execute();
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function declineReq($user_id, $res_id, $res_num, $reason)
    {
        $stmt = $this->connect()->prepare("UPDATE res_tb SET status='Declined' WHERE user_id=? AND res_id=? AND res_number=?");
        $stmt->bind_param("iii", $user_id, $res_id, $res_num);
    
        if ($stmt->execute()) {
            $notification = $this->connect()->prepare("INSERT INTO notifications (user_id, updates, message, date_posted) VALUES (?,'Declined', ?, NOW())");
            $notification->bind_param("is", $user_id, $reason);
            $result = $notification->execute();
            return $result;
        } else {
            return false;
        }
    }

    public function cancelBookReq($res_id)
    {
        $stmt = $this->connect()->prepare("UPDATE res_tb SET status='Cancelled' WHERE res_id = ?");
        $stmt->bind_param("i", $res_id);

        $result = $stmt->execute();
        $stmt->close();

        return $result;
    }

    public function validateBooking($quantity, $available)
    {
        if ($quantity > $available) {
            return false;
            exit();
        }
        return true;
    }

    public function sendPaymentInfo($email)
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
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Payment to your request';
        $mail->Body    = "Hello $email,<br><br>Please send the payment to: \n\n09319158016 <br><br>Best regards,<br>The Team";
        $mail->AltBody = "Hello ,\n\nYour OTP is: \n\nBest regards,\nThe Team";
        $mail->send();
    }

    public function regBooking($res_number, $itemId, $email, $item, $userId, $quantity, $price, $payment, $total_in_day, $reg_date, $created_at, $status, $message)
    {
        $stmt = $this->connect()->prepare("INSERT INTO res_tb (res_number, item_id, item_name, user_id, quantity, reg_date, created_at, price, total, payment, status, message) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("iisiisssisss", $res_number, $itemId, $item, $userId, $quantity, $reg_date, $created_at, $price, $total_in_day, $payment, $status, $message);
        $success = $stmt->execute();

        if ($success) {
            $notification = $this->connect()->prepare("INSERT INTO notifications (user_id, updates, message, date_posted) VALUES (?,'Request Pending',?, NOW())");
            $notification->bind_param("is", $userId, $message);
            $result = $notification->execute();

            if ($result) {
                $removeFromCart = $this->connect()->prepare("DELETE FROM cart WHERE user_id = ? AND  item_id=?");
                $removeFromCart->bind_param('ii', $userId, $itemId);
                $removeFromCart->execute();
                if ($payment == 'counter') {
                    return true;
                } else {
                    $this->sendPaymentInfo($email);
                    return true;
                }
            }
        }
    }

    public function stayBooking($res_number, $itemId, $email, $item, $userId, $quantity, $price, $payment, $total_in_day, $start_date, $end_date, $created_at, $status, $message)
    {
        $stmt = $this->connect()->prepare("INSERT INTO res_tb (res_number, item_id, item_name, user_id, quantity, start, end, created_at, price, total, payment, status, message ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");

        $stmt->bind_param("iisiisssiisss", $res_number, $itemId,  $item, $userId, $quantity, $start_date, $end_date, $created_at, $price, $total_in_day, $payment, $status, $message);
        $success = $stmt->execute();

        if ($success) {
            $notification = $this->connect()->prepare("INSERT INTO notifications (user_id, updates, message, date_posted) VALUES (?,'Request Pending',?, NOW())");
            $notification->bind_param("is", $userId, $message);
            $result = $notification->execute();

            if ($result) {
                $removeFromCart = $this->connect()->prepare("DELETE FROM cart WHERE user_id = ? AND  item_id=?");
                $removeFromCart->bind_param('ii', $userId, $itemId);
                $removeFromCart->execute();

                if ($payment == 'counter') {
                    return true;
                } else {
                    $this->sendPaymentInfo($email);
                    return true;
                }
            }
        }
    }

    public function usersTransaction($user_id)
    {
        $stmt = $this->connect()->prepare("SELECT *
            FROM res_tb
            INNER JOIN users ON res_tb.user_id = users.user_id 
            INNER JOIN items ON res_tb.item_id = items.i_id 
            WHERE users.user_id = ? AND res_tb.status = 'Pending'");

        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result();

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
            $stmt->close();
            return $transactions;
        } else {
            $stmt->close();
            return null;
        }
    }

    public function adminViewTran()
    {
        $sql = "SELECT *
        FROM res_tb
        INNER JOIN users ON res_tb.user_id = users.user_id 
        INNER JOIN items ON res_tb.item_id = items.i_id";

        $result = $this->connect()->query($sql);
        return $result;
    }

    public function startIn($res_id)
    {
        $stmt = $this->connect()->prepare("SELECT start, end FROM res_tb WHERE res_id = ?");
        $stmt->bind_param("i", $res_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $rows = $result->fetch_assoc();

            echo $start = $rows['start']; // start date
            echo $end = $rows['end']; //end date

            return $rows;
        } else {
            return false;
        }
    }

    public function addtoCart($item_id, $user_id, $quantity)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM cart WHERE item_id = ? AND user_id = ?");
        $stmt->bind_param("ii", $item_id, $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return false;
        } else {
            $stmt = $this->connect()->prepare("INSERT INTO cart (user_id, item_id, item_quantity) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $user_id, $item_id, $quantity);

            $stmt->execute();
            return true;
        }
        return $result;
    }

    public function viewCartItems($user_id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM cart 
            INNER JOIN items ON cart.item_id = items.i_id
            INNER JOIN users ON cart.user_id = users.user_id
            WHERE users.user_id = ?");

        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $stmt->close();

        return $result;
    }

    public function removeFromCart($itemId, $userId)
    {
        $sql = "DELETE FROM cart WHERE user_id = ? AND item_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("ii", $userId, $itemId);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
