<?php
include '../data/data-booking.php';
?>

<script src="../node_modules/jquery/dist/jquery.min.js"></script>


<!-- datatables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<!-- Custom style -->
<link rel="stylesheet" href="../src/Adminhome.css">


<title>Booking</title>

<div class="admin-container">

    <div class="nav">
        <nav>
            <ul>
                <li id="logo-admin">Cugon bamboo resort</li>
                <li><a href="../database/Logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="left-panel">
        <?php include('left-panel.php') ?>
    </div>

    <div class="right-panel">
        <div class="content-new">


            <?php foreach ($result as $rows) { ?>

            <?php } ?>
            <?php if ($result) {
                $num = 1;
            ?>
                <table id="example" class="table table-sm table-striped text-center table-text">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Date</th>
                            <th scope="col">Total</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($result as $rows) { ?>

                            <tr class="">
                                <td class=""><?= $num++; ?></td>
                                <td class=""><?= $rows['email']; ?></td>
                                <td class=""><?= $rows['phone']; ?></td>
                                <td class="">
                                    <?php
                                    if ($rows['start'] === null || $rows['start'] == '' && $rows['end'] === null || $rows['end'] == '') {
                                        echo $rows['reg_date'];
                                    } else {
                                        echo $rows['start'] . " to " .  $rows['end'];
                                    }
                                    ?>
                                </td>

                                <td class=""><?= $rows['total']; ?></td>
                                <td class=""><?= $rows['payment']; ?></td>
                                <td class="">

                                    <button data-user_id="<?= $rows['user_id']; ?>" type="button" class="btn btn-primary me-2 mb-2 viewButton">View</button>

                                    <button onclick="approveReq('<?php echo $rows['res_id']; ?>', '<?php echo $rows['user_id']; ?>', '<?php echo $rows['item_ids']; ?>', '<?php echo $rows['item_quantities']; ?>')" type="button" class="btn btn-success me-2 mb-2 get-item-id">Approve</button>

                                    <button data-user_id="<?php echo $rows['user_id']; ?>" data-bs-toggle="modal" data-bs-target="#decline-request" type="button" class="btn btn-danger me-2 mb-2">Decline</button>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else {
                    echo "<tr><td colspan='7'>No Data Found.</td></tr>";
                } ?>
                    </tbody>
                </table>
        </div>
    </div>
    <?php
    include('modal/viewRequest.php');
    include('modal/decline-request.php');
    ?>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script src="../assets/admin.js"></script>