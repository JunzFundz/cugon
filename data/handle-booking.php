<?php

include('../class/Booking.php');

if (isset($_POST['confirm_cancel'])) {
    $res_id = filter_var($_POST['res_id'], FILTER_VALIDATE_INT);

    if ($res_id) {
        $user = new Booking();
        $result = $user->cancelBookReq($res_id);
        
        if($result){
            $response = array(
                'success' => 'Cancelled successfully!'
            );
        }else{
            $response = array(
                'error' => 'Cancel failed! Please try again.'
            );
        }
    } else {
        $response = array(
            'error' => 'Error occur! Please try again later.'
        );
    }

    echo json_encode($response);
    exit();
}

if (isset($_POST['view-cancel'])) {
    $res_id = filter_var($_POST['res_id'], FILTER_VALIDATE_INT);

    if ($res_id) {
        $response = array(
            'success' => true,
            'res_id' => $res_id
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
