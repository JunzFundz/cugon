<?php

class AccessPortal extends Portal
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