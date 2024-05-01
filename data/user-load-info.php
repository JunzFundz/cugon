<?php
include('../class/Users.php');

$item = new Users();
$result2 = $item->rooms();
$result3 = $item->cottage();
$result4 = $item->foods();


if (isset($_POST['search'])) {
    $searchTerm = trim($_POST['searchTerm']);
    $searchTerm = htmlspecialchars($searchTerm, ENT_QUOTES, 'UTF-8');

    $itemsObj = new Users(); // Corrected the class name to Items
    $result = $itemsObj->search($searchTerm);

    $items = array();
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
    echo json_encode($items);
}


if (isset($_GET['user_id']) && isset($_GET['email'])) {
    $user_id = filter_var($_GET['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($_GET['email'], FILTER_SANITIZE_EMAIL);

    $loadInfo = new Users();
    $user_info  = $loadInfo->load_user_info($user_id, $email);
    $res  = $loadInfo->load_user_reservation($user_id);
    $item  = $loadInfo->load_user_itemrating($user_id);
    $notif = $loadInfo->userNotification($user_id);
}

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
