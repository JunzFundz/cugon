<?php

require('../class/Signup.php');

session_start();

if ( isset($_GET['token']) && isset($_GET['email'])) {
    $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_EMAIL);
    $token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_SPECIAL_CHARS);

    $signup = new Signup(null, $email, null, null, null, null, $token, null);
    $send = $signup->sendCode();

}



