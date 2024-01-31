<?php

session_start();

include '../database/Connection.php';
include '../class/cPortal.php';
include '../access/aPortal.php';


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = new AccessPortal($username, $email, $phone, $password);
    $login->login();
}

if (isset($_POST['signup'])) {
    $username  = $_POST['username'];
    $email     = $_POST['email'];
    $phone     = $_POST['phone'];
    $password  = $_POST['password'];

    $signup = new AccessPortal($username, $email, $phone, $password);
    $signup->check();
}
