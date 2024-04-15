<?php
include('admin-header.php');
?>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
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
                                <a href="#" class="sidebar-link" id="items"><i class="bi bi-dot"></i>Items</a>
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
                                <a href="#" class="sidebar-link">Items Ratings</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Users Reviews</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse" aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                            Auth
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Login</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Register</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Forgot Password</a>
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
                                        <a href="#" class="sidebar-link"><i class="bi bi-people"></i>&nbsp;&nbsp;Accounts</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link">Banners</a>
                                    </li>
                                    <li class="sidebar-item">
                                        <a href="#" class="sidebar-link">Docs</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="main" style="padding-top: 20px; ">
            <?php include('dashboard.php') ?>
        </div>
    </div>

    <?php
    include('load-modals.php');
    include('admin-footer.php');
    ?>

    <!-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const collapses = document.querySelectorAll('.sidebar-link[data-bs-toggle="collapse"]');

            collapses.forEach(collapse => {
                collapse.addEventListener("click", function() {
                    localStorage.setItem("openedAccordion", this.getAttribute("data-bs-target"));
                });
            });

            const openedAccordion = localStorage.getItem("openedAccordion");

            if (openedAccordion) {
                const element = document.querySelector(openedAccordion);
                if (element) {
                    element.classList.add("show");
                    const parentCollapse = element.closest(".sidebar-link");
                    if (parentCollapse) {
                        parentCollapse.classList.remove("collapsed");
                        parentCollapse.setAttribute("aria-expanded", "true");
                    }
                }
            }
        });

    </script> -->
</body>

</html>