<?php
require('../database/Connection.php');

class Users extends Dbh
{

    public function addRating($rating_data, $userEmail, $ratingCaption, $imgJson, $status)
    {
        $sql = "INSERT INTO ratings (rating_data, email, caption, img, status) VALUES ('$rating_data', '$userEmail', '$ratingCaption', '$imgJson', '$status')";

        $result = $this->connect()->query($sql);
        return $result;
    }
    public function showRatings()
    {
        $sql = "SELECT * FROM ratings ORDER BY r_id DESC";

        $result = $this->connect()->query($sql);
        return $result;
    }

    public function addInfo($setEmail, $getUserId, $setName, $setPhone, $setCity, $setBrgy, $setZip, $created_at, $setMsg)
    {
        $sql = "INSERT INTO users (email, phone, full_name, city, brgy, zip_code, message, created_at) VALUES ('$setEmail', '$setPhone', '$setName','$setCity' ,'$setBrgy'  ,'$setZip' ,'$setMsg', '$created_at') WHERE user_id='$getUserId'";

        if ($result = $this->connect()->query($sql)) {
            return 'success';
        } else {
            return 'failed';
        }
        return $result;
    }
    public function updateInfo($setEmail, $getUserId, $setName, $setPhone, $setCity, $setBrgy, $setZip, $created_at, $setMsg)
    {
        $sql = "UPDATE users SET 
                email = '$setEmail',
                phone = '$setPhone',
                full_name = '$setName',
                city = '$setCity',
                brgy = '$setBrgy',
                zip_code = '$setZip',
                message = '$setMsg',
                created_at = '$created_at'
                WHERE user_id = '$getUserId'";
    
        if ($result = $this->connect()->query($sql)) {
            return true;
        } else {
            return false;
        }

        return $result;
    }
    
    public function getUserInfo($users_id)
    {
        $users_id = $this->connect()->real_escape_string($users_id);

        $sql = "SELECT * FROM users WHERE user_id = '$users_id'";

        $result = $this->connect()->query($sql);

        if ($result && $result->num_rows > 0) {
            $user_info = $result->fetch_assoc();
            return $user_info;
        } else {
            return null;
        }
    }
}
