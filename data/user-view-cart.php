<?php 

require('../class/Booking.php');

if (isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];

    $viewItem = new Booking();
    $result = $viewItem->viewCartItems($user_id);
}
?>