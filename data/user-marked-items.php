<?php


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['item_checkboxes'])) {

        $checkboxValues = $_POST['item_checkboxes'];
        $itemIds = $_POST['item_ids'];
        $userIds = $_POST['user_ids'];
        $prices = $_POST['prices'];
        $quantities = $_POST['quantities'];
        $names = $_POST['names'];

        $subtotal = 0;

        for ($i = 0; $i < count($checkboxValues); $i++) {
            $itemId = $itemIds[$i];
            $userId = $userIds[$i];
            $price = $prices[$i];
            $quantity = $quantities[$i];
            $name = $names[$i];
            $subtotal += $price * $quantity;
        } 

        $dateOptions = $_POST['dateOptions'];
        $payment = $_POST['payment'];

        if ($dateOptions == 'reg') {
            
            $regular_date = $_POST['regular_date'];
            $totaldays = 1;
            $totalwithdays = number_format($subtotal * $totaldays);
        } else{
            $start = $_POST['start'];
            $end = $_POST['end'];

            $date1 = date_create($start);
            $date2 = date_create($end);
            $interval = date_diff($date1, $date2);

            $days = $interval->days;
            $days *= 24;

            $totaldays = number_format($days);
            $totalwithdays = number_format($subtotal * $totaldays);
        }        
        return $subtotal;
    }
}
?>
