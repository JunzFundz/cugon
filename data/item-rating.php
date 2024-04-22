<?php

require('../class/Users.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['submit_rate'])) {
        
        $quality = filter_input(INPUT_POST, 'quality', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $service = filter_input(INPUT_POST, 'service', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
        $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
        $item_star = filter_input(INPUT_POST, 'item_star', FILTER_VALIDATE_INT);

        $item_rating = new Users();
        $result = $item_rating->item_rating($quality, $service, $comments, $user_id, $item_id, $item_star);

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
}
