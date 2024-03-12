<?php

include('../class/Transactions.php');


if (isset($_POST['check_records'])) {
        $userID = $_POST['userID'];

        $records = new Transactions();
        $result = $records->userRecords($userID);

        if ($result && $result->num_rows > 0) {
                $groupedRecords = [];

                while ($rows = $result->fetch_assoc()) {
                        $resNumbers = explode(',', $rows['res_numbers']);
                        $itemNames = explode(',', $rows['item_names']);
                        $itemPrices = explode(',', $rows['item_prices']);
                        $itemQuantities = explode(',', $rows['item_quantities']);

                        //determine if the start date starts today 
                        $date1 = date_create($rows['start']);
                        $date2 = date_create($rows['end']);
                        $interval = date_diff($date1, $date2);

                        // Get the current date
                        $currentDate = date_create();
                        $startDateTime = date_create($rows['start']);
                        $dateFormatted = date('M-d-Y', strtotime($rows['start']));

                        if ($currentDate->format('Y-m-d') == $startDateTime->format('Y-m-d')) {
                                echo "The start date is today.";
                        } else {
                                echo "It will start on " . $dateFormatted;
                        }

                        // Kuhas value drekta
                        $days = $interval->days;
                        $totaldays = number_format($days);
                        $timeRemaining = $totaldays * 24;

?>

                        <div style="margin: 20px;">
                                <div class="row g-3">
                                        <div class="col-sm">
                                                <label for="" style="font-size: small; font-weight:600;">Email:</label>
                                                <h6 style="font-size: small; font-weight:300;"><?= $rows['email'] ?></h6>
                                        </div>
                                        <div class="col-sm">
                                                <label for="" style="font-size: small; font-weight:600;">Phone:</label>
                                                <h6 style="font-size: small; font-weight:300;"><?= $rows['phone'] ?></h6>
                                        </div>
                                        <div class="col-sm">
                                                <label for="" style="font-size: small; font-weight:600;">Transaction ID:</label>
                                                <h6 style="font-size: small; font-weight:300;"><?= $rows['transaction_number'] ?></h6>
                                        </div>
                                        <div class="col-sm">
                                                <label for="" style="font-size: small; font-weight:600;">Total days:</label>
                                                <h6 style="font-size: small; font-weight:300;"><?php echo $totaldays ?></h6>
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
                                        <h6 style="font-size: medium; color: red; float:right"><?= $rows['status'] ?></h6>
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