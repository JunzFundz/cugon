<?php

require('../database/Connection.php');

class Signup extends Dbh
{
    private $username;
    private $email;
    private $phone;
    private $password;

    public function __construct($username, $email, $phone, $password)
    {
        $this->username    = $username;
        $this->email       = $email;
        $this->phone       = $phone;
        $this->password    = $password;
    }

    private function checkUser()
    {
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        $stmt->bind_param('ss', $this->username, $this->email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows) {

            $_SESSION['status'] = "Email or Username is already taken.";
            $_SESSION['status_code'] = "error";

            header('location: ../dist/Signup.php');
        } else {
            $this->setUser($this->username, $this->email, $this->phone, $this->password);
        }
    }

    private function setUser()
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (username, email, phone, password) VALUES (?,?,?,?)');

        try {
            $stmt->bind_param('siis', $this->username, $this->email, $this->phone, $this->password);
            $stmt->execute();

            $_SESSION['status'] = "Account created you can proceed to login.";
            $_SESSION['status_code'] = "success";
            header('location: ../dist/Login.php');
        } catch (PDOException $e) {
            $_SESSION['status'] = "Account not registered Try again.";
            $_SESSION['status_code'] = "error";

            header('location: ../index.php');
            echo 'Error: ' . $e->getMessage();
            exit();
        }
        $stmt = null;
    }

    public function signupUser()
    {
        return $this->checkUser();
    }
}
