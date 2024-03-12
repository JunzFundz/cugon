<?php


require('../class/Transactions.php');

if (isset($_POST['show-notification'])) {
    $user_id = $_POST['user_id'];

    $notif = new Transactions();
    $result = $notif->userNotification($user_id);

    if ($result && $result->num_rows > 0) {

        while ($rows = $result->fetch_assoc()) { ?>



            <ol class="relative border-s border-gray-200 dark:border-gray-700 overflow-scroll">
                <li class="mb-10 ms-4">
                    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                    <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">From: Cugon Bamboo Resort</time>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Hi! <?= $rows['res_number'] ?></h3>
                    <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Get access to over 20+ pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce & Marketing pages.</p>
                    <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Learn more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg></a>
                </li>
            </ol>

<?php }
    }else{
        echo "No notification at the moment";
    }
}
