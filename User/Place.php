<link href="../node_modules/flowbite/dist/flowbite.css" rel="stylesheet" />

<?php
include '../data/dBooking.php'
?>

<style>
    .place-item {
        display: grid;
        place-items: center;
        margin-top: 200px;
    }
    .hidden-input {
        display: none;
        visibility: hidden;
    }
</style>


<form action="../data/dBooking.php" method="post">

    <!-- get id both user and item id -->
    <input  class="hidden-input"  type="hidden"   name="i_id"      value="<?php echo $i_id ?>">
    <input  class="hidden-input"  type="hidden"   name="users_id"  value="<?php echo $_SESSION['user_id'] ?>">
    <input  class="hidden-input"  type="hidden"   name="start"     value="<?php echo $start ?>">
    <input  class="hidden-input"  type="hidden"   name="end"       value="<?php echo $end ?>">
    <input  class="hidden-input"  type="hidden"   name="available" value="<?php echo $available ?>">
    <input  class="hidden-input"  type="hidden"   name="meal"      value="<?php echo $meal ?>">
    <input  class="hidden-input"  type="hidden"   name="payment"   value="<?php echo $payment ?>">
    <input  class="hidden-input"  type="hidden"   name="total"     value="<?php echo $totalcost ?>">

    <div class="place-item">
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h5 class="mb-4 text-xl font-medium text-gray-500 dark:text-gray-400">Total</h5>
            <div class="flex items-baseline text-gray-900 dark:text-white">
                <span class="text-3xl font-semibold">₱</span>
                <span class="text-5xl font-extrabold tracking-tight"><?php echo $totalcost; ?></span>
                <span class="ms-1 text-xl font-normal text-gray-500 dark:text-gray-400"></span>
            </div>
            <ul role="list" class="space-y-5 my-7">
                <li class="flex items-center">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3"><?php echo $totaldays ?> days stay</span>
                </li>

                <li class="flex">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3"><?php echo $quantity ?> Rooms</span>
                </li>
                <li class="flex">
                    <svg class="flex-shrink-0 w-4 h-4 text-blue-600 dark:text-blue-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="text-base font-normal leading-tight text-gray-500 dark:text-gray-400 ms-3"><?php echo $meal ?></span>
                </li>

            </ul>
            <button type="submit" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-200 dark:focus:ring-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex justify-center w-full text-center" name="placed">Place Booking</button>
        </div>

    </div>
</form>

<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>




