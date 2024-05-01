<?php
require_once('../database/Connection.php');

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

    public function updateRestb($res_id)
    {
        $update = $this->connect()->prepare("UPDATE res_tb SET status = 'COMPLETED' WHERE res_id = ? AND status = 'EXPIRED'");
        $update->bind_param("i", $res_id);
        $update_result = $update->execute();

        return $update_result;
    }
    public function item_rating($res_id, $quality, $service, $comments, $user_id, $item_id, $item_star)
    {
        if ($this->updateRestb($res_id)) {
            $selectStmt = $this->connect()->prepare("SELECT username FROM users WHERE user_id = ?");
            $selectStmt->bind_param("i", $user_id);
            $select_result = $selectStmt->execute();

            if ($select_result) {
                $resultSet = $selectStmt->get_result();
                $row = $resultSet->fetch_assoc();

                if ($row) {
                    $username = $row['username'];
                    // Insert rating data into item_ratings table
                    $stmt = $this->connect()->prepare("INSERT INTO item_ratings (item_id, client_id, client_username, rating_data, quality, service, comments, date_posted) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
                    $stmt->bind_param("iisisss", $item_id, $user_id, $username, $item_star, $quality, $service, $comments);
                    $insert_result = $stmt->execute();

                    return $insert_result;
                } else {
                    return false;
                }
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
        $sql = "UPDATE users SET email = ?,
                phone = ?,
                full_name = ?,
                city = ?,
                brgy = ?,
                zip_code = ?,
                message = ?,
                created_at = ?
                WHERE user_id = ?";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bind_param("ssssssssi", $setEmail, $setPhone, $setName, $setCity, $setBrgy, $setZip, $setMsg, $created_at, $getUserId);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserInfo($userId)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_id =?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $userInfo = $result->fetch_assoc();
            return $userInfo;
        }

        return null;
    }

    public function load_user_info($user_id, $email)
    {
        $stmt = $this->connect()->prepare(
            "SELECT * FROM users WHERE user_id =? AND email =?"
        );

        $stmt->bind_param("is", $user_id, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function load_user_reservation($user_id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM res_tb WHERE user_id =?");

        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function load_user_itemrating($user_id)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM item_ratings WHERE client_id =?");

        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
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
        $stmt = $this->connect()->prepare("SELECT * FROM items WHERE (i_name LIKE ? OR i_price LIKE ?) AND i_type IN ('Rooms', 'Cottages')");

        $searchTermLike = "%{$searchTerm}%";
        $stmt->bind_param("ss", $searchTermLike, $searchTermLike);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function changeAuth($id, $newPasswordHash)
    {
        $stmt = $this->connect()->prepare("UPDATE users SET password = ? WHERE user_id = ?");
        $stmt->bind_param('si', $newPasswordHash, $id);
        $result = $stmt->execute();

        return [
            'success' => true,
            'error' => 'Chnged Password Success'
        ];
    }

    public function CAuth($id, $oldPassword)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE user_id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $stored_password = $row["password"];
                if (password_verify($oldPassword, $stored_password)) {
                    return [
                        'success' => true
                    ];
                } else {
                    return [
                        'success' => false,
                        'error' => 'Incorrect Password'
                    ];
                }
            }
        } else {
            return [
                'success' => false,
                'error' => 'Account not found'
            ];
        }
    }

    public function Udata($set_user, $set_email, $set_phone, $set_name, $set_city, $set_brgy, $set_zip, $uid)
    {
        $stmt = $this->connect()->prepare('UPDATE users SET username = ?, email = ?, phone = ?, full_name = ?, city = ?, brgy = ?, zip_code = ? WHERE user_id = ?');
    
        $stmt->bind_param("ssisssii", $set_user, $set_email, $set_phone, $set_name, $set_city, $set_brgy, $set_zip, $uid);
        $result = $stmt->execute();
    
        return $result;
    }
    
    
}
