<?php
$modals = glob('modals/*.php');
foreach ($modals as $m) {
    require_once($m);
}
