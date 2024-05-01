<?php

require('../class/Items.php');

$itemID = $_POST['itemID'];

$delete = new Items();
$result = $delete->deleteItem($itemID);


if ($result) {
    $response = array(
        'success' => "Item removed"
    );
} else {
    $response = array(
        'error' => 'Error removing item'
    );
}

echo json_encode($response);
exit();