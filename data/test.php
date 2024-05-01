<?php
include('../class/Users.php');

if (isset($_POST['users_id'])) {
    $users_id = filter_input(INPUT_POST, 'users_id', FILTER_SANITIZE_NUMBER_INT);

    if ($users_id!== false && $users_id > 0) {
        try {
            $loadInfo = new Users();
            $user_info = $loadInfo->getUserInfo($users_id);
            echo json_encode($user_info);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['error' => 'Failed to load user info']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Invalid user ID']);
    }
}


