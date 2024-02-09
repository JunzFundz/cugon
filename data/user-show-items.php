<?php

require('../access/aItems.php');

$item = new AccessItems();
$result = $item->displayAll();
$result2 = $item->view();
$result3 = $item->viewCot();