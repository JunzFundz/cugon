<!-- Creating Query -->

<?php

class SignupHandler extends Signup
{

    protected $username;
    protected $email;
    protected $phone;
    protected $password;

    public function __construct($username, $email, $phone, $password)
    {
        $this->username = $username;
        $this->email    = $email;
        $this->phone    = $phone;
        $this->password = $password;
    }

    public function signupUser()
    {
        if($this->emptyInput() == false){
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid inputs!");';
            echo 'window.location.href = "../dist/Signup.php" ';
            echo '</script>';
        }
        if($this->userTaken() == false){
            echo '<script type = "text/javascript">';
            echo 'alert("Email and username taken!");';
            echo 'window.location.href = "../dist/Signup.php" ';
            echo '</script>';
        }
        $this->setUser($this->username, $this->email, $this->phone, $this->password);
    }

    private function emptyInput()
    {
        $result = null;

        if (empty($this->username) || empty($this->email) || empty($this->phone) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function userTaken()
    {
        $result = null;

        if (!$this->checkUser($this->username, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }


}
