<?php
session_start();

include 'conn.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   while ($row = $result->fetch_assoc()) {
      if (password_verify($password, $row["password"])) {
         $_SESSION['username'] = $row["username"];
         header("Location: testhome.php");
      } else {
         echo "Incorrect password";
      }
   }
} else {
   echo "Email not found";
}

$conn->close();
?>
