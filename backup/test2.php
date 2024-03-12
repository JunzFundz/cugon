<?php

require('../class/Booking.php');

if (isset($_GET['i_id'])) {
    $i_id = $_GET['i_id'];
    $booking = new Booking();
    $result = $booking->getItem($i_id);
    $row = $result->fetch_assoc();
}

if (isset($_POST['checkout'])) {
    $meal = $_POST['meal'];
    $users_id = $_POST['users_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $available = $_POST['available'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $quantity = $_POST['quantity'];
    $payment = $_POST['payment'];

    $date1 = date_create($start);
    $date2 = date_create($end);
    $interval = date_diff($date1, $date2);

    // Kuhas value drekta
    $days = $interval->days;
    $days * 24;

    $totaldays = number_format($days);
    $totalcost = number_format(($price * $days) * $quantity);

    $item = new Booking();
    $result = $item->validateBooking($quantity, $available, $start,  $end);
}

if (isset($_POST['get-item'])) {
    
    $res_number = isset($_POST['res_number']) ? $_POST['res_number'] : rand(999999999, 10000000);
    $i_id = $_POST['i_id'];
    $users_id = $_POST['users_id'];
    $regular_date = $_POST['regular_date'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $quantity = $_POST['quantity'];
    $meal = $_POST['meal'];
    $totalcost = $_POST['total'];
    $payment = $_POST['payment'];
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    $placed = new Booking();
    $result = $placed->placedBooking($res_number, $i_id, $users_id,$regular_date, $start, $end, $quantity, $meal, $totalcost, $payment);
}