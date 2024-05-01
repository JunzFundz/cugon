<!-- search bar modal -->
<div id="search-bar-modal">
    <div class="cancel-btn-nav" onclick="searchItem(); return false;">
        <i class="fa-solid fa-xmark text-white"></i>
    </div>
    <form class="flex items-center max-w-lg mx-auto search-bar-modal-form">
        <label for="voice-search" class="sr-only">Search</label>
        <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                </svg>
            </div>
            <input type="text" id="phone-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required />
        </div>
        <button type="button" class="inline-flex items-center py-2 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
            </svg>Search
        </button>
    </form>
</div>

<!-- Original navigation bar -->
<nav class="bg-white border-gray-200 dark:bg-gray-900 w-full navbar">
    <div class="flexitems-center mx-auto max-w-screen-xl p-4">
        <ul class="nav-top-section flex flexitems-center mx-auto justify-between">
            <li class="">
                <a href="home" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="../images/logo.jpg" class="logo-img" alt="Cugon logo" />
                    <span class="logo-text self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Cugon Bamboo Resort</span>
                </a>
            </li>

            <li class="flex items-center">
                <div class="search-bar items-center flex" id="search-bar">
                    <form class="search-bar-input flex items-center max-w-sm mx-auto">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            </div>
                            <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search item name..." required />
                        </div>
                        <button type="button" class="p-2 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
                <div class="search-results invisible">
                    <!-- Search results will be displayed here -->
                </div>
            </li>

            <li class="flex items-center">
                <!-- Dropdown menu -->
                <?php $user_id = $_SESSION['user_id']; ?>

                <div class="nav-menu flex items-center space-x-6 rtl:space-x-reverse">
                    <div class="flex flex-row svg-buttons lower-nav---" data-user_id="<?php echo $user_id; ?>">
                        <div class="nav----">

                            <a id="cart-nav-btn" href="cart.php?user_id=<?php echo $user_id; ?>" class="cursor-pointer relative inline-flex text-lg items-center p-3 font-medium text-center text-gray-600 rounded-lg focus:outline-none">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <span class="sr-only">Cart</span>
                                <!-- badge -->
                                <div id="cart-badge" class="cart--display invisible absolute inline-flex items-center justify-center w-3 h-3 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full  dark:border-gray-900"></div>
                            </a>

                            <a id="not-nav-btn" data-dropdown-toggle="notification-dropdown" class="cursor-pointer relative inline-flex text-lg items-center p-3 font-medium text-center text-gray-600 rounded-lg focus:outline-none user-notification" data-user_id="<?php echo $user_id; ?>">
                                <i class="fa-solid fa-bell"></i>
                                <span class="sr-only">Notification</span>
                                <div id="notification-badge" class="absolute inline-flex items-center justify-center w-3 h-3 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900"></div>
                            </a>

                            <!-- <button type="button" data-user_id="<?php echo $user_id; ?>" data-dropdown-toggle="notification-dropdown" class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 user-notification">
                                <span class="sr-only">View notifications</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 14 20">
                                    <path d="M12.133 10.632v-1.8A5.406 5.406 0 0 0 7.979 3.57.946.946 0 0 0 8 3.464V1.1a1 1 0 0 0-2 0v2.364a.946.946 0 0 0 .021.106 5.406 5.406 0 0 0-4.154 5.262v1.8C1.867 13.018 0 13.614 0 14.807 0 15.4 0 16 .538 16h12.924C14 16 14 15.4 14 14.807c0-1.193-1.867-1.789-1.867-4.175ZM3.823 17a3.453 3.453 0 0 0 6.354 0H3.823Z" />
                                </svg>
                            </button> -->

                            <a id="map-nav-btn" data-modal-target="map-modal" data-modal-toggle="map-modal" href="#" class="cursor-pointer relative inline-flex text-lg items-center p-3 font-medium text-center text-gray-600 rounded-lg focus:outline-none user-notification" type="a">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </a>

                            <a id="email-nav-btn" data-dropdown-toggle="email-hover" data-dropdown-trigger="hover" class="cursor-pointer text-sm  text-gray-500 dark:text-white hover:underline  font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-800 email-nav-btn" type="a"><?php echo $_SESSION['email']; ?><svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </a>
                        </div>
                        <a id="prof-nav-btn" data-dropdown-toggle="prof-hover" data-dropdown-trigger="hover" class="cursor-pointer z-10 text-sm  text-gray-500 dark:text-white hover:underline  font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-blue-800" type="a">
                            <i class="fa-solid fa-bars hover:text-orange-100 text-base"></i>
                        </a>
                    </div>

                    <div id="email-hover" class="email-hover hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="email-hover">
                            <li>
                                <a href="profile.php?user_id=<?php echo $user_id ?>&&email=<?php echo $_SESSION['email']; ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                            </li>
                            <li>
                                <a href="Transactions.php?userId=<?php echo $user_id; ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bookings</a>
                            </li>
                            <li>
                                <a href="../database/logout.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>

                    <div id="prof-hover" class="hover-nav hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="prof-hover">
                            <li>
                                <a href="profile.php?user_id=<?php echo $user_id ?>&&email=<?php echo $_SESSION['email']; ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile</a>
                            </li>
                            <li>
                                <a href="Transactions.php?userId=<?php echo $user_id; ?>" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Bookings</a>
                            </li>
                            <li>
                                <a href="../database/logout.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign out</a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!-- end of dropdown -->
            </li>
        </ul>
    </div>
