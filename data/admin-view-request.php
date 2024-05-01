<?php

require('../class/Booking.php');


        //security to my output

if (isset($_POST['getUserRequest'])) {
        $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);
        $resID = filter_input(INPUT_POST, 'resID', FILTER_VALIDATE_INT);
        $itemID = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);

        $booking = new Booking();
        $result = $booking->viewRequest($userID, $resID, $itemID);

        if ($result && $result->num_rows > 0) {
                while ($rows = $result->fetch_assoc()) {

                        $regDate = date_create($rows['reg_date']);
                        $date1 = date_create($rows['start']);
                        $date2 = date_create($rows['end']);
                        $interval = date_diff($date1, $date2);
                        $currentDate = date_create();

                        if ($rows['reg_date'] === '0000-00-00' || $rows['reg_date'] == '') {
                                $dates = $date1->format('M d ') . " to " . $date2->format('d D, Y');
                        } else {
                                $dates = $regDate->format('M d, Y');
                        } ?>

                        <div style="margin: 20px;">
                                <div class="row">
                                        <div class="col-sm">
                                                <label for="">Email:</label>
                                                <h6><?= $rows['email'] ?></h6>
                                        </div>
                                        <div class="col-sm">
                                                <label for="">Name:</label>
                                                <h6><?= $rows['full_name'] ?></h6>
                                        </div>
                                        <div class="col-sm">
                                                <label for="">Phone:</label>
                                                <h6><?= $rows['phone'] ?></h6>
                                        </div>
                                        <div class="col-sm">
                                                <label for="">Total days:</label>
                                                <h6><?php echo $dates ?></h6>
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
                                                        </tr>
                                                </thead>
                                                <tbody>
                                                        <tr>
                                                                <td style="font-size: small; color: grey;"><?= $rows['item_name'] ?></td>
                                                                <td style="font-size: small; color: grey;"><?= $rows['res_number'] ?></td>
                                                                <td style="font-size: small; color: grey;"><?= $rows['i_price'] ?></td>
                                                                <td style="font-size: small; color: grey;"><?= $rows['quantity'] ?></td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>
                                <div>
                                        <span style="font-size: small; color: grey; float:right">Total: ₱ <?= number_format($rows['total']) ?></span>
                                </div>
                        </div>

                        <br>
<?php }
        } else {
                echo "No records found.";
        }
}
?>