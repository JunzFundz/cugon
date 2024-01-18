<?php


include '../database/Connection.php';
include '../class/cCards.php';

$card = new Cards();
$result = $card->cardData();

if (isset($_GET['card_id'])) {

    $card_id = $_GET['card_id'];

    $card = new Cards();
    $result = $card->editCards($card_id);
    
}

if (isset($_GET['card_id'])) {

    $card_id = $_GET['card_id'];

    $card = new Cards();
    $result = $card->deleteCard($card_id);

    header('location: ../Admin/Cards.php');

}

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $img_desc = $_POST["img_desc"];
    $img_dir = $_FILES["img_dir"]["name"];

    $card = new Cards();
    $result = $card->addCard($name, $img_dir, $img_desc);
}

if (isset($_POST['update'])) {

    $id = $_POST['card_id'];
    $name = $_POST['name'];
    $img_desc = $_POST['img_desc'];
    $newimg = $_FILES['img_dir']['name'];
    $old_img = $_POST['oldimg'];

    $card = new Cards();
    $result = $card->updateCard($id, $name, $img_desc, $newimg, $old_img);
}
