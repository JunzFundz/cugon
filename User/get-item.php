<?php
session_start();
include('../data/user-checkout.php');
include('user-header.php');
?>

<title>Checkout</title>
</head>

<div class="opacity-0 invisible" id="alert-box">
    <span class=" text-2xl text-white text-opacity-100" id="alert-text"></span>
</div>

<body>

        <div class="checkout-container">

            <div class="checkout-item-img">
                <img class="" height="598" width="400" src="../Admin/Items/<?php echo $row["i_img"]; ?>" alt="...">
                <br>
                <p class="product-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae, placeat ea fuga assumenda similique aut incidunt debitis dolorum reiciendis sed velit ratione suscipit quia natus saepe. Nam ullam minima temporibus.<?php echo $row["i_desc"]; ?></p>
            </div>

            <div class="checkout-body-section">

                <div class="w-full max-w-sm p-4 form-div-checkout">
                    <form id="myForm" name="form" onsubmit="return validateBooking(this)" method="post" action="placed-item.php?user_id=<?php echo $_SESSION['user_id']; ?>">

                        <!-- Product details -->
                        <input type="hidden" value="<?php echo $row['i_id'] ?>" name="item_id" class="item_id">
                        <input type="hidden" value="<?php echo $row['i_name'] ?>" name="item_name" class="item_name">
                        <input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="users_id">
                        <input type="hidden" value="<?php echo $row['i_price'] ?>" name="price">
                        <input type="hidden" value="<?php echo $row['i_quantity'] ?>" name="available">


                        <div class="tags-wrapper">
                            <h5 class=" text-gray-700 font-medium text-base mb-2"><?php echo $row['i_name'] ?></h5>
                            <ul class="flex flex-col-reverse gap-8">
                                <li>
                                    Available | <span class=" text-blue-600 font-medium"><?php echo $row['i_quantity'] ?></span>
                                </li>
                                <li>
                                    Ratings | <span class=" text-blue-600 font-medium"><?php echo $row['i_quantity'] ?></span>
                                </li>
                                <li>
                                    Availed | <span class=" text-blue-600 font-medium"><?php echo $row['i_quantity'] ?></span>
                                </li>
                            </ul>
                            <section>
                                <span class=" text-red-500 font-semibold text-4xl mb-6">₱<?php echo number_format($row['i_price']) ?></span>
                            </section>

                        </div>



                        <!-- onchange -->
                        <label for="options" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select type of booking</label>
                        <select id="options" name="dateOptions" onchange="changeInputs()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="reg" selected>Regular</option>
                            <option value="stay">Stay</option>
                        </select>

                        <!-- single date -->
                        <br>
                        <div class="relative max-w-sm" id="singleDate">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </div>
                            <input name="regular_date" id="singleDate" datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 singleDate" placeholder="Select date">
                        </div>

                        <!-- two dates picker -->
                        <div date-rangepicker class="flex items-center " id="twoDates">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>

                                <!-- start date -->
                                <input id="start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select start">
                            </div>
                            <span class="mx-4 text-orange-600">to</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                    </svg>
                                </div>

                                <!-- end date -->
                                <input id="end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select end">
                            </div>
                        </div>

                        <!-- quantity -->
                        <br>
                        <label for="quantity-input" class="block mb-2 text-sm text-gray-900 dark:text-white font-semibold">Quantity:</label>
                        <div class="relative flex items-center max-w-[8rem]">
                            <button type="button" id="decrement-button" data-input-counter-decrement="quantity" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 p-3 h-9 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none text-center">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                </svg>
                            </button>

                            <input name="quantity" type="text" id="quantity" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-9 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-0.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="999" value="1">

                            <button type="button" id="increment-button" data-input-counter-increment="quantity" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 p-3 h-9 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                                <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                </svg>
                            </button>
                        </div>

                        <!-- payment -->
                        <br>
                        <label for="" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Select an payment</label>
                        <select id="payment" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="payment">
                            <option selected value="counter">Over the counter</option>
                            <option value="Gcash">Gcash</option>
                        </select>

                        <!-- submit -->
                        <br>
                        <button id="addtoCart" type="submit" class=" text-blue-700 bg-blue-200  hover:bg-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 addtoCart" name="addcart"><i class="fa-solid fa-cart-plus pr-4"></i>Add to cart</button>

                        <button type="submit" class="left-0 ml-6 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium  text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 " name="get-preffered-item">Get</button>
                    </form>
                </div>

            </div>

        </div>

    <?php include('user-footer.php'); ?>
    <script>
        $(document).ready(function() {

            //! Add to cart
            $('#addtoCart').on('click', function(event) {
                event.preventDefault();

                const quantity = $('#quantity').val();
                const item_id = <?php echo $row['i_id'] ?>;
                const user_id = <?php echo $_SESSION['user_id'] ?>;

                $.ajax({
                    type: "post",
                    url: "../data/user-add-cart.php",
                    data: {
                        item_id: item_id,
                        user_id: user_id,
                        item_quantity: quantity
                    },
                    success: function(response) {
                        var result = JSON.parse(response);
                        var message = result ? "Item added" : "Item already added!";

                        $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                        $('#alert-text').html(message);

                        setTimeout(function() {
                            $('#alert-box').removeClass('visible').addClass('invisible');
                        }, 1500);
                    },

                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert("Error: " + status + " - " + error);
                    }
                });
            });


            //! check out
            $('#checkoutItem').on('click', function() {

                const option = $('#options').val();

                if (option == 'reg') {

                    const regular = $('#singleDate').val();
                    const quantity = $('#quantity').val();
                    const meal = $('#meal').val();
                    const item_id = <?php echo $row['i_id'] ?>;
                    const user_id = <?php echo $_SESSION['user_id'] ?>;

                    $.ajax({
                        type: "POST",
                        url: "../data/user-add-cart.php",
                        data: {
                            item_id: item_id,
                            user_id: user_id,
                            item_quantity: quantity,
                            meal_inc: meal
                        },
                        success: function(data) {
                            alert("Success");
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });

                } else {
                    const start = $('#start').val();
                    const end = $('#end').val();
                    const quantity = $('#quantity').val();
                    const meal = $('#meal').val();
                    const item_id = <?php echo $row['i_id'] ?>;
                    const user_id = <?php echo $_SESSION['user_id'] ?>;

                    $.ajax({
                        type: "POST",
                        url: "../data/user-checkout.php",
                        data: {
                            item_id: item_id,
                            user_id: user_id,
                            item_quantity: quantity
                        },
                        success: function(data) {
                            alert("Success");
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });
    </script>