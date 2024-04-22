<?php

require('../class/Users.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $ratingCaption = filter_input(INPUT_POST, 'ratingCaption', FILTER_SANITIZE_FULL_SPECIAL_CHARS ) ?: null;
    $userEmail = filter_input(INPUT_POST, 'userEmail', FILTER_SANITIZE_FULL_SPECIAL_CHARS );
    $ratingData = filter_input(INPUT_POST, 'ratingData', FILTER_SANITIZE_FULL_SPECIAL_CHARS );

    $status = 'Pending';

    date_default_timezone_set('Asia/Manila');
    $date = new DateTime();
    $formattedDate = $date->format('Y:m:d H:i:s');

    $uploadDirectory = isset($_POST['uploadDirectory']) ? $_POST['uploadDirectory'] : '../uploads/';
    $fileNames = array();

    if (!empty($_FILES['photosUpload']['size'][0])) {
        foreach ($_FILES['photosUpload']['tmp_name'] as $key => $tmp_name) {

            $fileName = $_FILES['photosUpload']['name'][$key];
            $targetFile = $uploadDirectory . basename($fileName);

            if (move_uploaded_file($tmp_name, $targetFile)) {
                $fileNames[] = $targetFile;
            } else {
                return 'error' . $fileName;
            }
        }
    } else {
        $fileNames = null;
    }

    $imgJson = json_encode($fileNames);

    $rating = new Users();
    $result = $rating->addRating($ratingData, $userEmail, $ratingCaption, $imgJson, $formattedDate, $status);

    if ($result) {
        $response = array(
            'success' => 'Successfully added rating!'
        );
    } else {
        $response = array(
            'error' => 'An error occur while adding the rating. Please try again later!'
        );
    }
    echo json_encode($response);
    exit();
}

