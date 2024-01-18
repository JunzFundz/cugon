<?php
session_start();
include 'Connection.php';

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";


  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result)) {
    $row = mysqli_fetch_assoc($result);



    if ($row['user_id'] == 26) {
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      header('Location: ../Admin/Home.php');
    } else {
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['email'] = $email;
      header('Location: ../User/Home.php');
    }
  } else {
    echo '<script type = "text/javascript">';
    echo 'alert("Invalid Username or Password!");';
    echo 'window.location.href = "../dist/Login.php" ';
    echo '</script>';
  }
}
