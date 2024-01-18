<?php

class Cards extends Dbh
{
    public function __construct()
    {
        $db = new Dbh;
        $this->conn = $db->connect();
    }

    public function cardData()
    {

        $sql = 'SELECT * FROM cards ORDER BY card_id';

        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function addCard($name, $img_dir, $img_desc)
    {

        if (file_exists("../Admin/uploads/" . $_FILES["img_dir"]["name"])) {
            $filename = $_FILES["img_dir"]["name"];
        } else {
            $sql = "INSERT INTO cards (name, img_dir, img_desc) VALUES('$name', '$img_dir', '$img_desc')";

            $result = $this->connect()->query($sql);

            if ($result) {
                move_uploaded_file($_FILES["img_dir"]["tmp_name"], "../Admin/uploads/" . $_FILES["img_dir"]["name"]);

                echo '<script type="text/javascript">';
                echo 'alert("Upload Successful");';
                echo 'window.location.href = "../Admin/Cards.php" ';
                echo '</script>';
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Upload Unsuccessful");';
                echo 'window.location.href = "../Admin/Cards.php" ';
                echo '</script>';
            }
        }
    }


    public function editCards($card_id)
    {
        $sql = "SELECT * FROM cards WHERE card_id = '$card_id'";

        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function updateCard($id, $name, $img_desc, $newimg, $old_img)
    {
        if ($newimg != '') {
            $updatedimg =  $newimg;
            if (file_exists("uploads/" . $_FILES["img_dir"]["name"])) {
                $_FILES["img_dir"]["name"];
                echo 'File exist';
            }
        }else{
            $updatedimg =  $old_img;
            echo '<script type="text/javascript">';
            echo 'alert("Successfully updated");';
            echo 'window.location.href = "../Admin/Cards.php" ';
            echo '</script>';
        }

        $sql = "UPDATE cards SET name = '$name', img_dir = '$updatedimg', img_desc = '$img_desc' WHERE card_id = '$id'";
        
        $result = $this->connect()->query($sql);

        if ($result) {
            if ($_FILES["img_dir"]["name"] != '') {
                
                move_uploaded_file($_FILES["img_dir"]["tmp_name"], "uploads/" . $_FILES["img_dir"]["name"]);
                unlink("uploads/" . $old_img);

                echo '<script type="text/javascript">';
                echo 'alert("Successfully updated");';
                echo 'window.location.href = "../Admin/Cards.php" ';
                echo '</script>';
            }
        }else{
            die('Error: ');
        }
    }

    public function deleteCard($card_id)
    {
        $sql = "DELETE FROM cards WHERE card_id = '$card_id'";

        $result = $this->connect()->query($sql);

        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
}
