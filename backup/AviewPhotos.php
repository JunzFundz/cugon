<?php

require '../database/Connection.php';

$sql = 'SELECT * FROM cards ORDER BY card_id';
$result = mysqli_query($conn, $sql);

?>