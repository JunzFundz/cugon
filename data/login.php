<?php
session_start();
require_once('../class/Login.php');

if (isset($_POST['login-user'])) {

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = trim($_POST['password']);

    $login = new Login();
    $result = $login->login($password, $email);

    if ($result['success']) {
        echo json_encode(['redirect' => $result['redirect']]);
        exit;
    } else {
        echo json_encode(['error' => $result['error']]);
        exit;
    }
}

if (isset($_POST['check_email'])) {
    $email  = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

    $check = new Login();
    $result = $check->checkEmail($email);

    $response = array();

    if ($result) {
        $response['success'] = 'The link for changing password is sent to your email';
        $response['redirect'] = '../dist/forgot-password-gateway.php';
    } else {
        $response['error'] = 'Account not found';
    }
    echo json_encode($response);
    exit();
}

if (isset($_POST['update_password'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $newPassword = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_SPECIAL_CHARS);
    $confirmPassword = filter_input(INPUT_POST, 'cpassword', FILTER_SANITIZE_SPECIAL_CHARS);

    $response = [];

    if ($newPassword !== $confirmPassword) {
        $response['error'] = 'Passwords do not match';
    } else {
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $change = new Login();
        $result = $change->updatePassword($email, $newPasswordHash);

        if ($result) {
            $response['success'] = 'Password succesfully updated';
            $response['redirect'] = '../dist/login.php';
        } else {
            $response['error'] = 'Error updating the password';
        }
    }

    echo json_encode($response);
    exit;
}
