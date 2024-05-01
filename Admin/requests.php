<?php
include('../data/data-booking.php');
require_once('../database/Connection.php');
$db = new Dbh();
$conn = $db->connect();

$stmt = $conn->query("SELECT  * FROM orders WHERE status = 'Waiting'");

$count = 1;
?>

<style>
    .card-margin {
        margin-bottom: 1.875rem;
    }

    .card {
        border: 0;
        box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #ffffff;
        background-clip: border-box;
        border: 1px solid #e6e4e9;
        border-radius: 8px;
    }

    .card .card-header.no-border {
        border: 0;
    }

    .card .card-header {
        background: none;
        padding: 0 0.9375rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        min-height: 50px;
    }

    .card-header:first-child {
        border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
    }

    .widget-49 .widget-49-title-wrapper {
        display: flex;
        align-items: center;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #edf1fc;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-day {
        color: #4e73e5;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-month {
        color: #4e73e5;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #fcfcfd;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-day {
        color: #dde1e9;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-month {
        color: #dde1e9;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #e8faf8;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-day {
        color: #17d1bd;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-month {
        color: #17d1bd;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ebf7ff;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-day {
        color: #36afff;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-month {
        color: #36afff;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: floralwhite;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-day {
        color: #FFC868;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-month {
        color: #FFC868;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #feeeef;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-day {
        color: #F95062;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-month {
        color: #F95062;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #fefeff;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-day {
        color: #f7f9fa;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-month {
        color: #f7f9fa;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ebedee;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-day {
        color: #394856;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-month {
        color: #394856;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #f0fafb;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-day {
        color: #68CBD7;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-month {
        color: #68CBD7;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info {
        display: flex;
        flex-direction: column;
        margin-left: 1rem;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-pro-title {
        color: #3c4142;
        font-size: 14px;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-meeting-time {
        color: #B1BAC5;
        font-size: 13px;
    }

    .widget-49 .widget-49-meeting-points {
        font-weight: 400;
        font-size: 13px;
        margin-top: .5rem;
    }

    .widget-49 .widget-49-meeting-points .widget-49-meeting-item {
        display: list-item;
        color: #727686;
    }

    .widget-49 .widget-49-meeting-points .widget-49-meeting-item span {
        margin-left: .5rem;
    }

    .widget-49 .widget-49-meeting-action {
        text-align: right;
    }

    .widget-49 .widget-49-meeting-action a {
        text-transform: uppercase;
    }
</style>

<ul class="nav nav-fill nav-tabs" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="fill-tab-0" data-bs-toggle="tab" href="#fill-tabpanel-0" role="tab" aria-controls="fill-tabpanel-0" aria-selected="true"> Requests </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="fill-tab-1" data-bs-toggle="tab" href="#fill-tabpanel-1" role="tab" aria-controls="fill-tabpanel-1" aria-selected="false"> Transactions </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="nav-link" id="fill-tab-2" data-bs-toggle="tab" href="#fill-tabpanel-2" role="tab" aria-controls="fill-tabpanel-2" aria-selected="false"> Food orders </a>
    </li>
</ul>

<div class="tab-content pt-5" id="tab-content">

    <div class="tab-pane active" id="fill-tabpanel-0" role="tabpanel" aria-labelledby="fill-tab-0">
        <div class="">

            <div style="display:flex; gap:2rem; height: 95dvh">
                <!-- left content -->
                <div class="block left--content" style="width: 70%; overflow: auto;">

                    <?php if ($result) {
                        foreach ($result as $rows) { ?>

                            <div class="col-lg-4" style="width: 100%;">
                                <div class="card card-margin">
                                    <div class="card-header no-border">
                                        <h5 class="card-title">
                                            <?= date_format(date_create($rows['created_at']), 'H:m A'); ?>
                                        </h5>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="widget-49">

                                            <div class="widget-49-title-wrapper">
                                                <div class="widget-49-date-primary">
                                                    <span class="widget-49-date-day"><?= date_format(date_create($rows['created_at']), 'd'); ?></span>
                                                    <span class="widget-49-date-month"><?= date_format(date_create($rows['created_at']), 'M '); ?></span>
                                                </div>
                                                <div class="widget-49-meeting-info">
                                                    <span class="widget-49-pro-title"><?= $rows['email']; ?></span>
                                                    <span class="widget-49-meeting-time"><?= $rows['phone']; ?></span>
                                                    <span class="widget-49-meeting-time">
                                                        <?php
                                                        $date_booked = '';

                                                        if ($rows['reg_date'] === '0000-00-00' || $rows['reg_date'] == '') {
                                                            $date_booked = date_format(date_create($rows['start']), 'M d') . '-' . date_format(date_create($rows['end']), 'd Y');
                                                            print $date_booked;
                                                        } else {
                                                            $date_booked = date_format(date_create($rows['reg_date']), 'M d, Y');
                                                            print $date_booked;
                                                        }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="widget-49-meeting-action" style="float: right;">

                                                <button class="btn--view viewButton" data-user_id="<?= $rows['user_id']; ?>" data-res_id="<?= $rows['res_id']; ?>" data-item_id="<?= $rows['item_id']; ?>">
                                                    View
                                                </button>

                                                <button class="btn--approve get-item-id approval-request" data-user_id="<?= $rows['user_id']; ?>" data-res_id="<?= $rows['res_id']; ?>" data-item_id="<?= $rows['item_id']; ?>" data-item_name="<?= $rows['item_name']; ?>" data-res_num="<?= $rows['res_number']; ?>" data-total_amount="<?= $rows['total']; ?>" data-quantity="<?= $rows['quantity']; ?>" data-date="<?php echo $date_booked; ?>">Approve
                                                </button>

                                                <button data-bs-toggle="modal" data-bs-target="#decline-request" type="button" class="btn btn-sm btn-flash-border-primary declineButton btn--decline" data-user_id="<?= $rows['user_id']; ?>" data-res_id="<?= $rows['res_id']; ?>" data-res_num="<?= $rows['res_number']; ?>">
                                                    Decline
                                                </button>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                    <?php }
                    } else {
                        echo "<tr><td colspan='7'>No Data Found.</td></tr>";
                    } ?>
                </div>
                <!-- end left content -->

                <!-- right content -->
                <div class="block right--content" style="width: 30%; overflow: auto; height: 95dvh">

                    <?php if ($statusRequest) {
                        foreach ($statusRequest as $rows) { ?>
                            <div class="card--past">
                                <div class="textBox">
                                    <div class="textContent">
                                        <span class="span"><?= $rows['email']; ?></span>
                                    </div>
                                    <p class="p"><?= $rows['phone']; ?></p>
                                    <span class="span"><?= $rows['status']; ?></span>
                                    <div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } else {
                        echo "<tr><td colspan='7'>No Data Found.</td></tr>";
                    } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="fill-tabpanel-1" role="tabpanel" aria-labelledby="fill-tab-1">
        <?php include('transactions.php') ?>
    </div>

    <div class="tab-pane" id="fill-tabpanel-2" role="tabpane2" aria-labelledby="fill-tab-2">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Price</th>
                    <th scope="col">Product</th>
                    <th scope="col">Clients Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Serves</th>
                    <th scope="col">Room</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stmt as $row) { ?>
                    <tr>
                        <th scope="row"><?= $count++ ?></th>
                        <td><?= htmlspecialchars($row['price']) ?></td>
                        <td><?= htmlspecialchars($row['food_name']) ?></td>
                        <td><?= htmlspecialchars($row['user_name']) ?></td>
                        <td><?= htmlspecialchars($row['user_number']) ?></td>
                        <td><?= htmlspecialchars($row['serves']) ?></td>
                        <td><?= htmlspecialchars($row['room']) ?></td>
                        <td><?= htmlspecialchars($row['msg']) ?></td>
                        <td><?= htmlspecialchars($row['order_date']) ?></td>
                        <td>
                            <button type="button" class="btn btn-discovery set-delivered" data-order-id="<?= htmlspecialchars($row['order_id']) ?>" data-user-id="<?= htmlspecialchars($row['user_id']) ?>">Delivered</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>