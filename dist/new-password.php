<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- flowbite modules -->
    <link href="../node_modules/flowbite/dist/flowbite.css" rel="stylesheet" />
    <link rel="stylesheet" href="../src/login.css">

    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- ajax cdn -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <div class="opacity-0 invisible" id="alert-box">
        <span class=" text-2xl text-white text-opacity-100" id="alert-text"></span>
    </div>
    <link rel="stylesheet" href="../src/login.css">

    <title>New Password</title>

</head>
<body>

    <div style="display: grid; place-items: center; width: 100%; margin: 10% auto 0 auto">
        <div class=" w-96 block p-6 bg-white border border-gray-200 rounded-lg shadow">
            <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                <form id="change-password-form" method="post" action="../data/login.php">
                    <div class="mb-5">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New password for </label>
                        <p class=" text-base text-gray-600 italic" id="">
                            <?php echo $_GET['email'] ?>
                            <input type="hidden" id="emailc" value="<?php echo $_GET['email'] ?>">
                        </p>
                    </div>
                    <div class="mb-5">
                        <label for="pass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="pass" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div class="mb-5">
                        <label for="cpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                        <input type="password" id="cpassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Confirm</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <script src="../assets/signup.js"></script>
</body>

</html>