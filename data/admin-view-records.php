<?php

include('../class/Transactions.php');


if (isset($_POST['check_records'])) {
        $userID = $_POST['userID'];

        $records = new Transactions();
        $result = $records->userRecords($userID);

        if ($result && $result->num_rows > 0) {
                $groupedRecords = [];

                while ($rows = $result->fetch_assoc()) {

                        $regDate = date_create($rows['reg_date']);
                        $date1 = date_create($rows['start']);
                        $date2 = date_create($rows['end']);
                        $interval = date_diff($date1, $date2);

                        $currentDate = date_create();
                        $startDateTime = date_create($rows['start']);
                        $dateFormatted = date('M-d-Y', strtotime($rows['start']));

                        if (($date1) && ($date2)) {
                                print "The date is" . $regDate->format('Y-m-d');
                        }

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
                                                <label for="" style="font-size: small; font-weight:600;">Date</label>
                                                <h6 style="font-size: small; font-weight:300;">
                                                        <?php
                                                        if ($date1 == '0000-00-00' && $date2 == '0000-00-00') {
                                                                echo "The date is " . date_format($regDate, 'M-d-Y');
                                                        }else{
                                                                echo date_format($date1, 'M-d-y');
                                                        }
                                                        ?>
                                                </h6>
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
                                                <tbody>
                                                        <tr>
                                                                <td style="font-size: small; color: grey;"><?= $rows['item_name'] ?></td>
                                                                <td style="font-size: small; color: grey;"><?= $rows['res_number'] ?></td>
                                                                <td style="font-size: small; color: grey;"><?= $rows['price'] ?></td>
                                                                <td style="font-size: small; color: red;"><?= $rows['quantity'] ?></td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                        <!-- <h6 style="font-size: small; color: grey; float:right">Subtotal: ₱<?= number_format($totalSubtotal) ?></h6><br>
                                        <h6 style="font-size: small; color: grey; float:right">Total: ₱<?= number_format($totaldays * $totalSubtotal) ?></h6><br>
                                        <h6 style="font-size: medium; color: red; float:right"><?= $rows['status'] ?></h6> -->

                                        <a href="receipt.php?user_id=<?= $rows['user_id'] ?>">Receipt</a>
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