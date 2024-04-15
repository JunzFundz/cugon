<?php

require('../class/Items.php');

$item = new Items();
$result = $item->allItems();
$result2 = $item->rooms();
$result3 = $item->cottage();

// if (isset($_GET['i_id'])) {
//     $i_id = $_GET['i_id'];

//     $item = new Items();
//     $row = $item->editItems($i_id);
// }

if (isset($_POST['check_view'])) {
    $i_id = $_POST['item_id'];

    $edit = new Items();
    $result = $edit->editItems($i_id);
}

if (isset($_POST['submit'])) {
    $i_type = $_POST['i_type'];
    $i_name = $_POST['i_name'];
    $i_img = $_FILES['i_img']["name"];
    $i_desc = $_POST['i_desc'];
    $i_price = $_POST['i_price'];
    $i_quantity = $_POST['i_quantity'];

    $item = new Items();
    $result = $item->additem($i_type, $i_name, $i_img, $i_desc, $i_price, $i_quantity);
}

if (isset($_POST['update'])) {
    $i_id = $_POST['i_id'];
    $i_name = trim($_POST['i_name']);
    $i_desc = trim($_POST['i_desc']);
    $i_type = trim($_POST['i_type']);
    $i_price = $_POST['i_price'];
    $i_quantity = $_POST['i_quantity'];
    $i_img = $_FILES['i_img']['name'];

    $save = new Items();
    $result = $save->updateItems($i_id, $i_name, $i_desc, $i_price, $i_type, $i_quantity, $i_img);
    
}
