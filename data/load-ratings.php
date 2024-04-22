<?php 

require('../class/Users.php');

if(isset($_POST['action']) && $_POST['action'] == 'load_ratings'){
    $average = 0;
    $total_review = 0;
    $five_star = 0;
    $four_star = 0;
    $three_star = 0;
    $two_star = 0;
    $one_star = 0;
    $total_user_rating = 0; // Initialize the variable
    $reviews = array();

    $showratings = new Users();
    $result = $showratings->showRatings();

    foreach($result as $row){
        $imgArray = json_decode($row['img'], true);

        $reviews[] = array(
            'rating_data'   => $row['rating_data'],
            'email'         => $row['email'],
            'caption'       => $row['caption'],
            'img'           => $imgArray,
        );

        switch ($row['rating_data']) {
            case '5':
                $five_star++;
                break;
            case '4':
                $four_star++;
                break;
            case '3':
                $three_star++;
                break;
            case '2':
                $two_star++;
                break;
            case '1':
                $one_star++;
                break;
        }

        $total_review++;
        $total_user_rating += $row['rating_data'];
    }

    $average = $total_user_rating / $total_review;
    
    $output = array(
        'average_rating' => number_format($average, 1),
        'total_review'   => $total_review,
        'five_star'      => $five_star,
        'four_star'      => $four_star,
        'three_star'     => $three_star,
        'two_star'       => $two_star,
        'one_star'       => $one_star,
        'reviews'        => $reviews  
    );

    echo json_encode($output);
}

if(isset($_POST['percentage'])){
    
}