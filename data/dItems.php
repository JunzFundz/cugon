<?php


include '../database/Connection.php';
include '../class/cItems.php';
include '../access/aItems.php';

$item = new AccessItems();
$result = $item->view();

if (isset($_GET['i_id'])) {
    $i_id = $_GET['i_id'];
    $item = new AccessItems();
    $row = $item->edit($i_id);
}

if (isset($_POST['submit'])) {
    $i_type = $_POST['i_type'];
     $i_name = $_POST['i_name'];
     $i_img = $_FILES['i_img']["name"];
     $i_desc = $_POST['i_desc'];
     $i_price = $_POST ['i_price'];
     $i_quantity = $_POST['i_quantity'];

    $item = new AccessItems();
    $result = $item->add($i_type, $i_name, $i_img, $i_desc, $i_price, $i_quantity);
    
}

// if (isset($_POST['update'])) {
//     $r_id = $_POST['r_id'];
//     $r_name = $_POST['r_name'];
//     $r_desc = $_POST['r_desc'];
//     $r_price = $_POST['r_price'];
//     $r_available = $_POST['r_available'];
//     $r_newimg = $_FILES['r_img']['name'];
//     $old_img = $_POST['oldimg'];

//     $room = new Rooms();
//     $result = $room->updateCard($r_id, $r_name, $r_desc, $r_price, $r_available, $r_newimg, $old_img);
// }
