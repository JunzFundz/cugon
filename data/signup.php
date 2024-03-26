<?php
session_start();

if (isset($_POST['signup'])) {

    $username  = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email     = $_POST['email'];
    $phone     = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
    $hashed  = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $otp       = rand(1000, 9999);
    $token     = bin2hex(random_bytes(32));
    $verified    = "no";

    date_default_timezone_set('Asia/Manila');
    $date = new DateTime();
    $formattedDate = $date->format('Y:m:d H:i:s');

    header('Content-Type: application/json');

    require('../class/Signup.php');
    $signup = new Signup($username, $email, $phone, $hashed, $otp, $formattedDate, $token, $verified);
    $result = $signup->checkUser();

    $response = array();

    if ($result) {
        $response['success'] = 'Successfully registered the OTP will be sent to your email';
        $response['redirect'] = '../dist/verify.php?token=' . urlencode($token) . "&email=" . urlencode($email);
    } else if ($result === false){
        $response['error'] = 'Usename and email already taken!';
    } else{
        $response['error'] = 'Error occur while signingup try again later!';
    }
    echo json_encode($response);
    exit();
}

