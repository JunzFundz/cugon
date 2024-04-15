<?php

require('../class/Transactions.php');

$see_all = new Transactions();
$result = $see_all->get_users_transactions();


if (isset($_POST['time_in'])) {
    $user = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $t_number = filter_var($_POST['t_number'], FILTER_SANITIZE_NUMBER_INT);
    $r_number = filter_var($_POST['r_number'], FILTER_SANITIZE_NUMBER_INT);

    $in = new Transactions();
    $result = $in->startIn($user, $t_number, $r_number);
}

if (isset($_POST['time_out'])) {
    $user = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $t_number = filter_var($_POST['t_number'], FILTER_SANITIZE_NUMBER_INT);
    $r_number = filter_var($_POST['r_number'], FILTER_SANITIZE_NUMBER_INT);

    $in = new Transactions();
    $result = $in->timeOut($user, $t_number, $r_number);
}
