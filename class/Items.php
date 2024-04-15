<?php

require('../database/Connection.php');

class Items extends Dbh
{
    public function allItems()
    {
        $sql = 'SELECT * FROM items';

        $result = $this->connect()->query($sql);

        return $result;
    }

    public function rooms()
    {
        $sql = 'SELECT * FROM items WHERE i_type="Rooms"';

        $result2 = $this->connect()->query($sql);
        return $result2;
    }

    public function cottage()
    {
        $sql = 'SELECT * FROM items WHERE i_type="Cottages"';

        $result3 = $this->connect()->query($sql);
        return $result3;
    }
    
    public function additem($i_type, $i_name, $i_img, $i_desc, $i_price, $i_quantity)
    {
        if (file_exists("../Admin/Items/" . $_FILES["i_img"]["name"])) {
            $_FILES["i_img"]["name"];

            echo '<script type="text/javascript">';
            echo 'alert("File already exist");';
            echo 'window.location.href = "../Admin/Home.php" ';
            echo '</script>';
        } else {

            $sql = "INSERT INTO items (i_type, i_name, i_img, i_desc, i_price, i_quantity) VALUES('$i_type', '$i_name', '$i_img', '$i_desc', '$i_price', '$i_quantity')";

            $result = $this->connect()->query($sql);

            if ($result) {

                move_uploaded_file($_FILES["i_img"]["tmp_name"], "../Admin/Items/" . $_FILES["i_img"]["name"]);

                echo '<script type="text/javascript">';
                echo 'alert("File uploaded");';
                echo 'window.location.href = "../Admin/Home.php" ';
                echo '</script>';

            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Somethings wrong");';
                echo 'window.location.href = "../Admin/Home.php" ';
                echo '</script>';
            }
        }
    }

    public function editItems($i_id)
    {
        $sql = "SELECT * FROM items WHERE i_id = '$i_id'";
        $result = $this->connect()->query($sql);

        $data_array = [];

        if(mysqli_num_rows($result)>0){
            foreach($result as $row){
                array_push($data_array, $row);
                header('Content-Type: application/json');
                echo json_encode($data_array);
            }
        }
        else {
            echo "Error! No Data Found.";
        }
    }


    public function updateItems($i_id, $i_name, $i_desc, $i_price, $i_type, $i_quantity, $i_img)
    {
        $old_img = ''; 

        if ($i_img != '') {
            $updatedimg =  $i_img;
            if(file_exists("../Admin/Items/" . $_FILES['i_img']['name'])){

                echo '<script type="text/javascript">';
                echo 'alert("File already exist");';
                echo 'window.location.href = "../Admin/admin-items.php"';
                echo '</script>';
            }
        } else {
            $old_img = $_POST['old_img'];
            $updatedimg =  $old_img;
            echo '<script type="text/javascript">';
            echo 'alert("Successfully updated");';
            echo 'window.location.href = "../Admin/admin-items.php"';
            echo '</script>';
        }

        $sql = "UPDATE items SET i_type = '$i_type', i_name = '$i_name', i_img = '$updatedimg', i_desc = '$i_desc', i_price = '$i_price' , i_quantity = '$i_quantity' WHERE i_id = '$i_id'";

        $result = $this->connect()->query($sql);

        if ($result) {
            if ($_FILES["i_img"]["name"] != '') {

                move_uploaded_file($_FILES["i_img"]["tmp_name"], "../Admin/Items/" . $_FILES["i_img"]["name"]);
                if (!empty($old_img)) {
                    unlink("../Admin/Items/" . $old_img);
                }
                echo '<script type="text/javascript">';
                echo 'alert("Successfully updated");';
                echo 'location.reload()';
                echo '</script>';
            }
        } else {
            die('Error: ');
        }
        return $result;
    }

    public function deleteItem($itemID)
    {
        $sql = "SELECT i_img FROM items WHERE i_id = '$itemID'";
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imgFileName = $row['i_img'];
            $sqlDelete = "DELETE FROM items WHERE i_id = '$itemID'";
            $resultDelete = $this->connect()->query($sqlDelete);

            if ($resultDelete) {
                $imgFilePath = "../Admin/Items/" . $imgFileName;
                if (file_exists($imgFilePath)) {
                    unlink($imgFilePath);
                }

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
