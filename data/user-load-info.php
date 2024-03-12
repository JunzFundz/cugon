<?php

include('../class/Users.php');


$users_id = $_POST['users_id'];

$loadInfo = new Users();
$user_info  = $loadInfo->getUserInfo($users_id);

echo json_encode($user_info);