<?php

session_start();


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    require '../class/Login.php';

    $login = new Login($email, $password);
    $login->loginUser();
}

if (isset($_POST['signup'])) {
    $username  = $_POST['username'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];
    $password  = md5($_POST['password']);

    require '../class/Signup.php';

    $signup = new Signup($username, $email, $phone, $password);
    $signup->signupUser();
}
