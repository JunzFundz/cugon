<?php
session_start();
include '../data/dCards.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="src/grids.css">

</head>

<body>
    <a href="Home.php" class="">Back to home</a>
    <br>
    <br>

    <?php foreach ($result as $row) :  ?>

        <form class="" action="../data/dCards.php" method="post" autocomplete="off" enctype="multipart/form-data">

            <input type="hidden" name="card_id" value="<?php echo $row['card_id']; ?>">

            <label for="name">Name : </label>
            <input type="text" name="name" id="name" required value="<?php echo $row['name']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-70 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""><br>

            <label for="des">Description : </label>
            <input type="text" name="img_desc" id="des" value="<?php echo $row['img_desc']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-70 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input><br>

            <label for="des">Price : </label>
            <input type="number" name="price" id="des" required value="<?php echo $row['price']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-70 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></input><br>

            <label for="image">Upload new image : </label>
            <input type="file" name="img_dir" id="image" accept=".jpg, .jpeg, .png">
            <input type="hidden" name="oldimg" id="" value="<?php echo $row['img_dir']; ?>">
            <br> <br>
            
            <button type="submit" name="update">Update</button>
        </form>


    <?php endforeach; ?>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>


</body>

</html>