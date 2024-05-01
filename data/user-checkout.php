<?php

require('../class/Booking.php');

if (isset($_GET['i_id'])) {
    $i_id = $_GET['i_id'];
    $booking = new Booking();
    $result = $booking->getItem($i_id);
    $row = $result->fetch_assoc();

    $data = $booking->data($i_id);
    $client_rating = $booking->itemRating($i_id);

    $ratingdata = $booking->itemRatingall($i_id);
    $ratings = $ratingdata['ratings'];
    $ratingCounts = $ratingdata['counts'];

    function calculateAverageRating($ratingCounts)
    {
        $totalRating = 0;
        $totalReviews = 0;

        foreach ($ratingCounts as $rating => $count) {
            $totalRating += $rating * $count;
            $totalReviews += $count;
        }

        if ($totalReviews == 0) {
            return 0;
        }

        return $totalRating / $totalReviews;
    }

    $averageRating = calculateAverageRating($ratingCounts);
}

if (isset($_POST['get-preffered-item'])) {
    $dateOptions = $_POST['dateOptions'];
    $users_id = $_POST['users_id'];
    $item_name = $_POST['item_name'];
    $item_id = $_POST['item_id'];
    $available = $_POST['available'];
    $payment = $_POST['payment'];

    date_default_timezone_set('Asia/Manila');
    $date = new DateTime();
    $get_date = $date->format('Y-m-d');

    if ($dateOptions == 'reg') {
        $regular_date = filter_input(INPUT_POST, 'regular_date', FILTER_SANITIZE_SPECIAL_CHARS);
        $date = date("Y-m-d", strtotime($regular_date));

        if ($get_date >= $regular_date) {
            return false;
        }

        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $totaldays = 1;
        $totalcost = $price * $quantity;

        return true;
    } else if ($dateOptions == 'stay') {

        $start = $_POST['start'];
        $end = $_POST['end'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];


        $date1 = date_create($start);
        $date2 = date_create($end);
        $interval = date_diff($date1, $date2);

        // Kuhas value drekta
        $days = $interval->days;
        $days * 24;

        $totaldays = number_format($days);
        $totalcost = ($price * $days) * $quantity;
    }
}
