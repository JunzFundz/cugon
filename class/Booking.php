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
        $sql = "SELECT u.email, u.phone,  u.username, u.user_id, rt.reg_date, rt.start, rt.end, rt.created_at, rt.payment, rt.res_id, rt.total, 
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

    public function checkNewData($userID)
    {
        $sql = "SELECT u.email, u.phone, u.user_id, rt.start, rt.end, rt.reg_date, rt.created_at,
        GROUP_CONCAT(rt.res_number) AS res_numbers,
        GROUP_CONCAT(it.i_name) AS item_names,
        GROUP_CONCAT(it.i_price) AS item_prices,
        GROUP_CONCAT(rt.quantity) AS item_quantities,
        GROUP_CONCAT(rt.item_id) AS item_ids,
        GROUP_CONCAT(it.i_id) AS i_ids
                FROM users u
                INNER JOIN res_tb rt ON rt.user_id = u.user_id 
                INNER JOIN items it ON rt.item_id = it.i_id 
                WHERE u.user_id = '$userID' AND rt.status = 'Pending'
                GROUP BY u.email, u.phone, u.user_id";

        $result = $this->connect()->query($sql);
        return $result;
    }

    public function approveBookReq($resID, $userID, $tranNum, $itemIDs, $itemQuantities)
    {
        $updateReservationSQL = "UPDATE res_tb 
                                SET status='Approved'
                                WHERE user_id = $userID";

        $conn = $this->connect();

        if ($conn->query($updateReservationSQL) === TRUE) {

            $insertTransactionSQL = "INSERT INTO transaction (transaction_number, user_id, reg_date, start, end, created_at, total, payment, status) 
                                    SELECT '$tranNum', user_id, reg_date, start, end, NOW() AS created_at, total, payment, 'Paid'
                                    FROM res_tb
                                    WHERE res_id = $resID";

            if ($conn->query($insertTransactionSQL) === TRUE) {

                $itemIDsArray = explode(',', $itemIDs);
                $itemQuantitiesArray = explode(',', $itemQuantities);

                for ($i = 0; $i < count($itemIDsArray); $i++) {
                    $itemID = $itemIDsArray[$i];
                    $itemQuantity = $itemQuantitiesArray[$i];

                    $updateQuantitySQL = "UPDATE items 
                            SET i_quantity = i_quantity - $itemQuantity
                            WHERE i_id = $itemID";

                    if ($conn->query($updateQuantitySQL) === FALSE) {
                        echo "Error updating quantity for item ID $itemID: ";
                    }
                }
                return true;
            } else {
                echo "Error inserting transaction: ";
            }
        } else {
            echo "Error updating reservation: ";
        }
        $conn->close();
    }

    public function declineReq($id, $reason)
    {
        $sql = "UPDATE res_tb SET status='Declined' WHERE user_id=$id";

        $result = $this->connect()->query($sql);
    }

    public function cancelBookReq($resID)
    {
        $sql = "UPDATE res_tb 
        SET status='Cancelled'
        WHERE res_id =" . $resID;

        $result = $this->connect()->query($sql);
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

    public function placedBooking($res_number, $itemId, $userId, $quantity, $price, $payment, $total_in_day, $reg_date, $start_date, $end_date, $created_at, $status, $message) {
        
        $stmt = $this->connect()->prepare("INSERT INTO res_tb (res_number, item_id, user_id, quantity, reg_date, start, end, created_at, price, total, payment, status, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("iiiissssiisss", $res_number, $itemId, $userId, $quantity, $reg_date, $start_date, $end_date, $created_at, $price, $total_in_day, $payment, $status, $message);
        $stmt->execute();

        $result = $stmt->get_result();
    
        if ($result === TRUE) {
            return true;
        } else {
            error_log("Error: " . $stmt->error);
            return false;
        }
    }

    public function usersTransaction($user_id)
    {
        $sql = "SELECT *
            FROM res_tb
            INNER JOIN users ON res_tb.user_id = users.user_id 
            INNER JOIN items ON res_tb.item_id = items.i_id 
            WHERE users.user_id= '$user_id' AND res_tb.status='Pending'";

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
        $sql = "SELECT * FROM cart 
        INNER JOIN items ON cart.item_id = items.i_id
        INNER JOIN users ON cart.user_id = users.user_id
        WHERE users.user_id = '$user_id'";

        $result = $this->connect()->query($sql);
        return $result;
    }

    public function removeFromCart($itemId, $userId)
    {
        $sql = "DELETE FROM cart WHERE user_id=? AND item_id=?";
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
