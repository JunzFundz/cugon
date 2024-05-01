<?php
session_start();
include('admin-header.php');
include('../data/data-items.php');
require_once('../database/Connection.php');
$db = new Dbh();
$con = $db->connect();

$stmt = $con->query("SELECT COUNT(*) AS number_notification FROM res_tb");
$row = $stmt->fetch_assoc();
$notification_count = htmlspecialchars($row['number_notification']);


$stmtUnseen = $con->query("SELECT COUNT(*) AS unseen_bookings FROM res_tb WHERE status ='Pending'");
$row = $stmtUnseen->fetch_assoc();
$booking_count = htmlspecialchars($row['unseen_bookings']);

$stmtItems = $con->query("SELECT COUNT(*) AS total_items FROM items");
$row = $stmtItems->fetch_assoc();
$tems = htmlspecialchars($row['total_items']);
?>

<style>
    .container-- {
        display: grid;
        grid-template-columns: repeat(9, 1fr);
        width: 100%;
        margin-inline: 20px;

    }

    .child-1 {
        grid-column: 1/3;

        ul li a {
            text-align: left !important;
            padding-left: 20px;
        }
    }

    .child-2 {
        grid-column: 3/10;
        width: 100%;
    }
</style>

<title>Admin Dashboard</title>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="width: 100%; ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Administrator</a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars text-light"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
                <li class="nav-item text-center mx-2 mx-lg-1">
                    <a class="nav-link active" aria-current="page" href="admin.php">
                        <div>
                            <i class="fas fa-home fa-lg mb-1"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
</nav>

<div class="container--" style="margin-top: 20px; width: auto; height: 90vh;">

    <div class="child-1" style="width: 100%;">
        <ul class="nav nav-tabs nav-tabs-vertical" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="dashboard" data-bs-toggle="tab" href="#dashboard--" role="tab" aria-controls="dashboard--" aria-selected="true"><i class="bi bi-speedometer2"></i>&nbsp;&nbsp;Dashboard</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link position-relative" id="bookings" data-bs-toggle="tab" href="#bookings--" role="tab" aria-controls="bookings--" aria-selected="false"><i class="bi bi-bookmark"></i>&nbsp;&nbsp;Bookings
                    <span class="position-absolute top-0 translate-middle badge rounded-pill text-bg-danger" id="unseen-bookings">
                        <?php echo $booking_count ?>
                        <span class="visually-hidden">unread messages</span>
                    </span>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="items" data-bs-toggle="tab" href="#items--" role="tab" aria-controls="items--" aria-selected="false"><i class="bi bi-backpack3"></i>&nbsp;&nbsp;Items</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="ratings" data-bs-toggle="tab" href="#posts--" role="tab" aria-controls="posts--" aria-selected="false"><i class="bi bi-signpost"></i>&nbsp;&nbsp;Post</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="reports" data-bs-toggle="tab" href="#reports--" role="tab" aria-controls="reports--" aria-selected="false"><i class="bi bi-flag"></i>&nbsp;&nbsp;Reports</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="profile" data-bs-toggle="tab" href="#profile--" role="tab" aria-controls="profile--" aria-selected="false"><i class="bi bi-person-circle"></i>&nbsp;&nbsp;Profile</a>
            </li>
        </ul>
    </div>

    <div class="child-2">
        <div class="tab-content" id="tab-content" aria-orientation="vertical" style="width: 100%; overflow:scroll; height: 90vh">
            <div class="tab-pane active" id="dashboard--" role="tabpanel" aria-labelledby="dashboard">
                <?php include('dashboard.php') ?>
            </div>
            <div class="tab-pane" id="bookings--" role="tabpanel" aria-labelledby="bookings">
                <?php include('requests.php') ?>
            </div>
            <div class="tab-pane" id="items--" role="tabpanel" aria-labelledby="items">
                <?php include('items.php') ?>
            </div>
            <div class="tab-pane" id="posts--" role="tabpanel" aria-labelledby="ratings">
                <?php include('ratings.php'); ?>
            </div>
            <div class="tab-pane" id="reports--" role="tabpanel" aria-labelledby="reports">
                <?php include('reports.php'); ?>
            </div>
            <div class="tab-pane" id="profile--" role="tabpanel" aria-labelledby="profile">
                <?php include('profile.php'); ?>
            </div>
        </div>
    </div>
</div>


<?php
include('admin-footer.php');
include('load-modals.php');
?>