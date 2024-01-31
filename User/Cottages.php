<?php
session_start();
include '../data/dCottages.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/Userhome.css">
    <link href="../node_modules/flowbite/dist/flowbite.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Document</title>
</head>

<body>

    <div class="containernewdiv">

        <div class="nav-section">
            <?php include 'components/Navigation.php';?>
        </div>

        <div class="body-panel">
            <div class="new-block" name="viewDetail">
                <?php foreach ($result as $row) : ?>

                    <div class="new overflow-hidden max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                            <img class="image-prod rounded-t-lg" name="image" src="../Admin/Cottages/<?php echo $row["cot_img"]; ?>" alt="product image" />

                        <div class="px-5 pb-5">

                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?php echo $row["cot_name"]; ?></h5>

                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">

                                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                </div>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class=" text-2xl font-bold text-gray-900 dark:text-white">₱<?= $row['cot_price'] ?></span>
                                <div>

                                    <a type="a" href="Itemcheckout.php?cot_id=<?= $row['cot_id'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 new-checkout">Get</a>

                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>

        <div class="right-panel"></div>
        <div class="footer-section"></div>
    </div>

    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

</body>

</html>