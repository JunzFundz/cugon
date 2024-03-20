<?php

require('../database/Connection.php');

class Login extends Dbh
{
    // private $email;
    // private $password;

    // public function __construct($email, $password)
    // {
    //     $this->email = $email;
    //     $this->password = $password;
    // }

    public function __construct()
    {
        $db = new Dbh;
        $this->conn = $db->connect();
    }

    public function newlogin($email, $password)
    {
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];
            if (password_verify($password, $hashedPassword)) {
                return true; 
            } else {
                return false; 
            }
        } else {
            return false; 
        }
    }

}
