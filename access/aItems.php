<?php

require('../class/Items.php');

class AccessItems extends Items
{
    public function displayAll()
    {
        return $this->allItems();
    }

    public function view()
    {
        return $this->rooms();
    }

    public function edit($i_id)
    {
        return $this->editItems($i_id);
    }

    public function save($i_id, $i_name, $i_desc, $i_price, $i_type, $i_quantity, $i_img)
    {
        return $this->updateItems($i_id, $i_name, $i_desc, $i_price, $i_type, $i_quantity, $i_img);
    }

    public function viewCot()
    {
        return $this->cottage();
    }

    public function add($i_type, $i_name, $i_img, $i_desc, $i_price, $i_quantity)
    {
        return $this->additem($i_type, $i_name, $i_img, $i_desc, $i_price, $i_quantity);
    }
    public function delete($itemID)
    {
        return $this->deleteItem($itemID);
    }
}
