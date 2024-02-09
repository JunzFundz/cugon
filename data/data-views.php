<?php

require '../class/Booking.php';


$userID = $_POST['userID'];

$booking = new Booking();
$result = $booking->checkNewData($userID);

foreach ($result as $rows) { ?>

    <div class="row g-3">
        <div class="col-sm-5">
            <input type="text" class="form-control input-color" disabled value="<?= $rows['email'] ?>" aria-label="City">
        </div>
        <div class="col-sm">
            <input type="text" class="form-control input-color" disabled value="<?= $rows['phone'] ?>" aria-label="State">
        </div>
        <div class="col-sm">
            <input type="text" class="form-control input-color" disabled value="<?= $rows['res_number'] ?>" aria-label="Zip">
        </div>
    </div>
<br>
    <div class="row g-3">
        <div class="col-sm">
            <input type="text" class="form-control input-color" disabled value="<?= $rows['city'] ?>" aria-label="Zip">
        </div>
        <div class="col-sm-5">
            <input type="text" class="form-control input-color" disabled value="<?= $rows['province'] ?>" aria-label="City">
        </div>
        <div class="col-sm">
            <input type="text" class="form-control input-color" disabled value="<?= $rows['region'] ?>" aria-label="State">
        </div>
    </div>

<?php
}
?>