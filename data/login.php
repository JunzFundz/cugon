<?php
session_start();
require_once('../database/Connection.php');
if (isset($_POST['login-user'])) {

    $response = array();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $conn = new Dbh();
    $connection = $conn->connect();

    $stmt = $connection->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $stored_password = $row["password"];
            if (password_verify($password, $stored_password)) {
                $_SESSION['username'] = $row["username"];
                $_SESSION['user_id'] = $row["user_id"];
                $_SESSION['email'] = $row["email"];

                $redirect = ($_SESSION['user_id'] === 321) ? '../Admin/welcome.php' : '../User/Items.php';

                $response = [
                    'redirect' => $redirect
                ];
            } else {
                $response = [
                    'error' => 'Incorrect Password'
                ];
            }
        }
    } else {
        $response = [
            'error' => 'Account not found'
        ];
    }
    echo json_encode($response);
    exit;
}
?>