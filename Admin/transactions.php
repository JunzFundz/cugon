<?php
session_start();
require('../data/admin-transactions.php');
?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#" id="dashboard-ii">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <a class="dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Options</a>
            <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item filter-option" href="#" data-activity="All">All</a>
                </li>
                <li>
                    <a class="dropdown-item filter-option" href="#" data-activity="In progress">In progress</a>
                </li>
                <li>
                    <a class="dropdown-item filter-option" href="#" data-activity="Completed">Completed</a>
                </li>
                <li>
                    <a class="dropdown-item filter-option" href="#" data-activity="No show">No show</a>
                </li>
            </ul>
        </li>
    </ol>
</nav>

<div class="" id="change--content">
    <table class="table table-hover text-center text-nowrap">
        <thead>
            <tr>
                <th scope="col">Clients</th>
                <th scope="col">Reservation Number</th>
                <th scope="col">Product Detail Views</th>
                <th scope="col">Quantity</th>
                <th scope="col">Product Price</th>
                <th scope="col">More</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result) { ?>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr data-activity="<?= $row['activity'] ?>">
                        <td>
                            <button type="button" class="btn position-relative view--time" tabindex="0" 
                            data-activity="<?= $row['activity'] ?>" 
                            data-bs-toggle="popover" 
                            data-bs-trigger="focus"
                            data-bs-content="Time in: <?= date('Y-m-d H:i:s', strtotime($row['time_in'])) ?><br>Time out: <?= date('Y-m-d H:i:s', strtotime($row['time_out'])) ?>">
                                <?= $row['full_name'] ?>
                                <?php
                                if ($row['activity'] == 'No show') {
                                    echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-danger">
                                No show
                            </span>';
                                } else if ($row['activity'] == 'In progress') {
                                    echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-success">
                                    In progress
                            </span>';
                                } else if ($row['activity'] == 'Completed') {
                                    echo '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-primary">
                                    Completed
                            </span>';
                                }
                                ?>
                            </button>
                        </td>
                        <td>
                            <span class="text-success">
                                <span><?= $row['reservation_number'] ?></span>
                            </span>
                        </td>
                        <td>
                            <span class="text-success">
                                <span><?= $row['item_name'] ?></span>
                            </span>
                        </td>
                        <td>
                            <span class="text-success">
                                <span><?= $row['quantity'] ?></span>
                            </span>
                        </td>
                        <td>
                            <span class="text-success">
                                <span><?= number_format($row['i_price']) ?></span>
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-default get-records" type="button" data-user-id="<?= $row['user_id'] ?>"><i class="bi bi-eye"></i></button>

                            <a href="receipt.php?user_id=<?= $row['user_id']; ?>" class="btn btn-default" type="button" data-user-id="<?= $row['user_id'] ?>"><i class="bi bi-receipt"></i></a>

                            <div class="dropdown">
                                <button class="btn btn-default" type="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item time--in" href="#" data-user_id="<?= $row['user_id'] ?>" data-t_number="<?= $row['transaction_number'] ?>" data-res_number="<?= $row['reservation_number'] ?>">In</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item time--out" href="#" data-user_id="<?= $row['user_id'] ?>" data-t_number="<?= $row['transaction_number'] ?>" data-res_number="<?= $row['reservation_number'] ?>">Out</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item time--out" href="#" data-user_id="<?= $row['user_id'] ?>" data-t_number="<?= $row['transaction_number'] ?>" data-res_number="<?= $row['reservation_number'] ?>">Move to completed</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else {
                echo "<tr><td colspan='7'>No Data Found.</td></tr>";
            } ?>
        </tbody>
    </table>
</div>

<script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl)
    })

    $(document).ready(function() {

        $('#myTable').DataTable();

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
                    $('.modal-body').html(response);
                    $('#show-records').modal('show');
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    alert('Error: getting data');
                }
            });
        });

        $('#dashboard-ii').on('click', function(event) {
            event.preventDefault();
            $('.main').load('dashboard.php');
        });

        function filterContent(activity) {
            $('#change--content table tbody tr').each(function() {
                var rowActivity = $(this).find('.view--time').data('activity');

                if (activity === 'All' || activity === rowActivity) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $('.dropdown-menu a.dropdown-item').click(function(e) {
            e.preventDefault();

            var selectedOption = $(this).text();
            $('.dropdown-toggle').text(selectedOption);

            filterContent(selectedOption);
        })
        filterContent('All');
    });
</script>