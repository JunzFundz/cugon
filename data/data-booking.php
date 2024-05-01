<?php

require('../class/Booking.php');

$booking = new Booking();
$result = $booking->tableData();
$statusRequest = $booking->fetchRequest();




