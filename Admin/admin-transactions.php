<?php
require('../data/admin-transactions.php');
?>

<!-- datatables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Custom style -->
<link rel="stylesheet" href="../src/Adminhome.css">

<!-- Modal -->
<div class="modal fade" id="show-records" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Current active</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Condemed</button>
            </div>
        </div>
    </div>
</div>

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
        <?php if ($result) { ?>
            <div style="display: flex; flex-direction: row;">

                <?php foreach ($result as $row) { ?>
                    <div class="card" style="width: 20rem; display:flex; margin: 20px;">
                        <div class="card-body">
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id'] ?>">
                            <h5 class="card-title" style="font-size: medium;"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;<?= $row['email']; ?></i></h5>
                            <p class="card-text" style="font-size: small; font-weight:600: color: grey;">Phone: <?= $row['phone']; ?></p>
                            <p class="card-text" style="font-size: small; font-weight:600: color: grey;">Message: <?= $row['phone']; ?></p>
                            <p class="card-text"><?= $row['request_count']; ?> Active request</p>
                        </div>
                        <div style="display: flex; flex-direction:row; justify-content: space-around;">
                            <button class="btn btn-primary get-records" style="border-radius: 0px; width: 100%; margin: 10px;" data-user-id="<?= $row['user_id'] ?>"><i class="bi bi-eye-fill"></i>&nbsp;&nbsp;View</button>
                            <button class="btn btn-danger get-records" style="border-radius: 0px;width: 100%; margin: 10px;" data-user-id="<?= $row['user_id'] ?>"><i class="bi bi-archive-fill"></i>&nbsp;&nbsp;Archive</button>
                        </div>

                    </div>
                <?php } ?>

            </div>
        <?php } else {
            echo "<tr><td colspan='7'>No Data Found.</td></tr>";
        } ?>
    </div>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.get-records', function(e) {
                e.preventDefault();
                var userID = $(this).data('user-id');
                $.ajax({
                    url: '../data/admin-view-records.php',
                    type: 'post',
                    data: {
                        'check_records': true,
                        'userID': userID,
                    },
                    success: function(response) {
                        // console.log(userID);
                        $('.modal-body').html(response);
                        $('#show-records').modal('show');
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        alert('Error: getting data');
                    }
                });
            });
        });
    </script>

    <!-- Boostrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>