<?php

if (isset($_POST['total'])) {
    $food = $_POST['food'];
    $users_id = $_POST['users_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $date1 = date_create($start);
    $date2 = date_create($end);

    $interval = date_diff($date1, $date2);

    // Kuhas value drekta
    $days = $interval->days;
    $days * 24;

    $total = number_format($days);

    $totalcost = ($price * $days) * $quantity;

    echo "<br> ID : $users_id . <br>$food";
    echo "<br> Quantity : $quantity";
    echo "<br> Days : $total";
    echo "<br><br> Item: $price";
    echo "<br><br> Total cost:$totalcost";
}
