<?php
require_once('../database/Connection.php');

if (isset($_POST['load'])) {
    $databaseConnection = new Dbh(); // Create an instance of the class
    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);

    if (!$user_id) {
        echo json_encode(['error' => 'Invalid user ID']);
        exit;
    }
    $stmt = $databaseConnection->connect()->prepare("SELECT COUNT(*) AS items_in_cart FROM cart WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['items_in_cart'] > 0) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false];
    }

    echo json_encode($response);
}

if (isset($_POST['notif'])) {
    $databaseConnection = new Dbh();
    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);

    if (!$user_id) {
        echo json_encode(['error' => 'Invalid user ID']);
        exit;
    }
    $stmt = $databaseConnection->connect()->prepare("SELECT * FROM notifications WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row['user_id'] > 0) {
        $response = ['success' => true];
    } else {
        $response = ['success' => false];
    }

    echo json_encode($response);
}
