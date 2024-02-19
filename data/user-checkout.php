<?php
session_start();

//data-modal-target="placedModal" data-modal-toggle="placedModal"

require('../class/Booking.php');

if (isset($_POST['checkout'])) {
    $i_id = $_POST['id'];
    $meal = $_POST['meal'];
    $users_id = $_POST['users_id'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $available = $_POST['available'];
    $regular_date = $_POST['regular_date'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $payment = $_POST['payment'];

    $date1 = date_create($start);
    $date2 = date_create($end);
    $interval = date_diff($date1, $date2);

    $days = $interval->days;

    // Calculate total cost based on number of days
    $totalcost = $days * $price * $quantity;
?>
            <input type="text" name="start" id="start" value="<?php echo $totalcost ?>">
            <input type="text" name="end" id="end" value="<?= $row['end'] ?>">
            <input type="text" name="quantity" id="quantity" value="<?= $row['quantity'] ?>">
            <input type="text" name="meal" id="meal" value="<?= $row['meal'] ?>">
<?php
        

}
?>
