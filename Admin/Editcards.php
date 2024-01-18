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

    <?php

            foreach ($result as $row) {
    ?>

                <form class="" action="../data/dCards.php" method="post" autocomplete="off" enctype="multipart/form-data">

                    <input type="hidden" name="card_id" value="<?php echo $row['card_id']; ?>">

                    <label for="name">Name : </label>
                    <input type="text" name="name" id="name" required value="<?php echo $row['name']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-70 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""> <br>


                    <label for="des">Description : </label>
                    <textarea  type="text" name="img_desc" id="des" required value="<?php echo $row['img_desc']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-70 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder=""></textarea><br>

                    <label for="image">Upload new image : </label>
                    <input type="file" name="img_dir" id="image" accept=".jpg, .jpeg, .png">
                    <input type="hidden" name="oldimg" id="" value="<?php echo $row['img_dir']; ?>">
                    <br> <br>
                    <img class="rounded-t-lg object-contain h-80 w-3/4" src="<?php echo "uploads/" . $row['img_dir']; ?>" alt="" hidden>
                    <button type="submit" name="update">Update</button>
                </form>


    <?php
            
    }

    ?>







    <br>
    <br>













    <!-- <?php foreach ($rows as $row) : ?>
        <div class="inline-block ">
            <a href="Editcards.php?card_id=<?= $row['card_id'] ?>">Edit</a>
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 inline-table ">

                <a href="#">
                    <img class="rounded-t-lg object-contain h-80 w-3/4" src="uploads/<?php echo $row["img_dir"]; ?>" width=200 title="<?php echo $row['img_dir']; ?>">
                </a>

                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row["name"]; ?></h5>
                    </a>

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    <?php echo $row["img_desc"]; ?>
                    </p>

                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    <?php endforeach; ?> -->





    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>


</body>

</html>