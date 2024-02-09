<?php

require('../database/Connection.php');

class Login extends Dbh
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    private function login()
    {
        if (!$this->email || !$this->password) {
            echo "Missing email or password";
            return false;
        }

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? AND password = ?');

        $stmt->bind_param('ss', $this->email, $this->password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($result->num_rows) {
            if ($row['user_id'] == 26) {
                $_SESSION['email'] = $this->email;
                header('Location: ../Admin/Home.php');
            } else {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['email'] = $this->email;
                header('Location: ../User/Home.php');
            }
        } else {
            echo "Invalid email or password";
        }
        return $row;
    }
    
    public function loginUser()
    {
        return $this->login();
    }
}

