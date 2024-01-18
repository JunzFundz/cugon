<?php

class Login extends Dbh
{
    protected $email;
    protected $password;

    public function __construct($email, $password)
    {
        $this->email    = $email;
        $this->password = $password;
    }

    public function logUser()
    {
        if (!$this->email || !$this->password) {
            // Handle missing credentials
            echo "Missing email or password";
            return;
        }

        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE email = ? AND password = ?;');

        $stmt->bind_param('ss', $this->email, $this->password);
        $stmt->execute();
        $result = $stmt->get_result();

        session_start();

        if ($result->num_rows) {
            $row = $result->fetch_assoc();

            if ($row['user_id'] == 26) {
                $_SESSION['username'] = $row['username']; 
                $_SESSION['email'] = $this->email;
                header('Location: ../Admin/Home.php');
            } else {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['email'] = $this->email;
                header('Location: ../User/Home.php');
            }
        } else {
            // Handle invalid credentials
            echo "Invalid email or password";
        }
    }
}
?>
