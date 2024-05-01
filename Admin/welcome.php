<?php
session_start();
if (strlen($_SESSION['user_id'] == 0)) {
    header('location: ../database/logout.php');
} else {
    header('location: admin.php');
    include('admin-header.php');
?>

    <body>
        <!-- <div class="wrapper">
            <aside id="sidebar" class="js-sidebar">
                <div class="h-100">
                    <div class="sidebar-logo">
                        <a href="#">Admin</a>
                    </div>
                    <ul class="sidebar-nav">
                        <li class="sidebar-header">
                            Admin Elements
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" id="dashboard">
                                <i class="fa-solid fa-list pe-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                                Bookings
                            </a>
                            <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link" id="booking-requests"><i class="bi bi-dot"></i>Requests</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link" id="transactions"><i class="bi bi-dot"></i>Transactions</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link" id="reports"><i class="bi bi-dot"></i>Report</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#items" data-bs-toggle="collapse" aria-expanded="false"><i class="bi bi-pencil-square"></i>
                                Items
                            </a>
                            <ul id="items" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link" id="items--"><i class="bi bi-dot"></i>Items</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-type" class="sidebar-link"><i class="bi bi-dot"></i>Add type</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                                Posts
                            </a>
                            <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" id="ratings" class="sidebar-link">Ratings</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link" id="items-rating">Items Ratings</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                                Auth
                            </a>
                            <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link" id="admin-profile">Profile</a>
                                </li>
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link">Change Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sidebar-header">
                            Settings
                        </li>
                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link collapsed" data-bs-target="#multi" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-solid fa-share-nodes pe-2"></i>
                                Admin Settings
                            </a>
                            <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                                <li class="sidebar-item">
                                    <a href="#" class="sidebar-link collapsed" data-bs-target="#level-1" data-bs-toggle="collapse" aria-expanded="false">Privileges</a>
                                    <ul id="level-1" class="sidebar-dropdown list-unstyled collapse">
                                        <li class="sidebar-item">
                                            <a href="#" class="sidebar-link" id="view-accounts"><i class="bi bi-people"></i>&nbsp;&nbsp;Accounts</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <a href="../database/logout.php" class="sidebar-link collapsed"><i class="bi bi-box-arrow-left"></i>
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>

            <div class="main" style="padding-top: 20px; ">
                <?php include('dashboard.php') ?>
            </div>
        </div> -->
    <?php
    include('load-modals.php');
    include('admin-footer.php');
} ?>
    </body>

    </html>