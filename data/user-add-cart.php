<?php

require('../class/Booking.php');

$item_id = $_POST['item_id'];
$user_id = $_POST['user_id'];
$quantity = $_POST['item_quantity'];

$cart = new Booking();
$row = $cart->addtoCart($item_id, $user_id, $quantity);

$response = array();

if ($row === true) {
    $response['status'] = "success";
    $response['message'] = "Item added to cart";
} else {
    $response['status'] = "error";
    $response['message'] = "Error adding item to cart";
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

?>
