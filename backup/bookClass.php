public function placedBooking($res_number, $i_id, $users_id, $start, $end, $quantity, $meal, $totalcost, $payment,  $available)
    {
        // $sql = "SELECT * FROM res_tb WHERE user_id = '$users_id' AND status = 'Pending'";
        // $result = $this->connect()->query($sql);
        // $row = $result->fetch_assoc();
        
        // if($row > 0){
        //     $_SESSION['status'] = "You have pending request please wait for confirmation."; 
        //     $_SESSION['status_code'] = "error"; 
        //     header('location: ../User/Home.php');
            
        // }else{

            $sql = "INSERT INTO res_tb (res_number, item_id, user_id, start, end, quantity, meal, total, payment, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')";

            $stmt = $this->connect()->prepare($sql);
    
            $stmt->bind_param("iiissdsss", $res_number, $i_id, $users_id, $start, $end, $quantity, $meal, $totalcost, $payment);
        
            if ($stmt->execute()) {

                $items_update = "UPDATE items SET i_quantity = i_quantity - '$available' WHERE i_id = '$i_id'";
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
        }
        
    // }