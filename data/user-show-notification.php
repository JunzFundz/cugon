<?php


require('../class/Users.php');

if (isset($_POST['show-notification'])) {
    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);

    $notif = new Users();
    $result = $notif->userNotification($user_id);

    if ($result && $result->num_rows > 0) {
        while ($rows = $result->fetch_assoc()) { ?>

            <!-- <ol class="relative border-s border-gray-200 dark:border-gray-700 overflow-scroll">
                <li class="mb-10 ms-4">
                    <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                    <time class="mb-1 font-normal leading-none text-gray-400 dark:text-gray-500">From: Cugon Bamboo Resort</time>
                    <h3 class="font-semibold text-gray-900 dark:text-white">Hi! <?= $rows['email'] ?></h3>
                    <p class=" font-normal text-gray-500 dark:text-gray-400">Updates : <?= $rows['updates'] ?></p>
                    <?php
                    if (!empty($rows['message'])) {
                        echo "<p class='mb-4 font-normal text-red-500 dark:text-gray-400'>Message: {$rows['message']}</p>";
                    } else {
                        echo "<p class='mb-4 font-normal text-gray-500 dark:text-gray-400'>No message available</p>";
                    }
                    ?>
                    <a href="Transactions.php?userId=<?php echo $user_id; ?>" class="inline-flex items-center px-4 py-2 font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">View <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg></a>
                </li>
            </ol> -->

            <a href="Transactions.php?userId=<?php echo $user_id; ?>" class="flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600">
                <div class="flex-shrink-0">
                    <img class="w-11 h-11 rounded-full" src="../images/logo.jpg" alt="Bonnie Green avatar">
                    <div class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 rounded-full border border-white bg-primary-700 dark:border-gray-700">
                        <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M15.977.783A1 1 0 0 0 15 0H3a1 1 0 0 0-.977.783L.2 9h4.239a2.99 2.99 0 0 1 2.742 1.8 1.977 1.977 0 0 0 3.638 0A2.99 2.99 0 0 1 13.561 9H17.8L15.977.783ZM6 2h6a1 1 0 1 1 0 2H6a1 1 0 0 1 0-2Zm7 5H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Z" />
                            <path d="M1 18h16a1 1 0 0 0 1-1v-6h-4.439a.99.99 0 0 0-.908.6 3.978 3.978 0 0 1-7.306 0 .99.99 0 0 0-.908-.6H0v6a1 1 0 0 0 1 1Z" />
                        </svg>
                    </div>
                </div>
                <div class="pl-3 w-full">
                    <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">New message to <span class="font-semibold text-gray-900 dark:text-white"><?= $rows['email'] ?></span>: "<?= $rows['updates'] ?>"</div>
                    <div class="text-xs font-medium text-primary-700 dark:text-primary-400"><?= $rows['date_posted'] ?></div>
                </div>
            </a>
<?php }
    } else {
        echo "No notification at the moment";
    }
}
