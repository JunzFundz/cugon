<?php

class AccessItems extends Items
{
    //Access view
    public function view()
    {
        return $this->itemsData();
    }

    //access add
    public function add($i_type, $i_name, $i_img, $i_desc, $i_price, $i_quantity)
    {
        return $this->additem($i_type, $i_name, $i_img, $i_desc, $i_price, $i_quantity);
    }

    //access edit
    public function edit($i_id)
    {
        return $this->editItems($i_id);
    }
}
