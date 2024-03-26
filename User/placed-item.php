<?php
session_start();
include('user-header.php');
include('../data/user-checkout.php');
?>

<!-- container -->
<div class="placed-item-container">

    <div class="nav">
        <?php include('Navigation.php'); ?>
    </div>

    <!-- address -->
    <div class="address-section rounded">
        <div class="new-address m-5">
            <form id="informationForm" class="" action="../data/user-save-info.php" method="post">
                <div class="grid md:grid-cols-3 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="hidden" name="userid" id="get-userid" value="<?= $users_id ?>" />

                        <input type="text" name="set-name" id="set-name" class=" font-semibold block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                        <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full name</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="set-email" id="set-email" class=" font-semibold block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                        <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" name="set-phone" id="set-phone" class=" font-semibold block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                        <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone</label>
                    </div>
                </div>

                <div class="grid md:grid-cols-3 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="set-city" id="set-city" class=" font-semibold block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">City/Municipality</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="set-brgy" id="set-brgy" class=" font-semibold block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Barangay</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" name="set-zip" id="set-zip" class=" font-semibold block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="set-zip" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Zip</label>
                    </div>
                </div>

                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="set-msg" id="get_msg" class=" font-semibold block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                    <label for="set-msg" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Message</label>
                </div>
                <br>
                <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" value="Save">
            </form>
        </div>
    </div>

    <!-- payments -->
    <div class="payments-section rounded">
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-4 text-xl font-medium text-gray-800 dark:text-gray-800">Booking information</h5>
            <ul role="list" class="space-y-5 my-7">
                <input type="hidden" id="get_user_id" value="<?php echo $users_id ?>">
                <input type="hidden" id="get_preffered_option" value="<?php echo $dateOptions ?>">
                <?php if ($dateOptions == 'stay') { ?>
                    <li class="flex items-center flex-row justify-between">
                        <div class="flex items-center flex-row">
                            <span class="text-xs font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">From : </span>
                        </div>
                        <div class="flex items-center flex-row">
                            <span class="text-xs font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3 get_start_date" data-get_start_date="<?php echo date('M-d-y', strtotime($start)); ?>"><?php echo date('M-d-y', strtotime($start)); ?></span>
                        </div>
                        <div class="flex items-center flex-row">
                            <span class="text-xs font-normal leading-tight text-red-500 dark:text-red-400 ms-3 float-end">to</span>
                        </div>
                        <div class="flex items-center flex-row">
                            <span class="text-xs font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3 get_end_date" data-get_end_date="<?php echo date('M-d-y', strtotime($end)); ?>"><?php echo date('M-d-y', strtotime($end)); ?></span>
                        </div>
                    </li>

                <?php } else { ?>

                    <li class="flex items-center flex-row justify-between">
                        <div class="flex items-center flex-row">
                            <span class="text-xs font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">From : </span>
                        </div>
                        <div class="flex items-center flex-row">
                            <span class="text-xs font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3 get_reg_date" data-get_reg_date="<?php echo date('M-d-y', strtotime($regular_date)); ?>"><?php echo date('M-d-y', strtotime($regular_date)); ?></span>
                        </div>
                    </li>

                <?php } ?>

                <div class=" w-full">
                    <div class="relative ">
                        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs font-medium leading-tight text-black-500 dark:text-gray-400 ms-3">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-xs font-bold leading-tight text-black-500 dark:text-gray-400 ms-3">
                                        Items
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-bold leading-tight text-black-500 dark:text-gray-400 ms-3">
                                        Prices
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-xs font-bold leading-tight text-black-500 dark:text-gray-400 ms-3">
                                        Quantity
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="get_item_name hidden" data-get_item_name="<?php echo $item_name ?>"></th>
                                    <th scope="row" class="text-xs font-medium leading-tight text-black-500 dark:text-gray-400 ms-3 get_item_id" data-get_item_id="<?php echo $item_id ?>">
                                        <?php echo $item_name ?>
                                    </th>
                                    <td class="px-6 py-4 text-xs font-medium leading-tight text-black-500 text-orange-600 ms-3 get_price" data-get_price="<?php echo $price ?>">
                                        <?php echo number_format($price) ?>
                                    </td>
                                    <td class="px-6 py-4 text-xs font-medium leading-tight text-black-500 dark:text-gray-400 ms-3 get_quantity" data-get_quantity="<?php echo $quantity ?>">
                                        x<?php echo $quantity ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <li class="flex items-center flex-row justify-between">
                    <div class="flex items-center flex-row">
                        <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="text-base font-normal leading-tight text-black-500 dark:text-gray-400 ms-3 float-end">Days</span>
                    </div>

                    <div>
                        <span class="text-base font-normal leading-tight text-black-500 dark:text-gray-400 ms-3 float-end">x<?php echo $totaldays ?></span>
                    </div>
                </li>
                <li class="flex items-center flex-row justify-between">
                    <div class="flex items-center flex-row">
                        <svg class="flex-shrink-0 w-4 h-4 text-blue-700 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                        </svg>
                        <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Quantinty</span>
                    </div>
                    <div>
                        <span class="text-base font-normal leading-tight text-black-500 dark:text-gray-400 ms-3 float-end quantity" data-get_quantity="<?php echo $quantity ?>">x<?php echo $quantity ?></span>
                    </div>
                </li>

                <li class="flex items-center flex-row justify-between">
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3">Total</span>
                    <span class=" font-semibold leading-medium text-orange-600 dark:text-gray-400 ms-3 text-3xl total_in_days" data-total_in_days="<?php echo $totalcost ?>">₱ <?php echo $totalcost ?></span>
                </li>

                <?php
                if ($payment == 'Gcash') { ?>
                    <li class="flex items-center flex-row justify-between">
                        <div class="flex items-center flex-row">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8H5m12 0c.6 0 1 .4 1 1v2.6M17 8l-4-4M5 8a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1v-2.6M5 8l4-4 4 4m6 4h-4a2 2 0 1 0 0 4h4c.6 0 1-.4 1-1v-2c0-.6-.4-1-1-1Z" />
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3 get_payment" data-get_payment="<?php echo $payment ?>">Payment</span>
                        </div>

                        <div>
                            <img src="../images/GCash_logo.svg.png" alt="" class=" object-contain w-24">
                        </div>
                    </li>
                <?php } else { ?>
                    <li class="flex items-center flex-row justify-between">
                        <div class="flex items-center flex-row">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8H5m12 0c.6 0 1 .4 1 1v2.6M17 8l-4-4M5 8a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h12c.6 0 1-.4 1-1v-2.6M5 8l4-4 4 4m6 4h-4a2 2 0 1 0 0 4h4c.6 0 1-.4 1-1v-2c0-.6-.4-1-1-1Z" />
                            </svg>
                            <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3 get_payment" data-get_payment="<?php echo $payment ?>">Payment</span>
                        </div>

                        <div>
                            <span>Over the counter</span>
                        </div>
                    </li>
                <?php } ?>
            </ul>

            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">


                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Confirm Request?</h3>
                            <button data-modal-hide="popup-modal" onclick="return submitDetails(this)" type="submit" id="placedSingleBooking" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                            <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                        </div>
                    </div>
                </div>
            </div>

            <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center placedSingleBooking">Placed Booking</button>
        </div>
    </div>

    

    <script>
        $(document).ready(function() {
            $.ajax({
                url: '../data/test.php',
                method: 'POST',
                data: {
                    users_id: <?php echo $_SESSION['user_id']; ?>
                },
                dataType: 'json',
                success: function(response) {
                    $('#set-name').val(response.full_name);
                    $('#set-email').val(response.email);
                    $('#set-phone').val(response.phone);
                    $('#set-city').val(response.city);
                    $('#set-brgy').val(response.brgy);
                    $('#set-zip').val(response.zip_code);
                    $('#set-msg').val(response.message);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        })
    </script>

</div>
<?php include('user-footer.php') ?>