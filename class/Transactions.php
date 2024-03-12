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
        $sql = "SELECT u.email, u.phone, u.user_id, rt.start, rt.end, rt.created_at, tr.transaction_number, tr.status,
        GROUP_CONCAT(rt.res_number) AS res_numbers,
        GROUP_CONCAT(it.i_name) AS item_names,
        GROUP_CONCAT(it.i_price) AS item_prices,
        GROUP_CONCAT(rt.quantity) AS item_quantities
                FROM users u
                INNER JOIN res_tb rt ON rt.user_id = u.user_id 
                INNER JOIN items it ON rt.item_id = it.i_id 
                INNER JOIN transaction tr ON rt.user_id = tr.user_id 
                WHERE u.user_id = '$userID' AND rt.status = 'Approved'
                GROUP BY u.email, u.phone, u.user_id";

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
        $sql = "SELECT * from res_tb where user_id='$user_id' AND status = 'Approved'";

        $result = $this->connect()->query($sql);
        return $result;
    }
}
