<?php 
session_start();
include '../database/Connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/output.css">
    <title>Book</title>
</head>
<body>
    
<form class="max-w-sm mx-auto" method="post" action="../include/RequestBooking.php">
<div class="mb-5">
        <input 
        type="hidden"
        id="" 
        value="<?php echo $_SESSION['user_id'] ?>"
        name="users_id">
        <input 
        type="hidden"
        id="email" 
        value="<?php echo $_SESSION['email'] ?>"
        name="booking_email">
    </div>

    <div class="mb-5">
        <label for="numAdults" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of Adults</label>
        <input 
        type="number" 
        id="numAdults" 
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        name="numAdults"
        required>
    </div>

    <div class="mb-5">
        <label for="numChild" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nmber Childs</label>
        <input 
        type="number" 
        id="numChild" 
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        name="numChild"
        required>
    </div>

    <div class="mb-5">
        <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date to Book</label>
        <input 
        type="date" 
        id="date" 
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        name="date"
        required>
    </div>


    <label for="payment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Payment option</label>
<select id="payment" name="payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

  <?php
  include '../database/Connection.php';
  $sql = "SELECT * FROM payment_method order by id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['payment'] . '">' . $row['payment'] . '</option>';
    }
}
  ?>
</select>


<br>
    <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    name="book"
    value="Book"
    >
</form>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</body>
</html>