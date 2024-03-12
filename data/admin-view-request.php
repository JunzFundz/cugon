<?php

require ('../class/Booking.php');


if (isset($_POST['getUserRequest'])) {
        $userID = $_POST['userID'];

        $booking = new Booking();
        $result = $booking->checkNewData($userID);


        if ($result && $result->num_rows > 0) {
                $groupedRecords = [];

                while ($rows = $result->fetch_assoc()) {
                        $resNumbers = explode(',', $rows['res_numbers']);
                        $itemNames = explode(',', $rows['item_names']);
                        $itemPrices = explode(',', $rows['item_prices']);
                        $itemQuantities = explode(',', $rows['item_quantities']);

                        $totaldays = '';

                        if ($rows['start'] === null || $rows['start'] == '' && $rows['end'] === null || $rows['end'] == '') {

                                $sigledate = $rows['reg_date'];

                                $totaldays = 1;

                        } else {
                                $date1 = date_create($rows['start']);
                                $date2 = date_create($rows['end']);
                                $interval = date_diff($date1, $date2);
        
                                // Kuhas value drekta
                                $days = $interval->days;
                                $days * 24;
        
                                $totaldays = number_format($days);
                        }


?>

                        <div style="margin: 20px;">
                                <div class="row g-3">
                                        <div class="col-sm">
                                                <label for="">Email:</label>
                                                <h6><?= $rows['email'] ?></h6>
                                        </div>
                                        <div class="col-sm">
                                                <label for="">Phone:</label>
                                                <h6><?= $rows['phone'] ?></h6>
                                        </div>
                                        <div class="col-sm">
                                                <label for="">Time Remaining:</label>
                                                <h6><?= $rows['phone'] ?></h6>
                                        </div>
                                        <div class="col-sm">
                                                <label for="">Total days:</label>
                                                <h6><?php echo $totaldays ?></h6>
                                        </div>
                                </div><br>
                                <div class="">
                                        <table class="table text-center">
                                                <thead>
                                                        <tr>
                                                                <th style="font-size: small; font-weight:600;">Item name</th>
                                                                <th style="font-size: small; font-weight:600;">Reservation Number</th>
                                                                <th style="font-size: small; font-weight:600;">Prices</th>
                                                                <th style="font-size: small; font-weight:600;">Quantity</th>
                                                                <th style="font-size: small; font-weight:600;">Total</th>
                                                        </tr>
                                                </thead>
                                                <?php
                                                $totalSubtotal = 0;
                                                for ($i = 0; $i < count($resNumbers); $i++) {
                                                        $subtotal = $itemQuantities[$i] * $itemPrices[$i];
                                                        $totalSubtotal += $subtotal;
                                                ?>
                                                        <tbody>
                                                                <tr>
                                                                        <td style="font-size: small; color: grey;"><?= $itemNames[$i] ?></td>
                                                                        <td style="font-size: small; color: grey;"><?= $resNumbers[$i] ?></td>
                                                                        <td style="font-size: small; color: grey;"><?= $itemPrices[$i] ?></td>
                                                                        <td style="font-size: small; color: grey;"><?= $itemQuantities[$i] ?></td>
                                                                        <td style="font-size: small; color: red;"><?= $subtotal ?></td>
                                                                </tr>
                                                        </tbody>
                                                <?php } ?>
                                        </table>
                                        <h6 style="font-size: small; color: grey; float:right">Subtotal: ₱<?= number_format($totalSubtotal) ?></h6><br>
                                        <h6 style="font-size: small; color: grey; float:right">Total: ₱<?= number_format($totaldays * $totalSubtotal) ?></h6><br>

                                </div>
                        </div>
                        <br>
<?php
                }
        } else {
                echo "No records found.";
        }
}
?>