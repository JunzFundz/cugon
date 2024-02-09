<?php

require('../database/Connection.php');

class Transactions extends Dbh
{

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
}
