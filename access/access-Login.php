<?php

class AccessLogin extends Login
{
    public function login(){
        return $this->logUser();
    }

    public function check(){
        return $this->checkUser();
    }

    public function set($username, $email, $phone, $password){
        return $this->setUser($username, $email, $phone, $password);
    }
}
class AccessSignup extends Signup
{

    public function check(){
        return $this->checkUser();
    }

    public function set($username, $email, $phone, $password){
        return $this->setUser($username, $email, $phone, $password);
    }
}