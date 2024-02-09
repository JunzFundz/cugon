
<?php

require('../class/Booking.php');

$adminView = new Booking();
$result = $adminView->adminViewTran();

if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $startTran = new Booking();
    $result = $startTran->usersTransaction($user_id);
}
?>