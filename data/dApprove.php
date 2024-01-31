<?php


require_once '../database/Connection.php';
require_once '../class/cBooking.php';


$resID = $_POST['resID'];

$approve = new Booking();
$result = $approve->approveBookReq($resID);

if ($result) {
    echo "Success";
} else {
    echo "Error";
}