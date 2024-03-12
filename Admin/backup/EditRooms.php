<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>




<?php
include '../database/Connection.php';
include '../class/cRooms.php';

if (isset($_GET['r_id'])) {

    $r_id = $_GET['r_id'];

    $card = new Rooms();
    $result = $card->editCards($r_id);


foreach ($result as $row) : ?>

    <div class="new-height w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        
        <form class="space-y-6" action="../data/dRooms.php" method="post" enctype="multipart/form-data">
            <h5 class="text-xl font-medium text-gray-900 dark:text-white" enctype="multipart/form-data"></h5>
            <div>

            <input type="text" name="r_id" value="<?php echo $row['r_id']; ?>">

                <label for="r_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room Name</label>
                <input type="text" name="r_name" id="r_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="<?php echo $row["r_name"]; ?>" required>
            </div>
            <div>
                <label for="r_desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room description</label>
                <textarea type="r_desc" name="r_desc" id="r_desc" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="" required><?php echo $row["r_desc"]; ?></textarea>
            </div>

            <div>
                <label for="r_price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room pricing</label>
                <input type="number" name="r_price" id="r_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="<?php echo $row["r_price"]; ?>" >
            </div>

            <div>
                <label for="r_available" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Available</label>
                <input type="number" name="r_available" id="r_available" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="<?php echo $row["r_available"]; ?>" >
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
                    <input id="dropzone-file" type="file" class="hidden" name="r_img"/>
                    <input id="dropzone-file" type="hiddden" class="hidden" name="oldimg" id="" value="<?php echo $row['r_img']; ?>"/>
                </label>
            </div>


            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="update">Update</button>
        </form>
    </div>

<?php endforeach; }?>

