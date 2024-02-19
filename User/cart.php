<?php
session_start();
include('Navigation.php');
include('user-header.php');
?>

<!-- content -->
<title>Cart</title>

<?php
$conn = new mysqli("localhost", "root", "fundador142", "cugondb");

if (isset($_GET['user_id'])) {

    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM cart 
    INNER JOIN items ON cart.item_id = items.i_id
    INNER JOIN users ON cart.user_id = users.user_id
    WHERE users.user_id = '$user_id'";

    $result = mysqli_query($conn, $sql);

?>
    <div class="cart-container">

        <div class="cart-items-section">
            <?php foreach ($result as $row) {
                $quantity = $row['item_quantity'];
                $price = $row['i_price'];
                $totalInitial = $price * $quantity;
            ?>
                <div class="cart-items">
                    <ul style="display: flex; flex-direction: row; justify-content: space-between;  align-items: center; padding: 30px">

                        <li style="margin: 20px;">
                            <input type="checkbox" class="item-checkbox" data-initial="<?= $totalInitial ?>" data-item-id="<?= $row['item_id']; ?>">
                        </li>
                        <li>
                            <img src="../Admin/Items/<?=  $row['i_img'] ?>" alt="" height="20px" width="100px" style="border-radius: 10px; object-fit: contain; aspect-ratio: 3/2;">
                        </li>
                        <li style="align-items: center; text-align: center">
                            <h4>Item: <?= $row['i_name'] ?></h4>
                            <h4>Available: <?= $row['i_quantity'] ?></h4>
                        </li>
                        <li style="align-items: center; text-align: center">
                            <h4 class=" text-red-600 font-semibold">Price: <?= number_format($row['i_price']) ?></h4>
                            <h4 id="delete-cart"><i class="fa-solid fa-trash mt-3 cursor-pointer"></i></h4>
                        </li>
                        <li>
                            <form class="max-w-xs mx-auto">

                                <div class="relative flex items-center max-w-[8rem]">
                                    <button type="button" id="decrement-button" data-item-id="<?= $row['item_id']; ?>" data-user-id="<?= $row['user_id']; ?>" data-input-counter-decrement="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none decrement-btn">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                        </svg>
                                    </button>

                                    <input type="text" id="quantity-input" data-input-counter data-input-counter-min="1" data-input-counter-max="50" aria-describedby="helper-text-explanation" class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 input-quantity" placeholder="999" name="item-value" value="<?= $row['item_quantity'] ?>" required disabled />

                                    <button type="button" id="increment-button" data-item-id="<?= $row['item_id']; ?>" data-user-id="<?= $row['user_id']; ?>" data-input-counter-increment="quantity-input" class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none increment-btn">
                                        <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </li>

                    </ul>



                </div>
            <?php } ?>
        </div>

        <div class="checkout-section">

            <div class="total-payment">
                <ul class=" m-4 h-auto">
                    <li style="margin-bottom: 2rem ;">
                        <h4 class=" bg-blue-200 p-3" style="border-left: 6px solid blue; padding-left: 5px;">Items Summary</h4>
                    </li>
                    <li style="display: flex; flex-direction: row; justify-content: space-between; margin-bottom: 2rem ;">
                        <h4>Total Items : </h4>
                        <p id="total-items">0</p>
                    </li>
                    <li style="display: flex; flex-direction: row; justify-content: space-between; margin-bottom: 2rem ;">
                        <h4>Subtotal : </h4>
                        <p id="total-items-pay">0</p>
                    </li>
                    <li style="display: flex; flex-direction: row; justify-content: space-between; margin-bottom: 0.3rem ;">
                    <button type="submit" id="checkoutBtn" class="pay-button checkoutButton w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Checkout</button>
                    </li>
                </ul>

            </div>

        </div>
    </div>
<?php } ?>

<!-- <div class="date-section">

    <div date-rangepicker class="flex items-center">
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input name="start" id="startDate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
        </div>
        <span class="mx-4 text-gray-500">to</span>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                </svg>
            </div>
            <input name="end" id="endDate" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
        </div>
    </div>

</div> -->



<script>
    $(document).ready(function() {

        $('.input-quantity').each(function() {
            var quantity = parseInt($(this).val());
            var decrement = $(this).closest('.cart-items').find('.decrement-btn');

            if (quantity <= 1) {
                decrement.prop('disabled', true);
                decrement.css({
                    "cursor": "not-allowed",
                    "opacity": "30%"
                });
            } else {
                decrement.prop('disabled', false);
            }
        });

        $('.decrement-btn').click(function() {
            const itemID = $(this).data('item-id');
            const userID = $(this).data('user-id');

            $.ajax({
                url: '../data/user-decrement-quantity.php',
                type: 'post',
                data: {
                    "userID": userID,
                    "itemID": itemID
                },
                success: function(response) {
                    location.reload()
                }
            });
        });

        $('.increment-btn').click(function() {
            const itemID = $(this).data('item-id');
            const userID = $(this).data('user-id');
            $.ajax({
                url: '../data/user-increment-quantity.php',
                type: 'post',
                data: {
                    "userID": userID,
                    "itemID": itemID
                },
                success: function(response) {
                    location.reload()
                }
            });
        });

        //! checkbox
        $('.item-checkbox').change(function() {
            let total = 0;
            let items = 0;

            $('.item-checkbox:checked').each(function() {
                total += parseFloat($(this).data('initial'));
            });

            var checkedItemIDs = $('.item-checkbox:checked').map(function() {
                return $(this).data('item-id');
            }).get();

            var checkedItemCount = checkedItemIDs.length;

            $('#total-items-pay').css('opacity', 0);
            setTimeout(function() {
                $('#total-items-pay').text(total.toFixed(2));
                $('#total-items').text(checkedItemCount);
                $('#total-items-pay').css('opacity', 1);
            }, 300);
        });

        //! button
        $('#checkoutBtn').click(function() {
            var startDate = new Date($('#startDate').val());
            var endDate = new Date($('#endDate').val());
            var totalItems = $('#total-items-pay').text();

            var timeDifference = endDate.getTime() - startDate.getTime();
            var daysDifference = timeDifference / (1000 * 3600 * 24);

            var checkedItemIDs = $('.item-checkbox:checked').map(function() {
                return $(this).data('item-id');
            }).get();

            var totalCostwithDays = daysDifference * totalItems;
            var formattedTotal = parseFloat(totalCostwithDays).toLocaleString();

            var checkedItemCount = checkedItemIDs.length;
            var checkedItemIDsString = checkedItemIDs.join(', ');

            alert("Total: " + formattedTotal + "\nTotal items: " + checkedItemCount + "\nItem IDs: " + checkedItemIDsString + "\nDays: " + daysDifference);
        });
    });
</script>

<?php
include('user-footer.php');
?>