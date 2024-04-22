<?php
require('../database/Connection.php');

class Users extends Dbh
{
    public function rooms()
    {
        $sql = 'SELECT * FROM items WHERE i_type="Rooms"';
        $result2 = $this->connect()->query($sql);
        return $result2;
    }
    public function foods()
    {
        $sql = 'SELECT * FROM items WHERE i_type="Foods"';
        $result = $this->connect()->query($sql);
        return $result;
    }
    public function site_ratings()
    {
        $sql = 'SELECT * FROM ratings';
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function cottage()
    {
        $sql = 'SELECT * FROM items WHERE i_type="Cottages"';
        $result3 = $this->connect()->query($sql);
        return $result3;
    }
    public function getUser($user_id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM res_tb 
        INNER JOIN transactions ON res_tb.user_id = transactions.user_id WHERE res_tb.user_id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        $result = $stmt->get_result();

        $user_data = $result->fetch_assoc();
        return $user_data;
    }

    public function addRating($rating_data, $userEmail, $ratingCaption, $imgJson, $formattedDate, $status)
    {
        $stmt = $this->connect()->prepare("INSERT INTO ratings (rating_data, email, caption, img, posted_at, status) VALUES (?, ?, ?, ?, ?, ?)");

        $stmt->bind_param("ssssss", $rating_data, $userEmail, $ratingCaption, $imgJson, $formattedDate, $status);

        $result = $stmt->execute();
        return $result;
    }

    public function item_rating($quality, $service, $comments, $user_id, $item_id, $item_star)
    {
        $selectStmt = $this->connect()->prepare("SELECT username FROM users WHERE user_id = ?");
        $selectStmt->bind_param("i", $user_id);
        $result = $selectStmt->execute();
        if ($result) {
            $resultSet = $selectStmt->get_result();
            $row = $resultSet->fetch_assoc();

            if ($row) {
                $username = $row['username'];
                $stmt = $this->connect()->prepare("INSERT INTO item_ratings (item_id, client_id, client_username, rating_data, quality, service, comments, date_posted) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");

                $stmt->bind_param("iisisss", $item_id, $user_id, $username, $item_star, $quality, $service, $comments);
                $result = $stmt->execute();
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function showRatings()
    {
        $sql = "SELECT * FROM ratings ORDER BY r_id DESC";

        $result = $this->connect()->query($sql);
        return $result;
    }

    public function allUsers()
    {
        $sql = "SELECT * FROM user ORDER BY email DESC";

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

    public function userNotification($user_id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM notifications
        INNER JOIN users ON notifications.user_id=users.user_id
        WHERE users.user_id = ?");

        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public function checkUser(string $email, string $name, string $token): bool
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['email'] = $user['email'];
            $_SESSION['user_id'] = $user['user_id'];
        } else {
            $stmt = $this->connect()->prepare("INSERT INTO users (username, email, full_name, token) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $email, $email, $name, $token);
            $success = $stmt->execute();

            if ($success) {
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $stmt->insert_id;
                return true;
            } else {
                print "Error: " . $stmt->error;
            }
        }

        return false;
    }

    public function search($searchTerm)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM items WHERE (i_name LIKE ? OR i_price LIKE ?) AND i_type IN ('Rooms', 'Cottage')");

        $searchTermLike = "%{$searchTerm}%";
        $stmt->bind_param("ss", $searchTermLike, $searchTermLike);
        $stmt->execute();
        $result = $stmt->get_result();
    
        return $result;
    }
    
    
}
