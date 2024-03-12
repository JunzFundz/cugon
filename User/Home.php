<?php
session_start();
include('user-header.php');
include('../data/user-load-ratings.php');
require('../config.php');

$conn = new mysqli ('localhost', 'root', 'fundador142', 'cugondb');

if (isset($_GET['code'])) {
    try {
        $accessToken = $gclient->fetchAccessTokenWithAuthCode($_GET['code']);
        if (!isset($accessToken['error'])) {
            $gclient->setAccessToken($accessToken);
            $payload = $gclient->verifyIdToken();

            $email = $payload['email'];
            $name = $payload['name'];
            $token = $accessToken['access_token'];

            $check_sql = "SELECT * FROM users WHERE email = '$email'";
            $result = $conn->query($check_sql);
            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                $_SESSION['email'] = $user['email'];
                $_SESSION['user_id'] = $user['user_id'];
            } else {
                $insert_sql = "INSERT INTO users (username, email, full_name, token) VALUES ('$email', '$email', '$name', '$token')";
                if ($conn->query($insert_sql) === TRUE) {
                    $_SESSION['email'] = $email;
                    $_SESSION['user_id'] = $conn->insert_id;
                } else {
                    echo "Error: " . $insert_sql . "<br>" . $conn->error;
                }
            }
        } else {
            
        }
    } catch (Exception $e) {
        echo 'Caught exception: ',  $e->getMessage(), "\n";
    }
}
?>


<title>Home</title>
</head>

<body>

    <!-- Container -->
    <div class="user-home-container">

        <!-- Navigation -->
        <div class="nav-section">
            <?php include 'Navigation.php'; ?>
        </div>

        <!-- Body panel -->
        <div class="user-body-panel">

            <ul class="flex flex-row post-container">
                <li data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="cursor-pointer"><span class=" hover:bg-gray-600 hover:text-white hover: rounded-md p-4">Add review</span></li>
                <li class="cursor-pointer"><span class=" hover:bg-gray-600 hover:text-white hover: rounded-md p-4">Create post</span></li>
                <li class="cursor-pointer"><span class=" hover:bg-gray-600 hover:text-white hover: rounded-md p-4">My Post</span></li>
                <b style="float: right;"><span id="average-ratings">0.0</span>/ 5</b>
            </ul>

            <?php foreach ($result as $rows) { ?>

                <div class="post-container">

                    <div class="block mx-4 my-4">
                        <div class="mt-4 text-gray-700 font-semibold flex flex-row text-center items-center">
                            <span class=" right-0 mr-3.5" style="margin-right: 10px;"><?= $rows['email'] ?></span>
                            <div class="col-span-2 text-center">

                                <i class="fa-regular fa-star" id="submit--1" data-rating-star="1"></i>
                                <i class="fa-regular fa-star " id="submit--2" data-rating-star="2"></i>
                                <i class="fa-regular fa-star " id="submit--3" data-rating-star="3"></i>
                                <i class="fa-regular fa-star " id="submit--4" data-rating-star="4"></i>
                                <i class="fa-regular fa-star " id="submit--5" data-rating-star="5"></i>
                            </div>
                        </div>
                        <div class="text-gray-700 text-xs">Date : March 20, 2024</div>
                        <div class="my-4 text-gray-700 text-s italic">
                            <?= $rows['caption'] ?>
                        </div>
                    </div>

                    <div id="indicators-carousel" class="relative w-full m-14" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <?php
                        $imgArray = json_decode($rows['img'], true);
                        ?>
                        <div class="relative h-96 overflow-hidden rounded-lg md:h-96">
                            <?php foreach ($imgArray as $index => $image) : ?>
                                <div class="hidden duration-700 ease-in-out <?php echo $index === 0 ? 'block' : ''; ?>" data-carousel-item="<?php echo $index === 0 ? 'active' : ''; ?>">
                                    <img src="../uploads/<?php echo $image; ?>" class="absolute object-fill block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- Slider indicators -->
                        <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                            <?php foreach ($imgArray as $index => $image) : ?>
                                <button type="button" class="w-3 h-3 rounded-full <?php echo $index === 0 ? 'bg-gray-500' : 'bg-gray-200'; ?>" aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $index + 1; ?>" data-carousel-slide-to="<?php echo $index; ?>"></button>
                            <?php endforeach; ?>
                        </div>
                        <!-- Slider controls -->
                        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
            <?php } ?>

        </div>

        <!-- Right section -->
        <div class="user-right-section block pt-4">

            <div class="">
                <p class="ml-5 rtl:ml-0 max-w-lg font-semibold leading-relaxed text-gray-900 dark:text-white">The Al-powered app will help you improve yourself by analysing your everyday life.</p>
            </div><br>

            <div>From: </div><br>

            <div>Message</div>

        </div>
    </div>

    <!-- Main modal -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Share your experience!
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                
                <!-- Modal body -->
                <form class="p-4 md:p-5" enctype="multipart/form-data" method="post">
                    <div class="grid gap-4 mb-4 grid-cols-2">

                        <div class="col-span-2 text-center cursor-pointer">
                            <i class="fa-solid fa-star star--rating" id="submit--star--rating1" data-rating-star="1"></i>
                            <i class="fa-solid fa-star star--rating" id="submit--star--rating2" data-rating-star="2"></i>
                            <i class="fa-solid fa-star star--rating" id="submit--star--rating3" data-rating-star="3"></i>
                            <i class="fa-solid fa-star star--rating" id="submit--star--rating4" data-rating-star="4"></i>
                            <i class="fa-solid fa-star star--rating" id="submit--star--rating5" data-rating-star="5"></i>
                        </div>

                        <div class="col-span-2">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="caption_text" id="rating-caption-text" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write message"></textarea>
                        </div>

                        <div class="col-span-2">
                            <label class="block mb-2 text-sm font-medium text-blue-900 dark:text-white" for="small_size">Select photos</label>
                            <input name="photosUpload[]" class="block w-full mb-5 text-xs text-blue-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image-array" type="file" multiple>
                        </div>

                    </div>
                    <button id="submitYourReview" data-user-email="<?php echo $_SESSION['email'] ?>" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 submitYourReview">
                        Add review
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script>

    </script>
    <?php include('user-footer.php'); ?>