</nav>

<!-- lower navbar phone -->
<nav class="bg-gray-100 dark:bg-gray-700 lower-nav-media">
    <div class="max-w-screen-xl px-4 py-1 mx-auto lower-nav---" data-user_id="<?php echo $user_id; ?>">
        <div class="flex items-center">
            <ul class="w-full flex flex-row font-medium mt-0 space-x-2 text-sm float-end items-center justify-between">
                <li>
                    <a id="cart-nav-btn" href="cart.php?user_id=<?php echo $user_id; ?>" class="cursor-pointer relative inline-flex text-lg items-center p-3 font-medium text-center text-gray-600 rounded-lg focus:outline-none">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="sr-only">Cart</span>
                        <div id="cart-badgeii" class="absolute invisible inline-flex items-center justify-center w-3 h-3 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full  dark:border-gray-900"></div>
                    </a>
                </li>

                <li>
                    <a id="not-nav-btn" data-dropdown-toggle="notification-dropdown2" class="cursor-pointer relative inline-flex text-lg items-center p-3 font-medium text-center text-gray-600 rounded-lg focus:outline-none user-notification" data-user_id="<?php echo $user_id; ?>">
                        <i class="fa-solid fa-bell"></i>
                        <span class="sr-only">Notification</span>
                        <div class="absolute inline-flex items-center justify-center w-3 h-3 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -end-2 dark:border-gray-900"></div>
                    </a>
                </li>

                <li>
                    <a id="map-nav-btn" data-modal-target="map-modal" data-modal-toggle="map-modal" href="#" class="cursor-pointer relative inline-flex text-lg items-center p-3 font-medium text-center text-gray-600 rounded-lg focus:outline-none user-notification" type="a">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </a>
                </li>

                <li>
                    <div class="search-barii" id="search-barii">
                        <form class="search-bar-input flex items-center max-w-sm mx-auto">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                </div>
                                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 invisible simple-search-ii" required />
                            </div>
                            <button type="button" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 bn-show-search">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Original lower navbar -->
<nav class="bg-gray-50 dark:bg-gray-700 lower-nav">
    <div class="max-w-screen-xl px-4 py-2 mx-auto">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                <li>
                    <a href="Home.php" class=" text-grey-400 font-semibold dark:text-white hover:underline" aria-current="page">Home</a>
                </li>
                <!-- <li>
                    <a href="Offers.php" class=" text-grey-400 font-semibold dark:text-white hover:underline">Promos/Discount</a>
                </li> -->
                <li>
                    <a href="Items.php" class=" text-grey-400 font-semibold dark:text-white hover:underline">Accomodations & Amenities</a>
                </li>
                <li>
                    <a href="restaurant.php" class=" text-grey-400 font-semibold dark:text-white hover:underline">Restaurant</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Notif modal -->
<div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700" id="notification-dropdown">
    <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        Notifications
    </div>
    <div class="notif-body" style="height: 60vh; overflow: auto">

    </div>
</div>

<div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700" id="notification-dropdown2">
    <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        Notifications
    </div>
    <div class="notif-body" style="height: 60vh; overflow: auto">

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

<script>
    $(document).ready(function() {
        $('#simple-search, #phone-search').on('input', function(event) {
            let searchTerm = $(this).val();

            if (searchTerm === '') {
                $('.search-results').removeClass('invisible').addClass('visible');
                return;
            }

            $.ajax({
                url: '../data/user-load-info.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'search': true,
                    'searchTerm': searchTerm
                },
                success: function(response) {
                    displayItems(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error:", textStatus, errorThrown);
                }
            });
        });

        function displayItems(items) {
            $('.search-results').empty().removeClass('invisible').addClass('visible');

            items.forEach(item => {
                var itemHtml = `
            <div class='search-item'>
                <a href="get-item.php?i_id=${item.i_id}">
                    <h4>${item.i_name}</h4>
                </a>
            </div>
        `;
                $('.search-results').append(itemHtml);
            });
        }
        $(document).on('click', function(event) {
            if (!$(event.target).closest('#simple-search, .search-results').length) {
                $('.search-results').removeClass('visible').addClass('invisible');
            }
        });
    });

    $(document).on('click', '.bn-show-search', function() {
        $('.simple-search-ii').removeClass('invisible').addClass('visible');
    });

    function checkNotification() {
        $.ajax({
            url: '../data/check-items.php',
            type: 'POST',
            data: {
                'notif': true,
                'user_id': userId
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#notification-badge').css('display', 'inline-flex');
                } else {
                    $('#notification-badge').css('display', 'none');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: ", textStatus, errorThrown);
            }
        });
    }

    function checkForNewItems() {
        const userId = $('.lower-nav---').data('user_id');

        $.ajax({
            url: '../data/check-items.php',
            type: 'POST',
            data: {
                'load': true,
                'user_id': userId
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#cart-badge').removeClass('invisible').addClass('visible');
                    $('#cart-badgeii').removeClass('invisible').addClass('visible');
                } else {
                    $('#cart-badge').css('display', 'none');
                    $('#cart-badgeii').css('display', 'none');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error: ", textStatus, errorThrown);
            }
        });
    }

    checkForNewItems();
    setInterval(checkForNewItems, 1000);
</script>