<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
        <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="../logo.jpg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Welcome to Cugon Bamboo Resort</span>
        </a>
    
        <!-- Dropdown menu -->
        <?php $user_id = $_SESSION['user_id']; ?>

        <div class="flex items-center space-x-6 rtl:space-x-reverse">
            <a id="dropdownHove" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class=" cursor-pointer text-sm  text-gray-500 dark:text-white hover:underline  font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-800" type="a"><?php echo $_SESSION['email']; ?><svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </a>
            <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHover">
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                    </li>
                    <li>
                        <a href="Transactions.php?user_id=<?php echo $user_id; ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Transactions</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="../database/Logout.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                    </li>
                </ul>
            </div>
        </div>
        
        <!-- end of dropdown -->


    </div>
</nav>

<nav class="bg-gray-50 dark:bg-gray-700">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                <li>
                    <a href="Home.php" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="Offers.php" class="text-gray-900 dark:text-white hover:underline">Offers</a>
                </li>
                <li>
                    <a href="BookingForm.php" class="text-gray-900 dark:text-white hover:underline">Regular Booking</a>
                </li>
                <li>
                    <a href="Home.php" class="text-gray-900 dark:text-white hover:underline">Rooms</a>
                </li>
                <li>
                    <a href="Cottages.php" class="text-gray-900 dark:text-white hover:underline">Cottages</a>
                </li>
            </ul>
        </div>
    </div>
</nav>