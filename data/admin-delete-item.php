<?php

require('../access/aItems.php');

$itemID = $_POST['itemID'];

$delete = new AccessItems();
$result = $delete->delete($itemID);
