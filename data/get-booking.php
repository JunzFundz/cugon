
<?php

if(isset($_POST['checkout'])){
    $id = $_POST['id'];
    $meal = $_POST['meal'];
    $users_id = $_POST['users_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $available = $_POST['available'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $quantity = $_POST['quantity'];
    $payment = $_POST['payment'];

    $date1 = date_create($start);
    $date2 = date_create($end);
    $interval = date_diff($date1, $date2);

    // Kuhas value drekta
    $days = $interval->days;
    $days * 24;

    $totaldays = number_format($days);
    $totalcost = number_format(($price * $days) * $quantity);

    echo $meal;
}

