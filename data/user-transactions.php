
<?php

require('../class/Booking.php');

$adminView = new Booking();
$result = $adminView->adminViewTran();

if(isset($_GET['user_id'])){
    $user_id = filter_input(INPUT_GET, 'user_id', FILTER_SANITIZE_NUMBER_INT);

    $startTran = new Booking();
    $result = $startTran->usersTransaction($user_id);
}
?>