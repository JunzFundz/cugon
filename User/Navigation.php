<nav class="bg-white border-gray-200 dark:bg-gray-900 w-full navbar">
    <div class="flexitems-center mx-auto max-w-screen-xl p-4 ">
        <ul class="flex flexitems-center mx-auto justify-between">

            <li class="">
                <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="../images/logo.jpg" class="logo-img" alt="Cugon logo" />
                    <span class="logo-text self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Cugon Bamboo Resort</span>
                </a>
            </li>
            <li class="flex items-center">
                <div class="search-bar">
                    <form class="search-bar-input flex items-center max-w-sm mx-auto">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search item name..." required />
                        </div>
                        <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
            </li>

            <li class="flex items-center">
                <!-- Dropdown menu -->
                <?php $user_id = $_SESSION['user_id']; ?>

                <div class="nav-menu flex items-center space-x-6 rtl:space-x-reverse">
                    <div class="flex flex-row svg-buttons">

                        <a id="cart-nav-btn" href="cart.php?user_id=<?php echo $user_id; ?>" class="cursor-pointer text-lg text-gray-600 dark:text-white hover:underline  font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-800" type="a"><i class="fa-solid fa-cart-shopping"></i>
                        </a>

                        <a id="not-nav-btn" data-modal-target="notif-modal" data-modal-toggle="notif-modal" href="#" class=" cursor-pointer text-lg  text-gray-600 dark:text-white hover:underline font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-800 user-notification" data-user_id="<?php echo $user_id; ?>" type="a">
                        <i class="fa-solid fa-bell"></i>
                        </a>

                        <a id="map-nav-btn" data-modal-target="map-modal" data-modal-toggle="map-modal" href="#" class=" cursor-pointer text-lg  text-gray-500 dark:text-white hover:underline  font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-800 user-notification" type="a">
                        <i class="fa-solid fa-map-location-dot"></i>
                        </a>

                        <a id="email-nav-btn" data-dropdown-toggle="email-hover" data-dropdown-trigger="hover" class="cursor-pointer text-sm  text-gray-500 dark:text-white hover:underline  font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-800" type="a"><?php echo $_SESSION['email']; ?><svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </a>
                        <a id="prof-nav-btn" data-dropdown-toggle="prof-hover" data-dropdown-trigger="hover" class="cursor-pointer z-10 text-sm  text-gray-500 dark:text-white hover:underline  font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-800" type="a">
                        <i class="fa-solid fa-bars hover:text-orange-100 text-base"></i>
                        </a>
                    </div>

                    <div id="prof-hover" class="hover-nav hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="prof-hover">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                            </li>
                            <li>
                                <a href="Transactions.php?userId=<?php echo $user_id; ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Transactions</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="../database/logout.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>

                    <div id="email-hover" class="hover-nav hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="email-hover">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                            </li>
                            <li>
                                <a href="Transactions.php?userId=<?php echo $user_id; ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Transactions</a>
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
            </li>

        </ul>
    </div>
</nav>

<nav class="bg-gray-50 dark:bg-gray-700 lower-nav">
    <div class="max-w-screen-xl px-4 py-3 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                <li>
                    <a href="Home.php" class="text-gray-900 dark:text-white hover:underline" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="Offers.php" class="text-gray-900 dark:text-white hover:underline">Promos/Discount</a>
                </li>
                <li>
                    <a href="Items.php" class="text-gray-900 dark:text-white hover:underline">Accomodations & Amenities</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<!-- Notif modal -->
<div id="notif-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full notif-modal">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Notifications
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="notif-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 notif-modal-body">

            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            </div>
        </div>
    </div>
</div>




<!-- map modal -->
<div id="map-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Map
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="map-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum reprehenderit consequuntur soluta,
                </p>

                <div class=" overflow-hidden">
                    <iframe class="" src="https://www.google.com/maps/embed?pb=!4v1709991078496!6m8!1m7!1sqHlEhLs5uxeVVUwgwLPPJQ!2m2!1d9.747608601607606!2d123.1513821154136!3f272.6453949239038!4f-3.792536737136089!5f0.7820865974627469" width="550" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <p class="">
                    <a target=”_blank” class=" text-xs hover:underline italic text-blue-700 dark:text-blue-700" href="https://maps.app.goo.gl/xRiqiD9htXgvFVXG6">https://maps.app.goo.gl/xRiqiD9htXgvFVXG6</a>
                </p>
            </div>
            <!-- Modal footer -->
        </div>
    </div>
</div>