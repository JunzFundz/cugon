<?php
session_start();
include '../data/dTransactions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body class="bg-gray-100">
    <!-- Sidebar -->
    <div class="bg-gray-800 text-gray-100 h-screen w-64 fixed overflow-y-auto">
        <!-- Logo -->
        <div class="p-4 flex items-center justify-center">
            <span class="text-lg font-bold uppercase">Dashboard</span>
        </div>
        <!-- Navigation links -->
        <nav class="text-sm">
            <a href="#" class="block py-2 px-4 text-gray-200 hover:bg-gray-700">Dashboard</a>
            <a href="#" class="block py-2 px-4 text-gray-200 hover:bg-gray-700">Analytics</a>
            <a href="#" class="block py-2 px-4 text-gray-200 hover:bg-gray-700">Reports</a>
        </nav>
    </div>

    <!-- Content -->
    <div class="ml-64 p-10">
        <h1 class="text-2xl font-bold mb-4">Transaction</h1>

        <div class="bg-white p-6 shadow-md rounded-md">

            <!-- Content here -->
            <?php foreach ($result as $row) { ?>

                <form class="max-w-sm inline-block">
                    <input value="<?php echo $row['status']; ?>" type="text" id="disabled-input" aria-label="disabled input" class="mb-5 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>

                    <input value="<?php echo $row['i_name']; ?>" type="text" id="disabled-input-2" aria-label="disabled input 2" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly>
                </form>
                
            <?php } ?>
        </div>

    </div>
</body>

</html>