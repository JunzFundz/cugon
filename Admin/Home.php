<?php
include '../data/dBooking.php';
?>

<!-- Boostrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

<!-- datatables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<!-- Custom style -->
<link rel="stylesheet" href="../src/Adminhome.css">


<title>Booking</title>

<div class="containerdiv">

    <div class="nav">
        <nav>
            <ul>
                <li id="logo-admin">Cugon bamboo resort</li>
                <li id="search-input">
                </li>
                <li id="profile" class="">
                    <div class="avatar-custom relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 inline-block self-center mt-3">
                        <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </li>
                <li><a href="../database/Logout.php">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="left-panel">
        <div>
            <ul class="font-semibold">
                <li><a href=""><i class="fa-sharp fa-solid fa-utensils"></i> Bookings</a></li>
                <li><a href=""><i class="fa-brands fa-strava"></i> Availables</a></li>
                <li><a href=""><i class="fa-sharp fa-solid fa-person"></i> Accounts</a></li>
                <li><a href=""><i class="fa-sharp fa-regular fa-comment-dots"></i> Galerry Request</a></li>
                <li><a href="Cottage.php">Cottages</a></li>
                <li><a href="Rooms.php">Rooms</a></li>
                <li id="settings-custom" class="font-bold"><a href="">Settings</a></li>
            </ul>
        </div>
    </div>

    <div id="content" class="rigth-panel">
        <div class="">
            <?php if ($result) { ?>
                <table id="example" class="table table-sm table-striped text-center table-text">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">Reservation Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Total</th>
                            <th scope="col">Date of start</th>
                            <th scope="col">Date of end</th>
                            <th scope="col">Payment</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($result as $rows) { ?>

                            <tr class="">
                                <td class=""><?= $rows['res_number']; ?></td>
                                <td class=""><?= $rows['email']; ?></td>
                                <td class=""><?= $rows['total']; ?></td>
                                <td class=""><?= $rows['start']; ?></td>
                                <td class=""><?= $rows['end']; ?></td>
                                <td class=""><?= $rows['payment']; ?></td>
                                <td class="">

                                    <button data-user_id="<?= $rows['user_id']; ?>" type="button" class="btn btn-primary me-2 mb-2 viewButton">View</button>

                                    <button onclick="approveReq('<?php echo $rows['res_id']; ?>')" type="button" class="btn btn-success me-2 mb-2">Approve</button>


                                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button" class="btn btn-danger me-2 mb-2">Decline</button>
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

        <?php include '../Admin/modal/viewRequest.php' ?>


        <!-- Boostrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Datatables -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="../assets/adminView.js"></script>