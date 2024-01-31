<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

<?php

session_start();

?>

<style>
    .container-new {
        grid-template-columns: repeat(7, 1fr);
        display: grid;
    }

    .left {
        height: auto;
        grid-column: 1/3;
    }

    .right {
        margin-top: 30px;
        overflow: scroll;
        height: 95vh;
        grid-column: 3/8;
    }

    .new-block>div {
        box-shadow: 10px 13px 33px -1px rgba(194, 194, 194, 1);
        margin: 10px;
        display: inline-block;
    }

    .image-prod {
        object-fit: contain;
        aspect-ratio: 3/2;
        width: 200%;
    }

    .new-height {
        margin-left: 30px;
        margin-top: 30px;
    }
</style>

<div class="container-new">

    <div class="left">
        <div class="new-height w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">

            <form class="space-y-6" action="../data/dItems.php" method="post" enctype="multipart/form-data">

                <h5 class="text-xl font-medium text-gray-900 dark:text-white"></h5>

                <div>
                    <label for="i_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="i_name" id="i_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>
                <div>
                    <label for="i_desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea type="i_desc" name="i_desc" id="i_desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required></textarea>
                </div>

                <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="i_type">
                    <option selected>Choose type</option>
                    <option value="Rooms">Rooms</option>
                    <option value="Cottages">Cottages</option>
                    <option value="Foods">Foods</option>
                </select>

                <div>
                    <label for="i_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="number" name="i_price" id="i_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>

                <div>
                    <label for="i_quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Available</label>
                    <input type="number" name="i_quantity" id="i_quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                </div>


                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" name="i_img" />
                    </label>
                </div>


                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submit">Add</button>
            </form>
        </div>
    </div>

    <div class="right">
        
    </div>
</div>

<script src="../src/sweetalert.min.js"></script>

<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>

    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon : "<?php echo $_SESSION['status_code']; ?>",
            button: "Ok!",
        });
    </script>

<?php
    unset($_SESSION['status']);
}
?>