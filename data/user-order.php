<?php

require_once('../database/Connection.php');
$db = new Dbh();
$conn = $db->connect();

if (isset($_POST['get_order'])) {
    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    $food_name = filter_var($_POST['food_name'], FILTER_SANITIZE_SPECIAL_CHARS);

    if ($user_id && $price && $food_name) {
        $response = array(
            'success' => true,
            'user_id' =>  $user_id,
            'price' =>  $price,
            'food_name' =>  $food_name
        );
    } else {
        $response = array(
            'success' => false,
        );
    }

    echo json_encode($response);
    exit();
}

if (isset($_POST['place_order'])) {

    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
    $food_name = filter_input(INPUT_POST, 'food_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_name = filter_input(INPUT_POST, 'user_name', FILTER_SANITIZE_SPECIAL_CHARS);
    $user_number = filter_input(INPUT_POST, 'user_number', FILTER_SANITIZE_SPECIAL_CHARS);
    $serves = filter_input(INPUT_POST, 'serves', FILTER_SANITIZE_SPECIAL_CHARS);
    $room = filter_input(INPUT_POST, 'room', FILTER_SANITIZE_SPECIAL_CHARS);
    $msg = filter_input(INPUT_POST, 'msg', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($user_id) || empty($price) || empty($food_name) || empty($user_name) || empty($user_number) || empty($serves) || empty($room) || empty($msg)) {
        $response = array(
            'error' => "Empty fields are not allowed.",
        );
    } else {
        $stmt = $conn->prepare("INSERT INTO orders (user_id, price, food_name, user_name, user_number, serves, room, msg, order_date, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), 'Waiting')");
        $stmt->bind_param('iissiiss', $user_id, $price, $food_name, $user_name, $user_number, $serves, $room, $msg);

        if ($stmt->execute()) {
            $response = array(
                'success' => "Order placed successfully!",
            );
        } else {
            $response = array(
                'error' => "Error placing order. Please try again later.",
            );
        }
    }

    echo json_encode($response);
    exit();
}
