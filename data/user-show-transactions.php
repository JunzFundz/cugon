<?php 

require('../class/Transactions.php');


if(isset($_GET['userId'])){
    $userId = $_GET['userId'];

    $startTran = new Transactions();
    $completed = $startTran->userPending($userId);

    $all = new Transactions();
    $alltran = $all->userAlltran($userId);
}