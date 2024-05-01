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

if (isset($_POST['save--auth'])) {

    $id = filter_var($_POST["user_id"], FILTER_SANITIZE_NUMBER_INT);
    $oldPassword = trim(filter_var($_POST['old_pass'], FILTER_SANITIZE_SPECIAL_CHARS));
    $newPassword = trim(filter_var($_POST['new_pass'], FILTER_SANITIZE_SPECIAL_CHARS));
    $re_pass = trim(filter_var($_POST['re_pass'], FILTER_SANITIZE_SPECIAL_CHARS));

    $response = [];

    if ($id === '' || $oldPassword === '' || $newPassword === '' || $newPassword === '') {
        $response['error'] = 'Please fill up all required fields.';
        return false;
    }

    $auth = new Users();
    $check = $auth->CAuth($id, $oldPassword);

    if ($check) {
        if ($newPassword !== $re_pass) {
            $response['error'] = 'Passwords do not match';
        } else {
            $newPasswordHash = password_hash($re_pass, PASSWORD_BCRYPT);
            $result = $auth->changeAuth($id, $newPasswordHash);

            if ($result) {
                $response['success'] = 'Password updated successfully';
            } else {
                $response['error'] = 'Error updating the password';
            }
        }
    } else {
        $response['error'] = 'Old password is incorrect';
    }

    echo json_encode($response);
    exit;
}

if (isset($_POST['update--'])) {

    if (
        empty($_POST['user_id']) ||
        empty($_POST['full_name']) ||
        empty($_POST['email']) ||
        empty($_POST['phone']) ||
        empty($_POST['user']) ||
        empty($_POST['city']) ||
        empty($_POST['zip']) ||
        empty($_POST['brgy'])
    ) {
        $response['success'] = false;
        $response['error'] = 'All fields are required';
    } else {

        $uid = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
        $set_name = filter_var($_POST['full_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $set_email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
        $set_phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
        $set_user = filter_var($_POST['user'], FILTER_SANITIZE_SPECIAL_CHARS);
        $set_city = filter_var($_POST['city'], FILTER_SANITIZE_SPECIAL_CHARS);
        $set_zip = filter_var($_POST['zip'], FILTER_SANITIZE_NUMBER_INT);
        $set_brgy = filter_var($_POST['brgy'], FILTER_SANITIZE_SPECIAL_CHARS);

        $save = new Users();
        $update = $save->Udata($set_user, $set_email, $set_phone, $set_name, $set_city, $set_brgy, $set_zip, $uid);

        if ($update) {
            $response['success'] = true;
            $response['success'] = 'User information updated successfully';
        } else {
            $response['success'] = false;
            $response['error'] = 'Failed to update user information';
        }
    }

    echo json_encode($response);
    exit;
}
