<?php

require_once('../class/Booking.php');


$resID = $_POST['resID'];
$userID = $_POST['userID'];
$tranNum = rand(99999, 1000000);
$itemIDs = $_POST['itemIDs'];
$itemQuantities = $_POST['itemQuantities'];

$approve = new Booking();
$result = $approve->approveBookReq($resID, $userID, $tranNum, $itemIDs, $itemQuantities);
