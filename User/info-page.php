<?php
session_start();
if (strlen($_SESSION['user_id'] == 0)) {
    header('location: ../database/logout.php');
} else {
    include('user-header.php');
    include('navigation.php');
    include('../data/user-load-info.php');
?>
<title>Personal information</title>
    <header class="antialiased">
        <nav class=" px-4 lg:px-8 py-8">
            <div class="flex flex-wrap justify-center items-center">
                <div class="flex items-center text-center lg:order-2">
                    <!-- Apps -->
                    <button type="button" data-dropdown-toggle="apps-dropdown" class="p-4 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                        <span class="sr-only">View notifications</span>
                        <!-- Icon -->
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                            <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600" id="apps-dropdown">
                        <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            Apps
                        </div>
                        <div class="grid grid-cols-3 gap-4 p-4">
                            <a href="info-page.php?user_id=<?php echo $user_id ?>&&email=<?php echo $_SESSION['email']; ?>" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                                <div class="text-sm font-medium text-gray-900 dark:text-white">Information</div>
                            </a>
                            <a href="items.php?userId=<?php echo $user_id; ?>" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                    <path d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z" />
                                </svg>
                                <div class="text-sm font-medium text-gray-900 dark:text-white">Products</div>
                            </a>
                            <a href="transactions.php?userId=<?php echo $user_id; ?>" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                                <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                    <path d="M7 11H5v1h2v-1Zm4 3H9v1h2v-1Zm-4 0H5v1h2v-1ZM5 5V.13a2.98 2.98 0 0 0-1.293.749L.88 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                    <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM13 16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v6Zm-1-8H9a1 1 0 0 1 0-2h3a1 1 0 1 1 0 2Zm0-3H9a1 1 0 0 1 0-2h3a1 1 0 1 1 0 2Z" />
                                    <path d="M11 11H9v1h2v-1Z" />
                                </svg>
                                <div class="text-sm font-medium text-gray-900 dark:text-white">Receipts</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="antialiased  dark:bg-gray-900">
        <main class="p-4 md:ml-64 h-auto" style="gap:4rem">
            <div class=" h-auto ">
                <section class="">
                    <div class="bg-white py-8 px-4 mx-auto max-w-2xl lg:py-16 border-2 border-gray-400">
                        <a href="#" class="change--info hover:underline text-blue-600" style="float:right;">Edit</a>
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Information</h2>
                        <form id="change--info--form" class="" action="../data/user-save-info.php" method="post">
                            <input type="hidden" id="uid" value="<?php echo $_SESSION['user_id'] ?>">
                            <div class="grid gap-4 sm:grid-cols-3 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                    <input type="text" name="name" id="set-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                    <input type="text" name="brand" id="set-email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                    <input type="text" name="" id="set-phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                                    <input type="text" name="brand" id="set-user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">City</label>
                                    <input type="text" name="" id="set-city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Baranggay</label>
                                    <input type="text" name="" id="set-brgy" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Zip</label>
                                    <input type="text" name="" id="set-zip" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                            </div>
                            <div class="flex flex-row info--">
                                <button type="submit" name="update--" class="update-- inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Save
                                </button>
                                <button type="button" class="cancelauth-- inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-gray-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>

            <div class=" h-auto" style=" margin-top: 10px">
                <section class="">
                    <div class="bg-white py-8 px-4 mx-auto max-w-2xl lg:py-16 border-2 border-gray-400">
                        <a href="#" class="change-- hover:underline text-blue-600" style="float:right;">Edit</a>
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Auth </h2>
                        <form id="change--pass--form" class="" action="../data/user-save-info.php" method="post">
                            <input type="hidden" id="uid" value="<?php echo $_SESSION['user_id'] ?>">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Old Password</label>
                                    <input type="text" name="old_pass" id="old_pass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New Password</label>
                                    <input type="text" name="new_pass" id="new_pass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="w-full">
                                    <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Re-type New Password</label>
                                    <input type="text" name="re_pass" id="re_pass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                            </div>
                            <div class="flex flex-row auth--">
                                <button type="submit" name="save--auth" class="save-- inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Save
                                </button>
                                <button type="button" class="cancel-- inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-gray-600 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    </div>


    <script>
        $('.auth--').css('display', 'none');
        $('.info--').css('display', 'none');

        $(document).on('click', '.change--', function(e) {
            e.preventDefault();
            $(this).fadeOut(300, function() {
                $('.auth--').fadeIn(300);
            });
        });

        $(document).on('click', '.cancel--', function(e) {
            e.preventDefault();
            $(this).fadeOut(100, function() {
                $('.auth--').fadeOut(300);
            });
        });

        $(document).on('click', '.cancelauth-- ', function(e) {
            e.preventDefault();
            $(this).fadeOut(100, function() {
                $('.info--').fadeOut(300);
            });
        });

        $(document).on('click', '.change--info', function(e) {
            e.preventDefault();
            $(this).fadeOut(300, function() {
                $('.info--').fadeIn(300);
            });
        });

        $(document).ready(function() {
            $.ajax({
                url: '../data/test.php',
                method: 'POST',
                data: {
                    users_id: <?php echo $_SESSION['user_id']; ?>
                },
                dataType: 'json',
                success: function(response) {
                    $('#uid').val(response.user_id);
                    $('#set-name').val(response.full_name);
                    $('#set-email').val(response.email);
                    $('#set-phone').val(response.phone);
                    $('#set-city').val(response.city);
                    $('#set-brgy').val(response.brgy);
                    $('#set-zip').val(response.zip_code);
                    $('#set-msg').val(response.message);
                    $('#set-user').val(response.username);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        })
    </script>
<?php
    include('user-footer.php');
} ?>