<?php
require_once('../database/Connection.php');
$db = new Dbh();
$conn = $db->connect();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/output.css">
    <link rel="stylesheet" href="../src/index.css">
    <link rel="stylesheet" href="../src/grids.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cugon</title>
</head>

<style>

</style>
<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");

        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>

<body>

    <div class="loader"></div>

    <!-- Main modal -->
    <div id="select-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Register
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="select-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <p class="text-gray-500 dark:text-gray-400 mb-4">Select option:</p>
                    <ul class="space-y-4 mb-4">
                        <li>
                            <a href="signup.php">
                                <label for="job-1" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Sign up</div>
                                        <div class="w-full text-gray-500 dark:text-gray-400">New Account</div>
                                    </div>
                                    <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </label>
                            </a>
                        </li>
                        <li>
                            <a href="login.php">
                                <label for="job-2" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">
                                    <div class="block">
                                        <div class="w-full text-lg font-semibold">Log in</div>
                                        <div class="w-full text-gray-500 dark:text-gray-400">Existing Account</div>
                                    </div>
                                    <svg class="w-4 h-4 ms-3 rtl:rotate-180 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </label>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="containernewdiv">

        <div class="nav-section">
            <img id="logo-img" src="../images/logo.jpg" alt="">
            <h1 class="ml">+63-9319-158-016</h1>
            <a href="" class="float-right cursor-pointer hover:text-blue-600">About</a>

            <div class="line"></div>

            <div class="section-child">
                <ul>
                    <li><a id="sign-up" href="#">Home</a></li>
                    <li><a id="sign-up" href="gallery.php">Gallery</a></li>
                    <li><a href="signup" id="sign-up">Sign Up</a></li>
                    <li><a id="sign-up" href="login">Log in</a></li>
                </ul>
            </div>
        </div>

        <div class="background-style">
            <div class="body-section">
                <ul>
                    <li>
                        <h1>Cugon Bamboo Resort</h1>
                    </li>
                    <br>
                    <li><button id="button-new" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Explore more</button></li>
                </ul>
            </div>
        </div>

        <div class="featured">
            <section class="bg-white dark:bg-gray-900">
                <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!4v1714480859164!6m8!1m7!1sqHlEhLs5uxeVVUwgwLPPJQ!2m2!1d9.747608601607606!2d123.1513821154136!3f257.84162137466404!4f-7.263684987930745!5f0.7820865974627469" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <div class="mt-4 md:mt-0">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Secluded Sanctuary.</h2>
                        <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400"> Retreat to the Tranquil Ambiance of Cugon Bamboo Resort in the Charming Pangalaykayan, Bindoy.</p>
                        <button data-modal-target="select-modal" data-modal-toggle="select-modal" class="inline-flex items-center text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                            Get started
                            <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </section>

        </div>

        <div class="featured">
            <section class="bg-white dark:bg-gray-900">
                <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
                    <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
                        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Escape to Paradise: Your Oasis Awaits at Cugon Bamboo Resort.</h2>
                        <p class="mb-4">Immerse yourself in the tranquil beauty of Cugon Bamboo Resort, where lush greenery meets luxurious comfort. Located amidst breathtaking natural surroundings, our resort offers a serene escape from the hustle and bustle of everyday life. Experience the perfect blend of relaxation and adventure as you unwind in our eco-friendly bamboo accommodations, indulge in delectable cuisine, and explore the wonders of nature.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <img class="w-full rounded-lg" src="../images/section1.jpg" alt="office content 1">
                        <img class="mt-4 w-full lg:mt-10 rounded-lg" src="../images/sections2.jpg" alt="office content 2">
                    </div>
                </div>
            </section>
        </div>

        <div class="featured">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
                    <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                        <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our Blog</h2>
                        <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Join the Ranks of Satisfied Guests at Cugon Bamboo Resort in Pangalaykayan, Bindoy.</p>
                    </div>
                    <div class="grid gap-8 lg:grid-cols-2">
                        <?php $stmt = $conn->query("SELECT * FROM ratings INNER JOIN users ON ratings.email = users.email LIMIT 2");
                        foreach ($stmt as $row) {
                            $datetime = new DateTime($row['posted_at']);
                            $timezone = new DateTimeZone('Asia/Manila');
                            $datetime->setTimezone($timezone);
                            $formatted_date = $datetime->format('F j, Y g:i a');
                        ?>

                            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <div class="flex justify-between items-center mb-5 text-gray-500">
                                    <span class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                        <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z" clip-rule="evenodd"></path>
                                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                                        </svg>
                                        Article
                                    </span>
                                    <span class="text-sm">
                                        <?php
                                        $now = new DateTime();
                                        $interval = $now->diff($datetime);
                                        if ($interval->d > 0) {
                                            if ($interval->d == 1) {
                                                echo 'Yesterday at ' . $datetime->format('h:i A');
                                            } else {
                                                echo $datetime->format('F j, Y \a\t h:i A');
                                            }
                                        } elseif ($interval->h > 0) {
                                            echo $interval->h . ' hours ago';
                                        } elseif ($interval->i > 0) {
                                            echo $interval->i . ' minutes ago';
                                        } else {
                                            echo 'Just now';
                                        }
                                        ?>
                                    </span>
                                </div>
                                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a href="#"><?= htmlspecialchars($row['username']) ?></a></h2>
                                <p class="mb-5 font-light text-gray-500 dark:text-gray-400"><?= htmlspecialchars($row['caption']) ?></p>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center space-x-4">
                                        <span class="font-medium dark:text-white">
                                            <?= htmlspecialchars($row['email']) ?>
                                        </span>
                                    </div>
                                </div>
                            </article>

                        <?php } ?>
                    </div>
                </div>
            </section>
        </div>

        <div class="footer">
            <footer class="p-4 bg-white md:p-8 lg:p-10 dark:bg-gray-800">
                <div class="mx-auto max-w-screen-xl text-center">
                    <a href="#" class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">
                        <img src="../images/logo.jpg" alt="" style="height: 10vh">
                        Cugon Bamboo Resort
                    </a>
                    <p class="my-6 text-gray-500 dark:text-gray-400">Create unforgettable memories at Cugon Bamboo Resort, where every moment is filled with adventure, relaxation, and pure bliss.</p>
                    <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2021-2022 <a href="#" class="hover:underline">CugonBambooResort</a>. All Rights Reserved.</span>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>