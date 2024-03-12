<?php

require('../class/Users.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ratingCaption = $_POST['ratingCaption'];
    $userEmail = $_POST['userEmail'];
    $ratingData = $_POST['ratingData'];
    $status = 'Pending';

    $uploadDirectory = '../uploads/';
    $fileNames = array();

    foreach ($_FILES['photosUpload']['tmp_name'] as $key => $tmp_name) {
        $fileName = $_FILES['photosUpload']['name'][$key];
        $targetFile = $uploadDirectory . basename($fileName);

        if (move_uploaded_file($tmp_name, $targetFile)) {
            $fileNames[] = $targetFile;
        } else {
            return 'error' . $fileName;
        }
    }

    $imgJson = json_encode($fileNames);

    $rating = new Users();
    $result = $rating->addRating($ratingData, $userEmail, $ratingCaption, $imgJson, $status);

    if ($result) {
        return 'success';
    } else {
        return  'failure';
    }
} else {
    return 'invalid';
}

?>