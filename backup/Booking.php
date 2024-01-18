<?php

require '../database/Connection.php';

$sql = 'SELECT res_tb.res_number, res_tb.booking_email, users.email, res_tb.numChild, res_tb.numAdults, res_tb.date, res_tb.payment
FROM res_tb 
INNER JOIN users ON res_tb.users_id = users.user_id WHERE status = "Pending"';
$result = mysqli_query($conn, $sql);

?>