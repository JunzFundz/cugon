<?php

require('../class/Signup.php');

if (isset($_POST['verify'])) {

    $email     = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $token     = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
    $otp      = filter_input(INPUT_POST, 'otp', FILTER_SANITIZE_NUMBER_INT);

    header('Content-Type: application/json');

    $signup = new Signup(null, null, null, null, null, null, null, null);
    $set = $signup->setVerified($otp);

    $response = array();

    if ($set === true) {
        $response['success'] = 'Account verified';
        $response['redirect'] = '../dist/login';
    } else if ($set === false){
        $response['error'] = 'Incorrect OTP';
    } else {
        $response['error'] = 'Account not verified please try again later.';
    }
    echo json_encode($response);
    exit();
}
