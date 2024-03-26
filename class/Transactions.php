<?php

require('../database/Connection.php');

class Transactions extends Dbh
{
    public function get_users_transactions()
    {
        $sql = "SELECT res_tb.status = 'Approved', COUNT(*) AS request_count, users.*, res_tb.*, items.*
        FROM res_tb
        INNER JOIN users ON res_tb.user_id = users.user_id 
        INNER JOIN items ON res_tb.item_id = items.i_id 
        WHERE res_tb.status = 'Approved'
        GROUP BY users.email";

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

    public function userRecords($userID)
    {
        $sql = "SELECT * FROM res_tb res
        INNER JOIN users us ON res.user_id=us.user_id
        WHERE res.user_id='$userID' AND res.status='Approved'";

        $result = $this->connect()->query($sql);
        return $result;
    }

    public function printReceipt($userID)
    {
        $sql = "SELECT us.email, us.full_name, us.phone, us.city, us.brgy, us.zip_code, us.created_at, tr.transaction_number,
                GROUP_CONCAT(res.res_number) AS res_numbers,
                GROUP_CONCAT(it.i_id) AS item_ids,
                GROUP_CONCAT(it.i_price) AS item_prices,
                GROUP_CONCAT(it.i_name) AS item_names,
                GROUP_CONCAT(res.quantity) AS quantity
                FROM users us
                INNER JOIN res_tb res ON us.user_id=res.user_id
                INNER JOIN transaction tr ON res.user_id=tr.user_id
                INNER JOIN items it ON res.item_id= it.i_id
                WHERE us.user_id='$userID' AND res.status='Approved'";
    
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

            echo $start = $rows['start'];
            echo $end = $rows['end'];
            $interval = date_diff($start, $end);
            $days = $interval->days * 24;

            return $rows;
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
