<?php
session_start();

include('user-header.php');
require('../data/all-transactions.php');
?>

</head>

<body class="bg-gray-100">

    <div class="container-trans">

        <!-- Sidebar -->
        <div class="trans-sidebar">
            <div class="bg-gray-800 text-gray-100 h-screen w-64 fixed z-50 overflow-y-auto">
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
        </div>

        <!-- Content -->
        <div class="trans-content">
            <div class="ml-64 p-10">
                <h1 class="text-2xl font-bold mb-4">Transaction</h1>

                <div class="bg-white p-6 shadow-md rounded-md">

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <caption class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                Our products
                                <p class="mt-1 text-sm font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, pariatur quibusdam consectetur aspernatur modi maiores fugit temporibus mollitia sunt magnam illo corporis ullam blanditiis aliquid, error porro explicabo voluptate sed!.</p>
                            </caption>
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Product name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quantity
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Days
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only"></span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $row) { ?>
                                    <tr class="dark:bg-gray-800 dark:border-gray-700">
                                        <td class="px-6 py-4">
                                            <?= $row['i_name']; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $row['quantity']; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $row['i_type']; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $row['start']; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $row['total']; ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $row['status']; ?>
                                        </td>
                                        <td class="px-6 py-4 text-right">

                                            <button 
                                            onclick="cancelBook('<?php echo $row['res_id']; ?>')" 
                                            <?php if ($row['status'] === 'Cancelled') 
                                            echo 'disabled'; ?> 
                                            <?php if ($row['status'] === 'Approved') 
                                            echo 'disabled'; ?> 
                                            type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Cancel</button>
                                        </td>
                                    </tr>
                            </tbody>
                        <?php } ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <?php include('user-footer.php'); ?>