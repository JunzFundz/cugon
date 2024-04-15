<?php
session_start();
include('user-header.php');
include('Navigation.php');
include('../data/user-view-cart.php');
?>

<!-- content -->
<title>Cart</title>

<div class="cart-container">

    <div class="cart-items-section">
        <?php foreach ($result as $row) {
            $quantity = $row['item_quantity'];
            $price = $row['i_price'];
            $totalInitial = $price * $quantity;
        ?>
            <div class="cart-items">
                <ul class="custom-ul">
                    <li>
                        <form id="checkoutForm" onsubmit="return onSubmission(this)" method="post" action="marked-items-checkout.php?users_id=<?php echo $_SESSION['user_id']; ?>">

                            <input id="default-checkbox" name="item_checkboxes[]" type="checkbox" class="item-checkbox w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="<?= $row['item_id']; ?>" data-initial="<?= $totalInitial ?>" data-item-id="<?= $row['item_id']; ?>" data-user_id="<?= $row['user_id']; ?>" data-s_price="<?= $row['i_price']; ?>">

                            <input type="hidden" name="item_ids[]" value="<?= $row['item_id']; ?>">
                            <input type="hidden" name="user_ids[]" value="<?= $row['user_id']; ?>">
                            <input type="hidden" name="prices[]" value="<?= $row['i_price']; ?>">
                            <input type="hidden" name="quantities[]" value="<?= $row['item_quantity']; ?>">
                            <input type="hidden" name="names[]" value="<?= $row['i_name']; ?>">
                    </li>

                    <li>
                        <img src="../Admin/Items/<?= $row['i_img'] ?>" alt="" height="20px" width="100px" style=" object-fit: contain; aspect-ratio: 3/2;">
                    </li>

                    <li style="align-items: center; text-align: left">
                        <span class="font-semibold"><?= $row['i_name'] ?></span><br>
                        <span class="text-green-600 text-xs">Available: <?= $row['i_quantity'] ?></span>
                    </li>

                    <li style="align-items: center; text-align: center">
                        <span class=" text-red-600 font-semibold">Price: <?= number_format($row['i_price']) ?></span>
                    </li>

                    <li style="align-items: center; text-align: center">
                        <span class=" text-orange-600 text-m font-semibold cursor-pointer delete--item" data-item--id="<?= $row['i_id'] ?>" data-user--id="<?= $row['user_id'] ?>">Delete</span>
                    </li>

                    <li>
                        <div class="custom-quantity-btn relative flex items-center max-w-[8rem]">
                            <button type="button" id="decrement-button" data-item-id="<?= $row['item_id']; ?>" data-user-id="<?= $row['user_id']; ?>" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300  focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none decrement-btn">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>

                            <input type="text" id="quantity-input" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 input-quantity" placeholder="999" name="item-value" value="<?= $row['item_quantity'] ?>" required disabled />

                            <button type="button" id="increment-button" data-item-id="<?= $row['item_id']; ?>" data-user-id="<?= $row['user_id']; ?>" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300  focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none increment-btn text-center">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>
                    </li>
                </ul>
            </div>

        <?php } ?>
    </div>

    <div class="checkout-section">

        <div class="total-payment">
            <ul class="ul-cart m-4 h-auto">
                <li style="margin-bottom: 2rem ;">
                    <span class=" bg-blue-200 p-3 text-slate-800 font-semibold" style="border-left: 6px solid blue; padding-left: 5px; padding-right: 10%">Items Summary</span>
                </li>
                <li style="display: flex; flex-direction: row; justify-content: space-between; margin-bottom: 2rem ;">
                    <span class="font-semibold">Total Items : </span>
                    <p id="total-items" class="text-red-600 font-medium">0</p>
                </li>
                <li style="display: flex; flex-direction: row; justify-content: space-between; margin-bottom: 2rem ;">
                    <span class="font-semibold">Subtotal : </span>
                    <p id="total-items-pay" class="text-red-600 font-medium">0</p>
                </li>
                <li id="dateOptionChange">
                    <!-- onchange -->
                    <label for="options" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Select type of booking</label>
                    <select id="options" name="dateOptions" onchange="changeInputs()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                        <option value="reg">Regular</option>
                        <option value="stay">Stay</option>
                    </select>
                </li>
                <li>
                    <!-- single date -->
                    <div class="relative max-w-sm" id="singleDate">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-blue-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input name="regular_date" id="singleDateInput" datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg  block w-full ps-10 p-2  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white " placeholder="Select date">
                    </div>

                    <!-- two dates picker -->
                    <div date-rangepicker class="flex items-center " id="twoDates">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-blue-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>

                            <!-- start date -->
                            <input id="startDate" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select start">
                        </div>
                        <span class="mx-4 text-orange-600">to</span>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-blue-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>

                            <!-- end date -->
                            <input id="endDate" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select end">
                        </div>
                    </div>
                </li>
                <li>
                    <!-- payment -->
                    <label for="" id="paymentlabel" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Select an payment</label>
                    <select id="payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="payment">
                        <option selected value="counter">Over the counter</option>
                        <option value="Gcash">Gcash</option>
                    </select>
                </li>
                <li style="display: flex; flex-direction: row; justify-content: space-between; margin-bottom: 0.3rem ;">

                    <input type="submit" id="checkoutButton" class="pay-button checkoutButton w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="checkoutData" value="Checkout">
                </li>
            </ul>

        </div>

    </div>
    </form>
</div>
<?php
include('user-footer.php');
?>