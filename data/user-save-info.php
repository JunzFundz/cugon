<?php

include('../class/Users.php');

if (isset($_POST['set-info'])) {
    $getUserId = $_POST['getUserId'];
    $setName = $_POST['setName'];
    $setEmail = $_POST['setEmail'];
    $setPhone = $_POST['setPhone'];
    $setCity = $_POST['setCity'];
    $setBrgy = $_POST['setBrgy'];
    $setZip = $_POST['setZip'];
    $setMsg = isset($_POST['setMsg']) ? $_POST['setMsg'] : '';
    $created_at = date('Y-m-d H:i:s');

    header('Content-Type: application/json');

    $info = new Users();
    $existingInfo = $info->getUserInfo($getUserId);

    if ($existingInfo) {
        $result = $info->updateInfo($setEmail, $getUserId, $setName, $setPhone, $setCity, $setBrgy, $setZip, $created_at, $setMsg);
    } else {

        $result = $info->addInfo($getUserId, $setName, $setEmail, $setPhone, $setCity, $setBrgy, $setZip, $created_at, $setMsg);
    }

    if ($result) {
        echo json_encode(true); 
    } else {
        echo json_encode(false); 
    }
}



