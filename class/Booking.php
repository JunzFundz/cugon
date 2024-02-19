<?php

require('../database/Connection.php');

class Booking extends Dbh
{
    public function __construct()
    {
        $db = new Dbh;
        $this->conn = $db->connect();
    }

    public function getItem($i_id)
    {
        $sql = "SELECT * FROM items WHERE i_id = '$i_id'";

        $result = $this->connect()->query($sql);

        return $result;
    }

    public function checkData()
    {
        $sql = "SELECT *
        FROM res_tb
        INNER JOIN users ON res_tb.user_id = users.user_id WHERE status = 'Pending'; ";

        $result = $this->connect()->query($sql);

        return $result;
    }

    public function checkNewData($userID)
    {
        $sql = "SELECT *
        FROM res_tb
        INNER JOIN users ON res_tb.user_id = users.user_id WHERE users.user_id =" . $userID;

        $result = $this->connect()->query($sql);
        return $result;
    }

    public function approveBookReq($resID)
    {
        $sql = "UPDATE res_tb 
        SET status='Approved'
        WHERE res_id =" . $resID;

        $result = $this->connect()->query($sql);

        return $result;
    }

    public function cancelBookReq($resID)
    {
        $sql = "UPDATE res_tb 
        SET status='Cancelled'
        WHERE res_id =" . $resID;

        $result = $this->connect()->query($sql);

        return $result;
    }

    public function validateBooking($quantity, $available, $start,  $end)
    {
        if ($quantity > $available) {
            $_SESSION['status'] = "Sorry there are " . $available . " available";
            return false;
            exit();
        }
        if ($start == null && $end == null) {
            $_SESSION['status'] = "Date cannot be empty";
            return false;
            exit();
        }
        return true;
    }

    public function placedBooking($res_number, $i_id, $users_id, $regular_date, $start, $end, $quantity, $meal, $totalcost, $payment)
    {
        // $sql = "SELECT * FROM res_tb WHERE user_id = '$users_id' AND status = 'Pending'";
        // $result = $this->connect()->query($sql);
        // $row = $result->fetch_assoc();

        // if($row > 0){
        //     $_SESSION['status'] = "You have pending request please wait for confirmation."; 
        //     $_SESSION['status_code'] = "error"; 
        //     header('location: ../User/Home.php');

        // }else{

        $sql = "INSERT INTO res_tb (res_number, item_id, user_id, regular_date, start, end, quantity, meal, total, payment, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?, 'Pending')";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bind_param("iiissdssss", $res_number, $i_id, $users_id, $regular_date, $start, $end, $quantity, $meal, $totalcost, $payment);

        if ($stmt->execute()) {

            $items_update = "UPDATE items SET i_quantity = i_quantity -'$quantity' WHERE i_id = '$i_id'";
            $set = $this->connect()->prepare($items_update);
            $set->execute();

            $_SESSION['status'] = "Request sent. Please wait for confirmation.";
            $_SESSION['status_code'] = "success";
            header('location: ../User/Home.php');
        } else {
            $_SESSION['status'] = "Request error";
            $_SESSION['status_code'] = "error";
            header('location: ../User/Home.php');
        }
        // }

    }

    public function usersTransaction($user_id)
    {
        $sql = "SELECT *
        FROM res_tb
        INNER JOIN users ON res_tb.user_id = users.user_id 
        INNER JOIN items ON res_tb.item_id = items.i_id 
        WHERE users.user_id= '$user_id' AND res_tb.status='Pending'";

        $result = $this->connect()->query($sql);

        $row = $result->fetch_assoc();

        $date1 = date_create($row['start']);
        $date2 = date_create($row['end']);
        $interval = date_diff($date1, $date2);

        // Kuhas value drekta
        $days = $interval->days;
        $days * 24;

        return $result;
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
            // No rows found
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
    
            return $stmt->execute(); 
        }
    }
    
    
}
