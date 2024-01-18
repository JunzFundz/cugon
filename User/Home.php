<?php
    session_start();
    include '../database/Connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><?php echo $_SESSION['email']; ?></h1>
<a href="../database/Logout.php">Logout</a>
<a href="BookingForm.php">Book now </a>

<script src="book.js"></script>
</body>
</html>