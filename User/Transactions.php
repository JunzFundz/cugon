<?php
session_start();
if (strlen($_SESSION['user_id'] == 0)) {
    header('location: ../database/logout.php');
} else {
    include('user-header.php');
    require('../data/user-show-transactions.php');
?>

<title>Bookings</title>

    <body class="bg-gray-100">
        <div class="container-trans">
            <!-- Content -->
            <div class="trans-content">

                <section class=" py-20 w-full" id="transaction--body">
                    <div class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700">

                        <!-- component -->
                        <nav class="text-sm sm:text-base bg-white p-4 md:p-6 lg:p-6 rounded-md">
                            <ol class="list-none p-0 inline-flex space-x-2">
                                <li class="flex items-center">
                                    <svg onclick="window.location.href='items.php';" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512" class="cursor-pointer hover:fill-blue-500 transition-colors duration-300" fill="#4b5563">
                                        <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                                    </svg> <span class="mx-2 font-semibold">Home</span>
                                </li>
                            </ol>
                        </nav>

                        <div class="relative bg-clip-border mt-4 mx-4 overflow-hidden bg-white text-gray-700 rounded-none flex gap-2 flex-col md:flex-row items-start !justify-between">
                            <div class="w-full mb-2">
                                <p class="block antialiased font-sans text-base font-light leading-relaxed text-blue-gray-900">
                                    Booking History
                                </p>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col gap-4 ">
                            <?php foreach ($alltran as $row) { ?>

                                <div class="relative flex flex-col bg-clip-border bg-white text-gray-700 rounded-lg border border-gray-300 p-4" style="position: sticky; top: 0px">
                                    <div class="mb-4 flex items-start justify-between">
                                        <div class="flex items-center gap-3">
                                            <div class="border border-gray-200 p-2.5 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="h-6 w-6 text-gray-900">
                                                    <path fill-rule="evenodd" d="M7.5 5.25a3 3 0 013-3h3a3 3 0 013 3v.205c.933.085 1.857.197 2.774.334 1.454.218 2.476 1.483 2.476 2.917v3.033c0 1.211-.734 2.352-1.936 2.752A24.726 24.726 0 0112 15.75c-2.73 0-5.357-.442-7.814-1.259-1.202-.4-1.936-1.541-1.936-2.752V8.706c0-1.434 1.022-2.7 2.476-2.917A48.814 48.814 0 017.5 5.455V5.25zm7.5 0v.09a49.488 49.488 0 00-6 0v-.09a1.5 1.5 0 011.5-1.5h3a1.5 1.5 0 011.5 1.5zm-3 8.25a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd"></path>
                                                    <path d="M3 18.4v-2.796a4.3 4.3 0 00.713.31A26.226 26.226 0 0012 17.25c2.892 0 5.68-.468 8.287-1.335.252-.084.49-.189.713-.311V18.4c0 1.452-1.047 2.728-2.523 2.923-2.12.282-4.282.427-6.477.427a49.19 49.19 0 01-6.477-.427C4.047 21.128 3 19.852 3 18.4z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="block antialiased font-sans text-sm  leading-normal text-blue-gray-900 mb-1 font-bold">
                                                    Host
                                                </p>
                                                <p class="block antialiased font-sans leading-relaxed text-inherit !text-gray-600 text-xs font-normal">
                                                    Cugon Resort
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex items-center justify-between">

                                            <button data-modal-target="cancel-book" data-modal-toggle="cancel-book" data-res_id="<?php echo $row['res_id']; ?>" <?php if ($row['status'] === 'Approved' || $row['status'] === 'Cancelled' || $row['status'] === 'Declined') echo 'disabled style="cursor: not-allowed; opacity: 30%;"'; ?> type="button" class="button--back cancel-book">
                                                <svg style="color:rgb(49, 217, 37);" class="cancel w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4" />
                                                </svg>
                                            </button>

                                            <button data-res_id="<?php echo $row['res_id']; ?>" data-user_id="<?php echo $row['user_id']; ?>" data-res_number="<?php echo $row['res_number']; ?>" type="button" class="button--back show-receipt-modal" data-modal-target="receipt-modal-show" data-modal-toggle="receipt-modal-show">
                                                <svg class="receipt w-6 h-6 text-blue-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-6 4h6m-6 4h6M6 3v18l2-2 2 2 2-2 2 2 2-2 2 2V3l-2 2-2-2-2 2-2-2-2 2-2-2Z" />
                                                </svg>
                                            </button>

                                            <!-- <button data-res-id="<?php echo $row['res_id']; ?>" data-user-id="<?php echo $row['user_id']; ?>" type="button" class="button--show--- button--back">
                                                <svg class="archive w-6 h-6 text-orange-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M10 12v1h4v-1m4 7H6a1 1 0 0 1-1-1V9h14v9a1 1 0 0 1-1 1ZM4 5h16c.6 0 1 .4 1 1v2c0 .6-.4 1-1 1H4a1 1 0 0 1-1-1V6c0-.6.4-1 1-1Z" />
                                                </svg>
                                            </button> -->

                                            <?php if ($row['status'] == 'EXPIRED') { ?>

                                                <button data-user_id="<?php echo $_SESSION['user_id'] ?>" data-item_id="<?php echo $row['i_id'] ?>" data-res_id="<?php echo $row['res_id'] ?>" data-modal-target="rate-item-modal" data-modal-toggle="rate-item-modal" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 item--rating--btn" id="">Rate now</button>

                                            <?php } else { ?>

                                                <a href="get-item.php?i_id=<?= $row['i_id'] ?>" type="button" class="text-gray-900 bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 item--rating--btn" id="">Avail</a>

                                            <?php } ?>
                                        </div>
                                    </div>

                                    <!-- <div class="flex justify-center m-5">
                                        <button id="deleteButton" data-modal-target="cancel-book" data-modal-toggle="cancel-book" class="block text-white bg-blue-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800" type="button">
                                            Show delete confirmation
                                        </button>
                                    </div>ol -->

                                    <div>
                                        <div>
                                            <div class="flex gap-1">
                                                <p class="block antialiased font-sans leading-relaxed text-inherit mb-1 text-xs !font-medium !text-gray-600">
                                                    Item<!-- -->: <?= $row['i_name']; ?>
                                                </p>
                                            </div>
                                            <div class="flex gap-1">
                                                <p class="block antialiased font-sans leading-relaxed text-inherit mb-1 text-xs !font-medium !text-gray-600">
                                                    Price<!-- -->: <?= $row['i_price']; ?>
                                                </p>
                                            </div>
                                            <div class="flex gap-1">
                                                <p class="block antialiased font-sans leading-relaxed text-inherit mb-1 text-xs !font-medium !text-gray-600">
                                                    Quantity<!-- -->: <?= $row['quantity']; ?>
                                                </p>
                                            </div>
                                            <div class="flex gap-1">
                                                <p class="block antialiased font-sans leading-relaxed text-inherit mb-1 text-xs !font-medium !text-gray-600">
                                                    Reservation Number: <?= $row['res_number']; ?>
                                                </p>
                                            </div>
                                            <div class="flex gap-1">
                                                <p class="block antialiased font-sans leading-relaxed text-inherit mb-1 text-xs !font-medium !text-gray-600">
                                                    Status: <?= $row['status']; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            } ?>
                        </div>
                    </div>
                </section>
            </div>

        </div>
        <br>
        <br>
        <script>
            $(document).ready(function() {
                $('.item--rating--btn').on('click', function() {
                    const res_id = $(this).data('res_id');
                    const user_id = $(this).data('user_id');
                    const item_id = $(this).data('item_id');

                    $.ajax({
                        url: '../data/item-rating.php',
                        type: 'post',
                        data: {
                            'data': true,
                            'user_id': user_id,
                            'res_id': res_id,
                            'item_id': item_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#user_id').val(response.user_id);
                                $('#res_id').val(response.res_id);
                                $('#item_id').val(response.item_id);
                            } else {
                                console.error("Error retrieving user_id");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error: ", status, error);
                        }
                    });
                });

                $('.cancel-book').on('click', function() {
                    const res_id = $(this).data('res_id');
                    $.ajax({
                        url: '../data/handle-booking.php',
                        type: 'post',
                        data: {
                            'view-cancel': true,
                            'res_id': res_id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.success) {
                                $('#res_id').val(response.res_id);
                            } else {
                                $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                                $('#alert-text').html("Information saved");

                                setTimeout(function() {
                                    $('#alert-box').removeClass('visible').addClass('invisible');
                                    location.reload();
                                }, 1500);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error: ", status, error);
                        }
                    });
                });
            });
        </script>

        <?php include('user-footer.php'); ?>
    <?php } ?>