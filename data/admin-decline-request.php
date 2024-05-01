<?php

include('../class/Booking.php');

if (isset($_POST['decline_request'])) {
    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $res_id = filter_var($_POST['res_id'], FILTER_SANITIZE_NUMBER_INT);
    $res_num = filter_var($_POST['res_num'], FILTER_SANITIZE_NUMBER_INT);

    if ($user_id && $res_id && $res_num) {
        $response = array(
            'success' => true,
            'user_id' => $user_id,
            'res_id' => $res_id,
            'res_num' => $res_num
        );
    } else {
        $response = array(
            'success' => false,
            'error' => 'Fetching unsuccesfull'
        );
    }
    echo json_encode($response);
    exit();
}

if (isset($_POST['confirm_decline'])) {

    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
    $res_id = filter_input(INPUT_POST, 'res_id', FILTER_SANITIZE_NUMBER_INT);
    $res_num = filter_input(INPUT_POST, 'res_num', FILTER_SANITIZE_NUMBER_INT);
    $reason = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_SPECIAL_CHARS);

    if ($user_id === false || $res_id === false || $res_num === false || $reason === false) {
        $response = array(
            'error' => 'Invalid input data.'
        );
    }

    $reason = html_entity_decode($reason, ENT_QUOTES, 'UTF-8');

    $decline = new Booking();
    $result = $decline->declineReq($user_id, $res_id, $res_num, $reason);

    if ($result) {
        $response = array(
            'success' => "Reservation declined"
        );
    } else {
        $response = array(
            'error' => 'Decline failed!'
        );
    }
    echo json_encode($response);
    exit();
}
