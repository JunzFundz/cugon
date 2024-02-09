<?php


require('../class/Booking.php');

$resID = $_POST['resID'];

$cancel = new Booking();
$result = $cancel->cancelBookReq($resID);
