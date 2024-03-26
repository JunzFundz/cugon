<?php
$server = "localhost";
$username = "root";
$password = "fundador142";
$db = "cugondb";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}