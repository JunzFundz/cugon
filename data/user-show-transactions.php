<?php

require('../class/Transactions.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['userId'])) {
        $userId = filter_var($_GET['userId'], FILTER_VALIDATE_INT);

        $startTran = new Transactions();
        $completed = $startTran->userPending($userId);
        $alltran = $startTran->userAllTransactions($userId);
    }
}


