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
        
    header('Content-Type: application/json');
        $stmt = $this->conn->prepare('SELECT * FROM users WHERE email = ?');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $stored_password = $row["password"];
                if (password_verify($password, $stored_password)) {
                    $_SESSION['username'] = $row["username"];
                    $_SESSION['user_id'] = $row["user_id"];
                    $_SESSION['email'] = $row["email"];
    
                    $redirect = ($_SESSION['user_id'] === 280) ? '../Admin/Home.php' : '../User/Items.php';
    
                    return [
                        'redirect' => $redirect
                    ];
                } else {
                    return [
                        'error' => 'Incorrect Password'
                    ];
                }
            }
        } else {
            return [
                'error' => 'Account not found'
            ];
        }
    }
    
    

}
