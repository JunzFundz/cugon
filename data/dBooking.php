<?php


include '../database/Connection.php';
include '../class/cBooking.php';

$booking = new Booking();
$result = $booking->checkData();