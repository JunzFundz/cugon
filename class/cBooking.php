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

        $sql = 'SELECT * FROM res_tb';

        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        }else{
            return false;
        }
    }
}
