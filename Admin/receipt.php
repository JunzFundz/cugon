<?php

include('../class/Transactions.php');

if (isset($_GET['user_id'])) {
    $userID = $_GET['user_id'];

    $records = new Transactions();
    $result = $records->printReceipt($userID);
}
?>
<link rel="stylesheet" href="../src/print.css">
<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<div class=" receipt-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <?php
    if ($result['num_rows'] > 0) {
        $data = $result['data'];

        foreach ($data as $rows) {
                ?>
                        <div class="card-body">
                            <div class="invoice-title">
                                <h4 class="float-end"><span class="badge bg-success font-size-12 ms-2">Paid</span></h4>
                                <div class="mb-4">
                                    <h2 class="mb-1 text-muted">Cugon Bamboo Resort</h2>
                                </div>
                                <div class="text-muted">
                                    <p class="mb-1">6209 Pangalacayan Bindoy Negros Oriental</p>
                                    <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>cugonorg@gmail.com</p>
                                    <p><i class="uil uil-phone me-1"></i> 012-345-6789</p>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="text-muted">
                                        <h5 class="font-size-16 mb-3">Billed To:</h5>
                                        <h5 class="font-size-15 mb-2"><?= $rows['email'] ?></h5>
                                        <p class="mb-1"><?= $rows['brgy'] . ", " . $rows['city'] . " " . $rows['zip_code']?></p>
                                        <p class="mb-1"><?= $rows['email'] ?></p>
                                        <p><?= $rows['phone'] ?></p>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="col-sm-6">
                                    <div class="text-muted text-sm-end">
                                        <div>
                                            <h5 class="font-size-15 mb-1">Transaction number</h5>
                                            <p><?= $rows['transaction_number'] ?></p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Booking date</h5>
                                            <p>12 Oct, 2020</p>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                            <p><?= $rows['created_at'] ?></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="py-2">
                                <h5 class="font-size-15">Booking Summary</h5>

                                <div class="table-responsive">
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
                                        $resNumbers = explode(',', $rows['res_numbers']);
                                        $items = explode(',', $rows['item_names']);
                                        $prices = explode(',', $rows['item_prices']);
                                        $quantity = explode(',', $rows['quantity']);
                                        $totalSubtotal = 0;
                                        for ($i = 0; $i < count($resNumbers); $i++) {
                                            $subtotal = $quantity[$i] * $prices[$i];
                                            $totalSubtotal += $subtotal;

                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td style="font-size: small; color: grey;"><?= $resNumbers[$i] ?></td>
                                                    <td style="font-size: small; color: grey;"><?= $items[$i] ?></td>
                                                    <td style="font-size: small; color: grey;"><?= $prices[$i] ?></td>
                                                    <td style="font-size: small; color: grey;"><?= $quantity[$i] ?></td>
                                                    <td style="font-size: small; color: grey;"><?= $subtotal?></td>
                                                </tr>
                                            </tbody>
                                        <?php } ?>
                                    </table>
                                </div>

                                <div class="d-print-none mt-4">
                                    <div class="float-end">
                                        <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-primary w-md">Send</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div><!-- end col -->
    </div>
</div>



<script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>