<?php


class Booking extends Dbh
{
    public function __construct()
    {
        $db = new Dbh;
        $this->conn = $db->connect();
    }

    public function checkData()
    {
        $sql = "SELECT *
        FROM res_tb
        INNER JOIN users ON res_tb.user_id = users.user_id WHERE status = 'Pending'; ";

        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            echo "No data";
            return false;
        }
    }

    public function checkNewData($userID)
    {
        $sql = "SELECT *
        FROM res_tb
        INNER JOIN users ON res_tb.user_id = users.user_id WHERE users.user_id =".$userID;

        $result = $this->connect()->query($sql);
        return $result;

    }
    public function userTransaction($user_id)   
    {
        $sql = "SELECT *
        FROM res_tb
        INNER JOIN users ON res_tb.user_id = users.user_id 
        INNER JOIN items ON res_tb.item_id = items.i_id 
        WHERE users.user_id = ".$user_id;
        ;

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
    

    public function validateBooking($quantity, $available, $start,  $end)
    {
        if($quantity>$available){
            $_SESSION['status'] = "Sorry there are " . $available . " available";
            return false;
            exit();
        }
        if($start == null && $end == null){
            $_SESSION['status'] = "Date cannot be empty";
            return false;
            exit();
        }
        return true;
    }

    public function placedBooking($res_number, $i_id, $users_id, $start, $end, $meal, $totalcost, $payment)
    {
        $sql = "SELECT * FROM res_tb WHERE user_id = '$users_id' AND status = 'Pending'";
        $result = $this->connect()->query($sql);
        $row = $result->fetch_assoc();
        
        if($row > 0){
            $_SESSION['status'] = "You have pending request please wait for confirmation."; 
            $_SESSION['status_code'] = "error"; 
            header('location: ../User/Home.php');
            
        }else{

            $sql = "INSERT INTO res_tb (res_number, item_id, user_id, start, end, meal, total, payment, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'Pending')";

            $stmt = $this->connect()->prepare($sql);
    
            $stmt->bind_param("iiissdss", $res_number, $i_id, $users_id, $start, $end, $meal, $totalcost, $payment);
        
            if ($stmt->execute()) {
                $_SESSION['status'] = "Request sent. Please wait for confirmation."; 
                $_SESSION['status_code'] = "success"; 
                header('location: ../User/Home.php');
            } else {
                $_SESSION['status'] = "Request error"; 
                $_SESSION['status_code'] = "error"; 
                header('location: ../User/Home.php');
            }
        }
        
    }
}
