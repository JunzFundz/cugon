<?php
session_start();

include '../data/dBooking.php';
?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />

<link rel="stylesheet" href="../src/Adminhome.css">

<title>Booking</title>

<div class="container">

    <div class="nav">
        <nav>
            <ul>
                <li id="logo-admin">Cugon bamboo resort</li>
                <li  id="search-input" >
                </li>
                <li id="profile" onclick="profileClick()" class="">
                    <div class="avatar-custom relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600 inline-block self-center mt-3">
                        <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <?php echo $_SESSION['email']; ?>
                </li>
                <li><a href="../database/Logout.php">Logout</a></li>
                <li><a href="cards.php" class="">| Cards</a></li>

            </ul>
        </nav>
    </div>

    <div class="left-panel">
        <div>
            <ul class="font-semibold">
                <li><a href="">Bookings</a></li>
                <li><a href="">Availables</a></li>
                <li><a href="">Accounts</a></li>
                <li><a href="">Galerry Request</a></li>
                <li id="settings-custom" class="font-bold"><a href="">Settings</a></li>
            </ul>
        </div>
    </div>

    <div class="rigth-panel">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <?php
            
            if ($result) { ?>
                <table id="example" class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Reservation Number
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Number of Childs
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Number of Adults
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date of Reservation
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Payment
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            foreach ($result as $rows) {
                            ?>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">

                                <td class="px-6 py-4">
                                    <?= $rows['res_number']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $rows['booking_email']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $rows['numChild']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $rows['numAdults']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $rows['date']; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $rows['payment']; ?>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a>

                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Approve</a>

                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="areYouSure()">Decline</a>

                            </tr>
                            <?php } ?>
                        <?php } 
                        else{echo "No Data Found.";}
                        ?>
                    </tbody>
                </table>
        </div>
    </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<script>

$(document).ready(function(){
    $('#example').DataTable();
});

    function areYouSure(id) {
        if (window.confirm('Are you want to decline?') == true) {
            window.location.href = 'Home.php';
        } else {
            return false;
        }
    }
</script>