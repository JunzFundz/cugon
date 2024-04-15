<div>
    <!-- <ul class="" style="font-size: 13px;">
        <li>
            <a href="home" class="position-relative"><i class="bi bi-bookmark-dash"></i>&nbsp;&nbsp;&nbsp;Bookings
                <?php foreach ($result as $rows) { ?>
                    <?php if ($rows["pending_count"] !== 0) { ?>
                        <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger" style="top: -5">
                            <?php echo $rows["pending_count"]; ?>
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    <?php } ?>
                <?php } ?>
            </a>
        </li>
        <li><a href="admin-transactions"><i class="bi bi-speedometer2"></i>&nbsp;&nbsp;Dashboard</a></li>
    </ul> -->
    <div class="accordion" id="accordionExample">
        
        <div class="accordion-item" style="border:0">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Accordion Item #2
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <ul class="" style="font-size: 13px;">
                        <li><a href="admin-transactions">Transactions</a></li>
                        <!-- <li><a href="accounts.php"><i class="bi bi-people"></i>&nbsp;&nbsp;&nbsp;Accounts</a></li> -->
                        <li><a href="">Gallery Request</a></li>
                        <li><a href="admin-items">Items</a></li>
                        <li><a href="settings">Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="accordion-item" style="border:0">
            <h2 class="accordion-header" style="border:0">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Accordion Item #3
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    
                </div>
            </div>
        </div>

    </div>
</div>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

