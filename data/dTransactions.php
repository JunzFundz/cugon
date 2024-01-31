
<?php

require_once '../database/Connection.php';
require_once '../class/cBooking.php';

if (isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];
    
    $transaction = new Booking();
    $result = $transaction->userTransaction($user_id);
}
