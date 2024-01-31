<?php

class Items extends Dbh
{
    protected function itemsData()
    {
        $sql = 'SELECT * FROM items';
        
        $result = $this->connect()->query($sql);

        return $result;
    }

    protected function getUserinfo($user_id)
    {
        $sql = "SELECT * FROM users WHERE user_id = '$user_id'";

        $userInfo = $this->connect()->query($sql);
        return $userInfo;
    }

    protected function additem($i_type, $i_name, $i_img, $i_desc, $i_price, $i_quantity)
    {

        if (file_exists("../Admin/Rooms/" . $_FILES["i_img"]["name"])) {
            $_FILES["i_img"]["name"];

            $_SESSION['status'] = "File already exist"; 
            $_SESSION['status_code'] = "error"; 
            header('location: ../Admin/Rooms.php');

        } else {

            $sql = "INSERT INTO items (i_type, i_name, i_img, i_desc, i_price, i_quantity) VALUES('$i_type', '$i_name', '$i_img', '$i_desc', '$i_price', '$i_quantity')";

            $result = $this->connect()->query($sql);

            if ($result) {

                if($i_type == 'Rooms'){
                    move_uploaded_file($_FILES["i_img"]["tmp_name"], "../Admin/Rooms/" . $_FILES["i_img"]["name"]); 

                    $_SESSION['status'] = "File uploaded"; 
                    $_SESSION['status_code'] = "success"; 
                    header('location: ../Admin/Rooms.php');
                }
                if($i_type == 'Cottages'){
                    move_uploaded_file($_FILES["i_img"]["tmp_name"], "../Admin/Cottages/" . $_FILES["i_img"]["name"]); 

                    $_SESSION['status'] = "File uploaded"; 
                    $_SESSION['status_code'] = "success"; 
                    header('location: ../Admin/Rooms.php');
                }
                if($i_type == 'Foods'){
                    move_uploaded_file($_FILES["i_img"]["tmp_name"], "../Admin/Foods/" . $_FILES["i_img"]["name"]); 

                    $_SESSION['status'] = "File uploaded"; 
                    $_SESSION['status_code'] = "success"; 
                    header('location: ../Admin/Rooms.php');
                }
    
            } else {

                    $_SESSION['status'] = "Somethings wrong"; 
                    $_SESSION['status_code'] = "error"; 
                    header('location: ../Admin/Rooms.php');
            }
        }
    }

    protected function editItems($i_id)
    {
        $sql = "SELECT * FROM items WHERE i_id = '$i_id'";

        $result = $this->connect()->query($sql);
        
        $row = $result->fetch_assoc(); 
        return $row;
    }

    protected function updateItems($r_id, $r_name, $r_desc, $r_price, $r_available,  $r_newimg, $old_img)
    {

        if ($r_newimg != '') {
            $updatedimg =  $r_newimg;
            echo '<script type="text/javascript">';
            echo 'alert("Successfully updated");';
            echo 'window.location.href = "../Admin/Rooms.php" ';
            echo '</script>';
        } else {
            $updatedimg =  $old_img;
            echo '<script type="text/javascript">';
            echo 'alert("Successfully updated");';
            echo 'window.location.href = "../Admin/Rooms.php" ';
            echo '</script>';
        }

        $sql = "UPDATE rooms SET r_name = '$r_name', r_img = '$updatedimg', r_desc = '$r_desc', r_price = '$r_price' , r_available = '$r_available' WHERE r_id = '$r_id'";

        $result = $this->connect()->query($sql);

        if ($result) {
            if ($_FILES["r_img"]["name"] != '') {

                move_uploaded_file($_FILES["r_img"]["tmp_name"], "../Admin/Rooms/" . $_FILES["r_img"]["name"]);
                unlink("../Admin/Rooms/" . $old_img);
                echo '<script type="text/javascript">';
                echo 'alert("Successfully updated");';
                echo 'window.location.href = "../Admin/Rooms.php" ';
                echo '</script>';
            }
        } else {
            die('Error: ');
        }
        return $result;
    }

    protected function deleteItem($i_id)
    {
        $sql = "SELECT i_img FROM items WHERE i_id = '$i_id'";
        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $imgFileName = $row['i_img'];
            $sqlDelete = "DELETE FROM items WHERE i_id = '$i_id'";
            $resultDelete = $this->connect()->query($sqlDelete);

            if ($resultDelete) {
                $imgFilePath = "../Admin/Rooms/" . $imgFileName;
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
