<?php

session_start();

require('../class/Booking.php');

$booking = new Booking();
$result = $booking->checkData();




