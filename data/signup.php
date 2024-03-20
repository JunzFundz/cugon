<?php
session_start();

if (isset($_POST['signup'])) 
{
    $username  = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $phone     = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);

    $password  = $_POST['password'];
    $hashed  = password_hash($password, PASSWORD_DEFAULT);
    
    $otp       = rand(1000, 9999);
    $token     = bin2hex(random_bytes(32));
    $verified    = "no";

    if (!$username || !$email || !$phone || !$_POST['password']) {
        return false;
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
        exit;
    }

    if (!preg_match('/^\d{10}$/', $phone)) {
        return false;
        exit;
    }

    date_default_timezone_set('Asia/Manila');
    $date = new DateTime();
    $formattedDate = $date->format('Y:m:d H:i:s');

    header('Content-Type: application/json');

    require('../class/Signup.php');
    $signup = new Signup($username, $email, $phone, $hashed, $otp, $formattedDate, $token, $verified);
    $result = $signup->setUser();

    $response = array();

    if ($result) {
        $response['success'] = 'Successfully registered the OTP will be sent to your email';
        $response['redirect'] = '../dist/verify.php?token=' . urlencode($token) . "&email=" . urlencode($email);
    } else {
        $response['error'] = 'An error occur. Please try again later!';
    }
    echo json_encode($response);
    exit();
}

