<?php

require('../class/Booking.php');

$item_id = $_POST['item_id'];
$user_id = $_POST['user_id'];
$quantity = $_POST['item_quantity'];

header('Content-Type: application/json');

$cart = new Booking();
$result = $cart->addtoCart($item_id, $user_id, $quantity);

if ($result) {
    echo json_encode(true);
} else {
    echo json_encode(false); 
}
?>
