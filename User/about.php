<?php
session_start();
if (strlen($_SESSION['user_id'] == 0)) {
    header('location: ../database/logout.php');
} else {
include('user-header.php');
include('navigation.php');
include('../data/user-checkout.php');
?>
<section class="bg-white dark:bg-gray-900 antialiased">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
        <div class="max-w-2xl mx-auto text-center">
            <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                Our work
            </h2>
            <p class="mt-4 text-base font-normal text-gray-500 sm:text-xl dark:text-gray-400">
                Crafted with skill and care to help our clients grow their business!
            </p>
        </div>

        <div class="grid grid-cols-1 mt-12 text-center sm:mt-16 gap-x-20 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
            <div class="space-y-4">
                <span class="bg-gray-100 text-gray-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                    Alphabet Inc.
                </span>
                <h3 class="text-2xl font-bold leading-tight text-gray-900 dark:text-white">
                    Official website
                </h3>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400">
                    Flowbite helps you connect with friends, family and communities of people who share your interests.
                </p>
                <a href="#" title="" class="text-white bg-primary-700 justify-center hover:bg-primary-800 inline-flex items-center  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" role="button">
                    View case study
                    <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <div class="space-y-4">
                <span class="bg-gray-100 text-gray-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                    Microsoft Corp.
                </span>
                <h3 class="text-2xl font-bold leading-tight text-gray-900 dark:text-white">
                    Management system
                </h3>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400">
                    Flowbite helps you connect with friends, family and communities of people who share your interests.
                </p>
                <a href="#" title="" class="text-white bg-primary-700 justify-center hover:bg-primary-800 inline-flex items-center  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" role="button">
                    View case study
                    <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <div class="space-y-4">
                <span class="bg-gray-100 text-gray-900 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                    Adobe Inc.
                </span>
                <h3 class="text-2xl font-bold leading-tight text-gray-900 dark:text-white">
                    Logo design
                </h3>
                <p class="text-lg font-normal text-gray-500 dark:text-gray-400">
                    Flowbite helps you connect with friends, family and communities of people who share your interests.
                </p>
                <a href="#" title="" class="text-white bg-primary-700 justify-center hover:bg-primary-800 inline-flex items-center  focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" role="button">
                    View case study
                    <svg aria-hidden="true" class="w-5 h-5 ml-2 -mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>
<?php
include('user-footer.php');
include('load-modals.php');
?>
    <?php } ?>