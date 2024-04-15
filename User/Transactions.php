<?php
session_start();

include('user-header.php');
require('../data/user-show-transactions.php');
?>

</head>

<body class="bg-gray-100">

    <div class="container-trans">
        <!-- Content -->
        <div class="trans-content">
            <br><br><br>
            <h1 class="text-2xl font-bold mb-4">Transaction</h1>
            <div class="bg-white p-6 shadow-md rounded-md">

                <div class="flex flex-row">
                    <span class=" font-semibold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Transactions</span>
                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover" class=" text-zinc-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center " type="button">Options<svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 w-auto">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                            <li>
                                <a href="home" class=" px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white flex">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4" />
                                    </svg>
                                    &nbsp;&nbsp;Back to home</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <br><br>

                <div class="tran-table-content relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
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
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($completed !== null) { // Check if $completed is not null
                                foreach ($completed as $row) { ?>
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
                                            <?php
                                            if ($row['reg_date'] === '0000-00-00' || $row['reg_date'] == '') {
                                                print date_format(date_create($row['start']), 'M d') . '-' . date_format(date_create($row['end']), 'd Y');
                                            } else {
                                                print date_format(date_create($row['reg_date']), 'M d, Y');
                                            } 
                                            ?>
                                        </td>

                                        <td class="px-6 py-4">
                                            <?= number_format($row['i_price']); ?>
                                        </td>
                                        <td class="px-6 py-4">
                                            <?= $row['status']; ?>
                                        </td>
                                        <td class="px-6 py-4 text-center">

                                            <div id="tooltip-light" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                Cancel request?
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>

                                            <button data-tooltip-target="tooltip-light" data-tooltip-style="light" onclick="cancelBook('<?php echo $row['res_id']; ?>')" type="button" class="button--back">
                                                <svg style="color:rgb(49, 217, 37);" class="cancel w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4" />
                                                </svg>
                                            </button>

                                            <button onclick="cancelBook('<?php echo $row['res_id']; ?>')" <?php if ($row['status'] === 'Pending') echo 'disabled style="cursor: not-allowed; opacity: 30%;"'; ?> type="button" class="button--back">
                                                <svg class="receipt w-6 h-6 text-blue-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-6 4h6m-6 4h6M6 3v18l2-2 2 2 2-2 2 2 2-2 2 2V3l-2 2-2-2-2 2-2-2-2 2-2-2Z" />
                                                </svg>
                                            </button>

                                        </td>
                                    </tr>
                            <?php }
                            } else {
                                echo "<tr><td colspan='7'>No transactions exist.</td></tr><br>";
                            }
                            ?>
                        <tbody>
                    </table>
                </div>
                <br><br>

                <span class=" font-semibold block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Past transactions</span>
                <br>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg border-slate-500">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
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
                                <th scope="col" class="px-6 py-3 text-center">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <div>
                            <tbody>
                                <?php
                                if ($alltran !== null) { // Check if $result is not null
                                    foreach ($alltran as $row) { ?>
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
                                                <?= number_format($row['i_price']); ?>
                                            </td>
                                            <td class="px-6 py-4">
                                                <?= $row['status']; ?>
                                            </td>
                                            <td class="px-6 py-4 text-center">

                                                <button onclick="cancelBook('<?php echo $row['res_id']; ?>')" <?php if ($row['status'] === 'Approved' || $row['status'] === 'Cancelled' || $row['status'] === 'Declined') echo 'disabled style="cursor: not-allowed; opacity: 30%;"'; ?> type="button" class="button--back">
                                                    <svg style="color:rgb(49, 217, 37);" class="cancel w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4" />
                                                    </svg>
                                                </button>

                                                <button data-res-id="<?php echo $row['res_id']; ?>" data-user-id="<?php echo $row['user_id']; ?>" type="button" class="button--back">
                                                    <svg class="receipt w-6 h-6 text-blue-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-6 4h6m-6 4h6M6 3v18l2-2 2 2 2-2 2 2 2-2 2 2V3l-2 2-2-2-2 2-2-2-2 2-2-2Z" />
                                                    </svg>
                                                </button>

                                                <button data-res-id="<?php echo $row['res_id']; ?>" data-user-id="<?php echo $row['user_id']; ?>" type="button" class="button--back">
                                                    <svg class="archive w-6 h-6 text-orange-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Z" />
                                                    </svg>
                                                </button>

                                            </td>
                                        </tr>
                                <?php }
                                } else {
                                    echo "<tr><td colspan='7'>No Data Found.</td></tr>";
                                }
                                ?>
                            <tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    <br>
    <br>

    <?php include('user-footer.php'); ?>