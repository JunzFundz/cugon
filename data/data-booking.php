<?php

session_start();

require('../class/Booking.php');

$booking = new Booking();
$result = $booking->checkData();


if (isset($_POST['checkout'])) {
    $i_id = $_POST['id'];
    $meal = $_POST['meal'];
    $users_id = $_POST['users_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $available = $_POST['available'];
    $regular_date = $_POST['regular_date'];
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

    if(empty($totaldays)) {
        //if empty ang date sa options
        $totalcost = number_format($price * $quantity);
    }else{
        //staycation e total niya ang days 
        $totalcost = number_format(($price * $days) * $quantity);
    }
    return $totalcost;

    $item = new Booking();
    $row = $item->validateBooking($quantity, $available, $start,  $end);
}




