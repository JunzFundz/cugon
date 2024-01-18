<?php

if(isset($_POST['signup'])){

     $username  = $_POST['username'];
     $email     = $_POST['email'];
     $phone     = $_POST['phone'];
     $password  = $_POST['password'];

     //instantiate
    include '../database/Connection.php';
    include '../class/csSignup.php';

    $signup = new Signup($username, $email, $phone, $password);

    //running error
    $signup->checkUser();


     
}