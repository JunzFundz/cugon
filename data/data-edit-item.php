<?php

require('../access/aItems.php');



if (isset($_POST['check_view'])) {

    $i_id = $_POST['item_id'];

    $edit = new AccessItems();
    $result = $edit->edit($i_id);
}
