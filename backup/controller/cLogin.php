<?php


class LoginHandler extends Login
{
    protected $email;
    protected $password;

    public function __construct($email, $password)
    {
        $this->email    = $email;
        $this->password = $password;
    }

    public function loginUser()
    {
        if($this->emptyInput() == false){
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid inputs!");';
            echo 'window.location.href = "../dist/Signup.php" ';
            echo '</script>';
        }
        $this->setUser( $this->email, $this->password);
    }

    private function emptyInput()
    {
        $result = null;

        if (empty($this->email) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}