<?php


class Signup extends Dbh
{
    protected $username;
    protected $email;
    protected $phone;
    protected $password;

    public function __construct($username, $email, $phone, $password)
    {
        $this->username    = $username;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }

    public function checkUser()
    {
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        $stmt->bind_param('ss', $this->username, $this->email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows) {
            echo 'Already taken';
        } else {
            $this->setUser($this->username, $this->email, $this->phone, $this->password);
        }
    }

    public function setUser($username, $email, $phone, $password)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (username, email, phone, password) VALUES (?,?,?,?)');

        try {
            $stmt->execute(array($username, $email, $phone, $password));
        } catch (PDOException $e) {

            echo 'Error: ' . $e->getMessage();
            exit();
        }
        $stmt = null;
    }
}
