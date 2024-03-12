<?php 

require_once('../class/Booking.php');

$itemId = $_POST['itemId'];
$userId = $_POST['userId'];

$deleteCart = new Booking();
$result  = $deleteCart->removeFromCart($itemId, $userId);