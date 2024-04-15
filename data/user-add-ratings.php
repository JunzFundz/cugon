<?php

require('../class/Users.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['submit'])) {
        $ratingCaption = $_POST['ratingCaption'];
        $userEmail = $_POST['userEmail'];
        $ratingData = $_POST['ratingData'];
        $status = 'Pending';

        date_default_timezone_set('Asia/Manila');
        $date = new DateTime();
        $formattedDate = $date->format('Y:m:d H:i:s');

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

    if(isset($_POST['submit_rate'])){

        $quality = $_POST['quality'];
        $service = $_POST['service'];
        $comments = $_POST['comments'];
        $user_id = $_POST['user_id'];
        $item_id = $_POST['item_id'];

        $item_rating = new Users();
        $result = $item_rating->item_rating($quality, $service, $comments, $user_id, $item_id);
    }
}
