<?php 

require('../class/Transactions.php');

$see_all = new Transactions();
$result = $see_all->get_users_transactions();