<?php

require_once('../database/Connection.php');

interface ItemsInterface
{
    public function allItems();
    public function rooms();
    public function cottage();
    public function additem($i_type, $i_name, $i_img, $i_desc, $i_price, $i_quantity);
    public function editItems($i_id);
    public function updateItems($i_id, $i_name, $i_desc, $i_price, $i_type, $i_quantity, $i_img);
    public function deleteItem($itemID);
}

class Items extends Dbh implements ItemsInterface
{
    public function allItems()
    {
        $result = $this->connect()->query('SELECT * FROM items');
        return $result;
    }

    public function rooms()
    {
        $result2 = $this->connect()->query('SELECT * FROM items WHERE i_type="Rooms"');

        return $result2;
    }

    public function cottage()
    {
        $result3 = $this->connect()->query('SELECT * FROM items WHERE i_type="Cottages"');
        return $result3;
    }

    public function addItem($i_type, $i_name, $i_img, $i_desc, $i_price, $i_quantity)
    {
        $file_name = $_FILES["i_img"]["name"];
        $file_tmp_name = $_FILES["i_img"]["tmp_name"];

        if (file_exists("../Admin/Items/" . $file_name)) {

            $response = array(
                'error' => 'File already exists.'
            );
        }

        $stmt = $this->connect()->prepare("INSERT INTO items (i_type, i_name, i_img, i_desc, i_price, i_quantity) VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss", $i_type, $i_name, $file_name, $i_desc, $i_price, $i_quantity);

        if ($stmt->execute()) {
            move_uploaded_file($file_tmp_name, "../Admin/Items/" . $file_name);

            $response = array(
                'success' => 'File Uploaded.'
            );
        } else {
            $response = array(
                'error' => 'Something went wrong.'
            );
        }
        echo json_encode($response);
        exit();
    }


    public function editItems($i_id)
    {
        $sql = "SELECT * FROM items WHERE i_id = '$i_id'";
        $result = $this->connect()->query($sql);

        $data_array = [];

        if (mysqli_num_rows($result) > 0) {
            foreach ($result as $row) {
                array_push($data_array, $row);
                header('Content-Type: application/json');
                echo json_encode($data_array);
            }
        } else {
            echo "Error! No Data Found.";
        }
    }

    public function updateItems($i_id, $i_name, $i_desc, $i_price, $i_type, $i_quantity, $i_img)
    {
        $old_img = '';

        if ($i_img != '') {
            $updatedimg =  $i_img;
            if (file_exists("../Admin/Items/" . $_FILES['i_img']['name'])) {

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
        $sql = "SELECT i_img FROM items WHERE i_id =?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("i", $itemID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imgFileName = $row['i_img'];

            $sqlDelete = "DELETE FROM items WHERE i_id =?";
            $stmtDelete = $this->connect()->prepare($sqlDelete);
            $stmtDelete->bind_param("i", $itemID);
            $stmtDelete->execute();

            if ($stmtDelete->affected_rows > 0) {
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
