<?php
include('../class/Users.php');

$item = new Users();
$result2 = $item->rooms();
$result3 = $item->cottage();
$result4 = $item->foods();

// if (isset($_GET['user_id'])) {
//     $users_id = $_POST['users_id'];
    
//     header('Content-Type: application/json');
//     $loadInfo = new Users();
//     $user_info  = $loadInfo->getUserInfo($users_id);

//     echo json_encode($user_info);
// }

if (isset($_GET['code'])) {
    require('../config.php');

    try {
        $accessToken = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);
        if (!isset($accessToken['error'])) {
            $gclient->setAccessToken($accessToken);
            $payload = $gclient->verifyIdToken();

            $email = $payload['email'];
            $name = $payload['name'];
            $token = $accessToken['access_token'];

            $check = new Users();
            $result = $check->checkUser($email, $name, $token);
        } else {
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}
