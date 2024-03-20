<?php

session_start();

if (isset($_POST['login-user'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    require('../class/Login.php');
    header('Content-Type: application/json');

    $newlogin = new Login();
    $results = $newlogin->newlogin($email, $password);

    $response = array();

    if ($results) {
        $userId = $_SESSION['user_id']; 
        $email = $_SESSION['email']; 

        $redirect = ($userId === 280) ? '../Admin/Home.php' : '../User/Items.php';

        $response = [
            'user_id' => $userId,
            'email' => $email,
            'redirect' => $redirect
        ];
    } else {
        $response = [
            'error' => 'Incorrect credentials or account not verified.'
        ];
    }

    echo json_encode($response);
    exit;
}
