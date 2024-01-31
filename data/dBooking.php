<?php

session_start();

require_once '../database/Connection.php';
require_once '../class/cBooking.php';

$booking = new Booking();
$result = $booking->checkData();


if (isset($_POST['checkout'])) {
    $i_id = $_POST['id'];
    $meal = $_POST['meal'];
    $users_id = $_POST['users_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $available = $_POST['available'];
    $start = $_POST['start'];
    $end = $_POST['end'];
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
    $row = $item->validateBooking($quantity, $available, $start,  $end);
}

if (isset($_POST['placed'])) {
    
    $res_number = isset($_POST['res_number']) ? $_POST['res_number'] : rand(999999999, 10000000);
    $i_id = $_POST['i_id'];
    $users_id = $_POST['users_id'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $meal = $_POST['meal'];
    $totalcost = $_POST['total'];
    $payment = $_POST['payment'];
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    $placed = new Booking();
    $result = $placed->placedBooking($res_number, $i_id, $users_id, $start, $end, $meal, $totalcost, $payment);
}


