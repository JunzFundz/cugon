<style>
    /* Add the css after this */
    .tools-dashborad a {
        text-decoration: none;
        display: block;
    }

    .tools-dashborad .custom-tiles {
        min-height: 160px;
        padding: 10px 10px;
        position: relative;
        color: #fff;
        border-radius: 4px;
        box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
        transition: all 0.35s ease;
    }

    .tools-dashborad .custom-tiles span {
        display: inline-block;
        font-size: 22px;
        margin: 10px 0px 0px;
        line-height: 1.1;
        font-weight: bold;
    }

    .tools-dashborad .custom-tiles h3 {
        font-size: 16px;
        margin: 5px 0 0 0;
        letter-spacing: 1px;
    }

    .tools-dashborad .custom-tiles .icon-wrap {
        height: 32px;
        width: 32px;
        position: absolute;
        right: 30px;
        top: 30px;
        font-size: 28px;
        transitian: all 0.35s ease;
        opacity: 0.7;
    }

    .tools-dashborad .total-records {
        background-color: #07B55C;
    }

    .tools-dashborad .in-progress {
        background-color: #E9A127;
    }

    .tools-dashborad .my-pending {
        background-color: #C5292E;
    }

    .tools-dashborad .group-pending {
        background-color: #17A2B8;
    }

    .tools-dashborad .custom-tiles .small-box-footer {
        position: absolute;
        text-align: center;
        padding: 5px 0;
        color: rgba(255, 255, 255, .8);
        display: block;
        background: rgba(0, 0, 0, .1);
        text-decoration: none;
        bottom: 0;
        width: 100%;
        left: 0;
        transition: all 0.3s ease;
        font-size: 14px;
    }

    .tools-dashborad .custom-tiles .small-box-footer:hover {
        color: #fff;
        background: rgba(0, 0, 0, .15);
    }

    .chart-wrap {
        box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);
    }

    .middle-wrap .m-block {
        width: 50%;
        float: left;
        background: rgba(255, 255, 255, 0.1);
        padding: 10px 10px;
    }

    .middle-wrap {
        margin: 15px -10px 0px;
    }

    .tools-dashborad .custom-tiles .middle-wrap h3 {
        font-size: 12px;
        display: inline-block;
    }

    .tools-dashborad .custom-tiles .middle-wrap span {
        font-size: 14px;
        display: inline-block;
    }


    .chart-head {
        font-size: 20px;
        padding: 10px;
        color: #053f79;
        font-weight: 700;
    }

    .chartdiv {
        width: 100%;
        height: auto;
        background-color: white;
    }
</style>

<?php
require_once('../database/Connection.php');
$db = new Dbh();
$con = $db->connect();

$stmtItems = $con->query("SELECT COUNT(*) AS total_items FROM items");
$row = $stmtItems->fetch_assoc();
$tems = htmlspecialchars($row['total_items']);

$stmtItems = $con->query("SELECT COUNT(*) AS total_tran FROM transactions");
$row = $stmtItems->fetch_assoc();
$total_tran = htmlspecialchars($row['total_tran']);
?>

<div class="tools-dashborad">
    <div class="row">
        <?php $records = $con->query("SELECT COUNT(*) AS registered FROM users WHERE verified = 'yes'");
        foreach ($records as  $record) { ?>
            <div class="col-sm-3">
                <div class="custom-tiles total-records">
                    <h3 class="animated slideInUp">Total Registered</h3>
                    <span class="animated slideInUp"><?= htmlspecialchars($record['registered']) ?></span>

                    <div class="icon-wrap"><i class="fa fa-book" aria-hidden="true"></i></div>
                </div>
            </div>
        <?php } ?>

        <?php $requests = $con->query("SELECT COUNT(*) AS total_requests, SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END) AS pending_requests, SUM(CASE WHEN status = 'Approved' THEN 1 ELSE 0 END) AS approved_requests FROM res_tb");
        foreach ($requests as  $request) { ?>
            <div class="col-sm-3">
                <div class="custom-tiles in-progress">
                    <h3 class="animated slideInUp">Requests</h3>
                    <span class="animated slideInUp"><?= htmlspecialchars($request['total_requests']) ?></span>

                    <div class="icon-wrap"><i class="fa fa-spinner" aria-hidden="true"></i></div>
                    <div class="middle-wrap clearfix">
                        <div class="m-block">
                            <h3 class="animated slideInUp">Pending:</h3>
                            <span class="animated slideInUp"><?= htmlspecialchars($request['pending_requests']) ?></span>
                        </div>
                        <div class="m-block">
                            <h3 class="animated slideInUp">Approved:</h3>
                            <span class="animated slideInUp"><?= htmlspecialchars($request['approved_requests']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="col-sm-3">
            <div class="custom-tiles my-pending">
                <h3 class="animated slideInUp">Items</h3>
                <span class="animated slideInUp"><?= htmlspecialchars($tems) ?></span>

                <div class="icon-wrap"></div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="custom-tiles group-pending">
                <h3 class="animated slideInUp">Transactions</h3>
                <span class="animated slideInUp"><?= htmlspecialchars($total_tran) ?></span>

                <div class="icon-wrap"></div>
            </div>
        </div>
    </div>
</div>

<br>
<div class="row">
    <div class="col-sm-6">
        <div class="chart-wrap">
            <h3 class="chart-head">Bookings</h3>
            <div id="" class="chartdiv">
                <?php include('charts/chart1.php') ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="chart-wrap">
            <h3 class="chart-head">Heading 2</h3>
            <div id="chartdiv2" class="chartdiv">
                <?php include('charts/chart2.php') ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>