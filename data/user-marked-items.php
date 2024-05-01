<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['item_checkboxes'])) {

        $checkboxValues = filter_input(INPUT_POST, 'item_checkboxes', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
        $itemIds = filter_input(INPUT_POST, 'item_ids', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
        $userIds = filter_input(INPUT_POST, 'user_ids', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
        $prices = filter_input(INPUT_POST, 'prices', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_REQUIRE_ARRAY);
        $quantities = filter_input(INPUT_POST, 'quantities', FILTER_SANITIZE_NUMBER_INT, FILTER_REQUIRE_ARRAY);
        $names = filter_input(INPUT_POST, 'names', FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);

        $subtotal = 0;

        for ($i = 0; $i < count($checkboxValues); $i++) {
            $itemId = $itemIds[$i];
            $userId = $userIds[$i];
            $price = $prices[$i];
            $quantity = $quantities[$i];
            $name = $names[$i];
            $subtotal += $price * $quantity;
        } 

        $dateOptions = filter_input(INPUT_POST, 'dateOptions', FILTER_SANITIZE_SPECIAL_CHARS);
        $payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($dateOptions == 'reg') {
            
            $regular_date = filter_input(INPUT_POST, 'regular_date', FILTER_SANITIZE_SPECIAL_CHARS);
            $totaldays = 1;
            $totalwithdays = $subtotal * $totaldays;

        } else{
            $start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_SPECIAL_CHARS);
            $end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_SPECIAL_CHARS);

            $date1 = date_create($start);
            $date2 = date_create($end);
            $interval = date_diff($date1, $date2);

            $days = $interval->days;
            $days * 24;

            $totaldays = $days;
            $totalwithdays = $subtotal * $totaldays;
        }        
        return $subtotal;
    }
}
?>
