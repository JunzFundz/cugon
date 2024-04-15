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

                        if ($rows['reg_date'] === '0000-00-00' || $rows['reg_date'] == '') {

                                if ($currentDate->format('Y-m-d') == $date1->format('Y-m-d')) {
                                        print "The start date is today and end in " . $date2->format('Y-m-d');
                                } else if ($currentDate->format('Y-m-d') > $date2->format('Y-m-d')) {
                                        echo"Session expired";
                                } else {
                                        print "It will start on " . $date1->format('M d ') . " and ends in " . $date2->format('d D, Y');
                                }
                        } else {
                                if ($currentDate->format('Y-m-d') == $regDate->format('Y-m-d')) {
                                        print "The start date is today.";
                                } else if ($currentDate->format('Y-m-d') > $regDate->format('Y-m-d')) {
                                        echo"Session expired";
                                } else {
                                        print "Will start on " . $regDate->format('M d, Y');
                                }
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
                                                        if ($rows['reg_date'] === '0000-00-00' || $rows['reg_date'] == '') {
                                                                print $date1->format('M d') . "-" . $date2->format('d, Y');
                                                        } else {
                                                                print $regDate->format('M d, Y');
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
                                                                <td style="font-size: small; color: red;"><?= number_format($rows['total']) ?></td>
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