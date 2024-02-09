<?php

require_once('../class/Booking.php');


$resID = $_POST['resID'];

$approve = new Booking();
$result = $approve->approveBookReq($resID);
