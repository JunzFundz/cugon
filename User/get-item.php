<?php
session_start();
include('user-header.php');
include('navigation.php');
include('../data/user-checkout.php');
?>

<title>Checkout</title>
</head>

<div class="opacity-0 invisible" id="alert-box">
    <span class=" text-2xl text-white text-opacity-100" id="alert-text"></span>
</div>

<body>
    <main style="padding-inline: 5rem">
        <section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
            <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
                <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                    <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                        <img class="w-full dark:hidden" src="../Admin/Items/<?php echo $row["i_img"]; ?>" alt="" />
                    </div>

                    <div class="mt-6 sm:mt-8 lg:mt-0">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                            <?php echo $row['i_name'] ?>
                        </h1>
                        <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                            <p class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white">
                                <?php echo number_format($row['i_price']) ?>
                            </p>

                            <div class="flex items-center gap-2 mt-2 sm:mt-0">
                                <div class="flex items-center gap-1">
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                    </svg>
                                </div>
                                <p class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400">
                                    (5.0)
                                </p>
                                <a href="#" class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white">
                                    345 Reviews
                                </a>
                            </div>
                        </div>

                        <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">

                            <a href="#" id="addtoCart" title="" class="addtoCart flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" role="button">
                                <svg class="w-5 h-5 -ms-2 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                </svg>
                                Add to cart
                            </a>

                            <a href="#" title="" data-modal-target="updateProductModal" data-modal-toggle="updateProductModal" class="text-white bg-blue-600 mt-4 ml-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center" role="button">
                                Get
                            </a>
                        </div>

                        <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                        <p class="mb-6 text-gray-500 dark:text-gray-400">
                            Studio quality three mic array for crystal clear calls and voice
                            recordings. Six-speaker sound system for a remarkably robust and
                            high-quality audio experience. Up to 256GB of ultrafast SSD storage.
                        </p>

                        <p class="text-gray-500 dark:text-gray-400">
                            Two Thunderbolt USB 4 ports and up to two USB 3 ports. Ultrafast
                            Wi-Fi 6 and Bluetooth 5.0 wireless. Color matched Magic Mouse with
                            Magic Keyboard or Magic Keyboard with Touch ID.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">

                <div class="flex items-center gap-2">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Reviews</h2>
                    <div class="mt-2 flex items-center gap-2 sm:mt-0">
                    <div class="flex items-center gap-0.5">
                        <?php
                        for ($i = 1; $i <= 5; $i++) {
                            $fillClass = ($i <= $averageRating) ? 'text-yellow-300' : 'text-gray-300';
                        ?>
                            <svg class="h-4 w-4 <?= $fillClass ?>" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                            </svg>
                        <?php
                        }
                        ?>
                    </div>
                    <p class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400">(<?= number_format($averageRating, 1) ?>)</p>
                    <a href="#" class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white"> <?= array_sum($ratingCounts) ?> Reviews </a>
                </div>
                </div>

                <div class="my-6 gap-8 sm:flex sm:items-start md:my-8">
                    <div class="shrink-0 space-y-4">
                        <p class="text-2xl font-semibold leading-none text-gray-900 dark:text-white"><?= number_format($averageRating, 2) ?> out of 5</p>
                    </div>

                    <div class="mt-6 min-w-0 flex-1 space-y-3 sm:mt-0">


                        <?php
                        foreach ($ratingCounts as $rating => $count) {
                            $percentage = ($count / array_sum($ratingCounts)) * 100;
                        ?>
                            <div class="flex items-center gap-2">
                                <p class="w-2 shrink-0 text-start text-sm font-medium leading-none text-gray-900 dark:text-white"><?= $rating ?></p>
                                <svg class="h-4 w-4 shrink-0 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                </svg>
                                <div class="h-1.5 w-80 rounded-full bg-gray-200 dark:bg-gray-700">
                                    <div class="h-1.5 rounded-full bg-yellow-300" style="width: <?= $percentage ?>%"></div>
                                </div>
                                <a href="#" class="w-8 shrink-0 text-right text-sm font-medium leading-none text-primary-700 hover:underline dark:text-primary-500 sm:w-auto sm:text-left"><?= $count ?> <span class="hidden sm:inline">reviews</span></a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div class="mt-6 divide-y divide-gray-200 dark:divide-gray-700" style="margin-top: 40px; padding-inline: 1rem">
                <?php foreach ($client_rating as $rating_row) { ?>
                    <div class="gap-3 pb-6 sm:flex sm:items-start" style="padding-top: 20px">
                        <div class="shrink-0 space-y-2 sm:w-48 md:w-72">
                            <div class="flex items-center gap-0.5">

                                <?php for ($i = 1; $i <= 5; $i++) { ?>

                                    <svg class="h-4 w-4 text-yellow-300 <?= $i <= $rating_row['rating_data'] ? 'text-yellow-300 fa-solid' : '' ?>" id="submit--<?= $i ?>" data-rating-star="<?= $i ?>" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                    </svg>

                                <?php } ?>

                            </div>

                            <div class="space-y-0.5">
                                <p class="text-base font-semibold text-gray-900 dark:text-white"><?= $rating_row['client_username']; ?></p>
                                <p class="text-sm font-normal text-gray-500 dark:text-gray-400"><?= $rating_row['date_posted']; ?></p>
                            </div>

                        </div>

                        <div class="mt-4 min-w-0 flex-1 space-y-4 sm:mt-0">
                            <p class="text-base font-normal text-gray-500 dark:text-gray-400"><?= $rating_row['comments']; ?></p>

                            <div class="flex items-center gap-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Was it helpful to you?</p>
                                <div class="flex items-center">
                                    <input id="reviews-radio-1" type="radio" value="" name="reviews-radio" class="h-4 w-4 border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="reviews-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"> Yes: 3 </label>
                                </div>
                                <div class="flex items-center">
                                    <input id="reviews-radio-2" type="radio" value="" name="reviews-radio" class="h-4 w-4 border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    <label for="reviews-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">No: 0 </label>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- <div class="mt-6 text-center">
                    <button type="button" class="mb-2 me-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">View more reviews</button>
                </div> -->
            </div>
        </section>

    </main>

    <!-- Add review modal -->
    <div id="review-modal" tabindex="-1" aria-hidden="true" class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0 antialiased">
        <div class="relative max-h-full w-full max-w-2xl p-4">
            <!-- Modal content -->
            <div class="relative rounded-lg bg-white shadow dark:bg-gray-800">
                <!-- Modal header -->
                <div class="flex items-center justify-between rounded-t border-b border-gray-200 p-4 dark:border-gray-700 md:p-5">
                    <div>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">Add a review for:</h3>
                        <a href="#" class="font-medium text-primary-700 hover:underline dark:text-primary-500">Apple iMac 24" All-In-One Computer, Apple M1, 8GB RAM, 256GB SSD</a>
                    </div>
                    <button type="button" class="absolute right-5 top-5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-gray-400 hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="review-modal">
                        <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5">
                    <div class="mb-4 grid grid-cols-2 gap-4">
                        <div class="col-span-2">
                            <div class="flex items-center">
                                <svg class="h-6 w-6 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="ms-2 h-6 w-6 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="ms-2 h-6 w-6 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="ms-2 h-6 w-6 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="ms-2 h-6 w-6 text-gray-300 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <span class="ms-2 text-lg font-bold text-gray-900 dark:text-white">3.0 out of 5</span>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <label for="title" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Review title</label>
                            <input type="text" name="title" id="title" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-600 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" required="" />
                        </div>
                        <div class="col-span-2">
                            <label for="description" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Review description</label>
                            <textarea id="description" rows="6" class="mb-2 block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" required=""></textarea>
                            <p class="ms-auto text-xs text-gray-500 dark:text-gray-400">Problems with the product or delivery? <a href="#" class="text-primary-600 hover:underline dark:text-primary-500">Send a report</a>.</p>
                        </div>
                        <div class="col-span-2">
                            <p class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Add real photos of the product to help other customers <span class="text-gray-500 dark:text-gray-400">(Optional)</span></p>
                            <div class="flex w-full items-center justify-center">
                                <label for="dropzone-file" class="dark:hover:bg-bray-800 flex h-52 w-full cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 bg-gray-50 hover:bg-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pb-6 pt-5">
                                        <svg class="mb-4 h-8 w-8 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>
                        <div class="col-span-2">
                            <div class="flex items-center">
                                <input id="review-checkbox" type="checkbox" value="" class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-primary-600 focus:ring-2 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                <label for="review-checkbox" class="ms-2 text-sm font-medium text-gray-500 dark:text-gray-400">By publishing this review you agree with the <a href="#" class="text-primary-600 hover:underline dark:text-primary-500">terms and conditions</a>.</label>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 pt-4 dark:border-gray-700 md:pt-5">
                        <button type="submit" class="me-2 inline-flex items-center rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Add review</button>
                        <button type="button" data-modal-toggle="review-modal" class="me-2 rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Main modal -->
    <div id="updateProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Booking
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="updateProductModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="myForm" name="form" onsubmit="return validateBooking(this)" method="post" action="placed-item.php?user_id=<?php echo $_SESSION['user_id']; ?>">

                    <input type="hidden" value="<?php echo $row['i_id'] ?>" name="item_id" class="item_id">
                    <input type="hidden" value="<?php echo $row['i_name'] ?>" name="item_name" class="item_name">
                    <input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="users_id">
                    <input type="hidden" value="<?php echo $row['i_price'] ?>" name="price">
                    <input type="hidden" value="<?php echo $row['i_quantity'] ?>" name="available">

                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="options" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select type of booking</label>
                            <select id="options" name="dateOptions" onchange="changeInputs()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="reg" selected>Regular</option>
                                <option value="stay">Stay</option>
                            </select>
                        </div>
                        <div>
                            <label for="quantity-input" class="block mb-2 text-sm text-gray-900 dark:text-white font-semibold">Date:</label>
                            <div class="relative max-w-sm" id="singleDate">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input name="regular_date" id="singleDate" datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 singleDate" placeholder="Select date">
                            </div>

                            <div date-rangepicker class="flex items-center " id="twoDates">
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>

                                    <input id="start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select start">
                                </div>
                                <span class="mx-4 text-orange-600">to</span>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>

                                    <input id="end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select end">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid gap-4 mb-4 sm:grid-cols-2">

                        <div>
                            <label for="quantity-input" class="block mb-2 text-sm text-gray-900 dark:text-white font-semibold">Quantity:</label>
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 p-3 h-9 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none text-center">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>

                                <input name="quantity" type="text" id="quantity" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-9 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-0.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="1">

                                <button type="button" id="increment-button" data-input-counter-increment="quantity" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 p-3 h-9 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Select an payment</label>
                            <select id="payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="payment">
                                <option selected value="counter">Over the counter</option>
                                <option value="Gcash">Gcash</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 pt-4" style="margin-top: 5rem;">
                        <button name="get-preffered-item" type="submit" class="text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            Check out
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>










    <!-- <div class="master-container">
        <div class="checkout-container">
            <div class="checkout-item-img">
                <img class="" height="598" width="400" src="../Admin/Items/<?php echo $row["i_img"]; ?>" alt="...">
                <br>
                <p class="product-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, placeat ea fuga assumenda similique aut incidunt debitis dolorum reiciendis sed velit ratione suscipit quia natus saepe. Nam ullam minima temporibus.<?php echo $row["i_desc"]; ?></p>
            </div>

            <form id="myForm" name="form" onsubmit="return validateBooking(this)" method="post" action="placed-item.php?user_id=<?php echo $_SESSION['user_id']; ?>">

                <input type="hidden" value="<?php echo $row['i_id'] ?>" name="item_id" class="item_id">
                <input type="hidden" value="<?php echo $row['i_name'] ?>" name="item_name" class="item_name">
                <input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="users_id">
                <input type="hidden" value="<?php echo $row['i_price'] ?>" name="price">
                <input type="hidden" value="<?php echo $row['i_quantity'] ?>" name="available">

                <div class="checkout-body-section">
                    <div class="w-full max-w-sm p-4 form-div-checkout">
                        <form id="myForm" name="form" onsubmit="return validateBooking(this)" method="post" action="placed-item.php?user_id=<?php echo $_SESSION['user_id']; ?>">

                            <input type="hidden" value="<?php echo $row['i_id'] ?>" name="item_id" class="item_id">
                            <input type="hidden" value="<?php echo $row['i_name'] ?>" name="item_name" class="item_name">
                            <input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="users_id">
                            <input type="hidden" value="<?php echo $row['i_price'] ?>" name="price">
                            <input type="hidden" value="<?php echo $row['i_quantity'] ?>" name="available">

                            <div class="tags-wrapper">
                                <h5 class=" text-gray-700 font-medium text-base mb-2"><?php echo $row['i_name'] ?></h5>
                                <ul class="flex flex-col-reverse gap-8">
                                    <li>
                                        Available | <span class=" text-blue-600 font-medium"><?php echo $row['i_quantity'] ?></span>
                                    </li>
                                    <?php foreach ($data as $rating_row) { ?>
                                        <li>
                                            Ratings | <span class=" text-blue-600 font-medium"><?php echo $rating_row['total_ratings'] ?></span>
                                        </li>
                                        <li>
                                            Availed | <span class=" text-blue-600 font-medium"><?php echo $rating_row['clients'] ?></span>
                                        </li>
                                    <?php } ?>
                                </ul>
                                <section>
                                    <span class=" text-red-500 font-semibold text-4xl mb-6">₱<?php echo number_format($row['i_price']) ?></span>
                                </section>
                            </div>


                            <label for="options" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select type of booking</label>
                            <select id="options" name="dateOptions" onchange="changeInputs()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="reg" selected>Regular</option>
                                <option value="stay">Stay</option>
                            </select>

                            <br>
                            <div class="relative max-w-sm" id="singleDate">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>
                                <input name="regular_date" id="singleDate" datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 singleDate" placeholder="Select date">
                            </div>

                            <div date-rangepicker class="flex items-center " id="twoDates">
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>

                                    <input id="start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select start">
                                </div>
                                <span class="mx-4 text-orange-600">to</span>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>

                                    <input id="end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select end">
                                </div>
                            </div>

                            <br>
                            <label for="quantity-input" class="block mb-2 text-sm text-gray-900 dark:text-white font-semibold">Quantity:</label>
                            <div class="relative flex items-center max-w-[8rem]">
                                <button type="button" id="decrement-button" data-input-counter-decrement="quantity" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 p-3 h-9 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none text-center">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                    </svg>
                                </button>

                                <input name="quantity" type="text" id="quantity" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-9 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-0.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="1">

                                <button type="button" id="increment-button" data-input-counter-increment="quantity" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 p-3 h-9 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                    <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                    </svg>
                                </button>
                            </div>

                            <br>
                            <label for="" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Select an payment</label>
                            <select id="payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="payment">
                                <option selected value="counter">Over the counter</option>
                                <option value="Gcash">Gcash</option>
                            </select>

                            <br>
                            <button id="addtoCart" type="submit" class=" text-blue-700 bg-blue-200  hover:bg-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 addtoCart" name="addcart"><i class="fa-solid fa-cart-plus pr-4"></i>Add to cart</button>

                            <button type="submit" class="left-0 ml-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " name="get-preffered-item">Get</button>

                        </form>

                        <button type="submit" data-modal-target="rate-item-modal" data-modal-toggle="rate-item-modal">Add</button>
                    </div>
                </div>
            </form>
        </div>

    </div> -->

    <!-- <div class="bg-white border border-gray-200 items-comments">
        <section>
            <?php foreach ($rating as $rating_row) { ?>
                <div class="relative group overflow-hidden py-4 border-b-2 border-gray-200 dark:border-gray-800" style="margin-block: 20px; width: 50%; padding-inline: 2rem; height: auto; width: auto; margin-inline: 20px">

                    <div class="relative rate-box-data">

                        <div class="mt-6 rounded-b-[--card-border-radius]">
                            <p><?= $rating_row['client_username']; ?></p>
                            <p>
                                <?php for ($i = 1; $i <= 5; $i++) { ?>
                                    <i class="fa-regular fa-star <?= $i <= $rating_row['rating_data'] ? 'text-yellow-300 fa-solid' : '' ?>" id="submit--<?= $i ?>" data-rating-star="<?= $i ?>" style="font-size: 9px; margin-top: -20px;"></i>
                                <?php } ?>
                            </p>
                            <p style="font-size: 9px; margin-bottom: 20px">
                                <?= $rating_row['date_posted']; ?>
                            </p>

                            <span class="text-gray-500 dark:text-gray-300 text-sm ">Quality: </span>
                            <span class="text-sm"><?= $rating_row['comments']; ?></span>
                            <br>
                            <span class="text-gray-500 dark:text-gray-300 text-sm ">Service: </span>
                            <span class="text-sm"><?= $rating_row['comments']; ?></span>
                            <br>
                            <p class="text-gray-700 dark:text-gray-300"><?= $rating_row['comments']; ?></p>
                        </div>

                        <div class="flex gap-3 -mb-8 py-4">
                            <a href="#" class="group rounded-xl disabled:border *:select-none [&>*:not(.sr-only)]:relative *:disabled:opacity-20 flex gap-1.5 items-center text-sm h-8 px-3.5 justify-center">
                                <i class="fa-regular fa-thumbs-up" style="font-size: 15px; color: grey;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>
    </div> -->

    <?php
    include('user-footer.php');
    include('load-modals.php');
    ?>
    <script>
        $(document).ready(function() {
            //! Add to cart
            $('#addtoCart').on('click', function(event) {
                event.preventDefault();

                const quantity = $('#quantity').val();
                const item_id = <?php echo $row['i_id'] ?>;
                const user_id = <?php echo $_SESSION['user_id'] ?>;

                $.ajax({
                    type: "post",
                    url: "../data/user-add-cart.php",
                    data: {
                        item_id: item_id,
                        user_id: user_id,
                        item_quantity: quantity
                    },
                    success: function(response) {
                        var result = JSON.parse(response);
                        var message = result ? "Item added" : "Item already added!";

                        $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                        $('#alert-text').html(message);

                        setTimeout(function() {
                            $('#alert-box').removeClass('visible').addClass('invisible');
                        }, 1500);
                    },

                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Error: " + status + " - " + error);
                    }
                });
            });


            //! check out
            $('#checkoutItem').on('click', function() {

                const option = $('#options').val();

                if (option == 'reg') {

                    const regular = $('#singleDate').val();
                    const quantity = $('#quantity').val();
                    const meal = $('#meal').val();
                    const item_id = <?php echo $row['i_id'] ?>;
                    const user_id = <?php echo $_SESSION['user_id'] ?>;

                    $.ajax({
                        type: "POST",
                        url: "../data/user-add-cart.php",
                        data: {
                            item_id: item_id,
                            user_id: user_id,
                            item_quantity: quantity,
                            meal_inc: meal
                        },
                        success: function(data) {
                            alert("Success");
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });

                } else {
                    const start = $('#start').val();
                    const end = $('#end').val();
                    const quantity = $('#quantity').val();
                    const meal = $('#meal').val();
                    const item_id = <?php echo $row['i_id'] ?>;
                    const user_id = <?php echo $_SESSION['user_id'] ?>;

                    $.ajax({
                        type: "POST",
                        url: "../data/user-checkout.php",
                        data: {
                            item_id: item_id,
                            user_id: user_id,
                            item_quantity: quantity
                        },
                        success: function(data) {
                            alert("Success");
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>