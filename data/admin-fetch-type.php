<?php

require('../database/Connection.php');

$dbh = new Dbh();
$db = $dbh->connect();
$result = $db->query("SELECT * FROM tbl_item_type");
$response = array();

if ($result->num_rows > 0) {
    $types = array();
    while ($row = $result->fetch_assoc()) {
        $types[] = array(
            'type' => $row['type']
        );
    }
    $response['success'] = true;
    $response['types'] = $types;
    echo json_encode($response);
} else {
    $response['success'] = false;
    echo json_encode($response);
}