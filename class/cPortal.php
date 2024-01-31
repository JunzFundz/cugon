<?php

class Portal extends Dbh
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

    protected function logUser()
    {
        if (!$this->email || !$this->password) {
            echo "Missing email or password";
            return;
        }

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? AND password = ?;');

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

    protected function checkUser()
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

    protected function setUser($username, $email, $phone, $password)
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

    protected function userDeatails($user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
    }
    
}
?>
