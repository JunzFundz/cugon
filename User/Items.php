<?php
session_start();

include('user-header.php');
include('navigation.php');
include('../data/user-load-info.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<title>Items</title>
</head>

<body>

    <main>
        <section class=" dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
                <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Rooms</h2>
                    <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400"></p>
                </div>
                <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
                    <?php foreach ($result2 as $row) : ?>
                        <div class="items-center bg-white rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                            <a href="get-item.php?i_id=<?= $row['i_id'] ?>">
                                <img class="w-full image-prod rounded-lg sm:rounded-none sm:rounded-l-lg" src="../Admin/Items/<?php echo $row["i_img"]; ?>" name="image" alt="" alt="Bonnie Avatar">
                            </a>
                            <div class="p-5">
                                <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    <a href="get-item.php?i_id=<?= $row['i_id'] ?>"><?= $row['i_name'] ?></a>
                                </h3>
                                <span class="text-red-500 dark:text-red-400 font-medium">₱<?= number_format($row['i_price']) ?></span>
                                <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400"><?= $row['i_desc'] ?></p>
                                <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">x<?= $row['i_quantity'] ?> available</p>
                                <ul class="flex space-x-2 sm:mt-0">
                                    <li>
                                        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                                            <a href="get-item.php?i_id=<?= $row['i_id'] ?>" class="relative px-4 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                Get
                                            </a>
                                        </button>
                                    </li>
                                    <li>
                                        <button class="invisible relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                                            <a href="get-item.php?i_id=<?= $row['i_id'] ?>" class="relative px-4 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                <i class="fa-solid fa-cart-shopping text-gray-600"></i>
                                            </a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <section class=" dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
                <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Cottages</h2>
                    <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400"></p>
                </div>
                <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
                    <?php foreach ($result3 as $row) : ?>
                        <div class="items-center bg-white rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">
                            <a href="get-item.php?i_id=<?= $row['i_id'] ?>">
                                <img class="w-full image-prod rounded-lg sm:rounded-none sm:rounded-l-lg" src="../Admin/Items/<?php echo $row["i_img"]; ?>" name="image" alt="" alt="Bonnie Avatar">
                            </a>
                            <div class="p-5">
                                <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    <a href="get-item.php?i_id=<?= $row['i_id'] ?>"><?= $row['i_name'] ?></a>
                                </h3>
                                <span class="text-red-500 dark:text-red-400 font-medium">₱<?= number_format($row['i_price']) ?></span>
                                <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400"><?= $row['i_desc'] ?></p>
                                <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400">x<?= $row['i_quantity'] ?> available</p>
                                <ul class="flex space-x-2 sm:mt-0">
                                    <li>
                                        <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                                            <a href="get-item.php?i_id=<?= $row['i_id'] ?>" class="relative px-4 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                Get
                                            </a>
                                        </button>
                                    </li>
                                    <li>
                                        <button  class="invisible relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                                            <a href="get-item.php?i_id=<?= $row['i_id'] ?>" class=" relative px-4 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                                <i class="fa-solid fa-cart-shopping text-gray-600"></i>
                                            </a>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <?php include('user-footer.php'); ?>
