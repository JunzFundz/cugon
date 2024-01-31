<?php
require '../data/dCards.php';

$card = new Cards();

if (isset($_GET['card_id'])) {

    $card_id = $_GET['card_id'];

    $card = new Cards();
    $result = $card->deleteCard($card_id);

    header('location: Cards.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="src/grids.css">
</head>

<body>
    <a href="Home.php" class="">Back to home</a>
    <br>
    <br>


    <form class="" action="../data/dCards.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <label for="name">Name : </label>
        <input type="text" name="name" id="name" required value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-90 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"> <br>

        <label for="des">Description : </label>
        <input type="text" name="img_desc" id="des" required value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-90 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input> <br>

        <label for="des">price : </label>
        <input type="text" name="price" id="des" required value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-90 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></input> <br>

        <label for="image">Image : </label>
        <input type="file" name="img_dir" id="image" accept=".jpg, .jpeg, .png" value=""> <br> <br>

        <button type="submit" name="submit">Submit</button>
    </form>

    <br>
    <br>

    <?php foreach ($result as $row) : ?>

        <div class="inline-block items-center">

            <a href="Editcards.php?card_id=<?= $row['card_id'] ?>" type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2">Edit</a>

            <a href="Cards.php?card_id=<?= $row['card_id'] ?>" type="button" class="text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2  ml-10">Delete</a>

            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">

                <input type="hidden" name="card_id" value="<?= $row['card_id'] ?>">
                <a href="#" class="justify-center flex object-cover">
                    <img class="rounded-t-lg h-80 justify-center object-cover" src="uploads/<?php echo $row["img_dir"]; ?>" width=400 title="<?php echo $row['img_dir']; ?>">
                </a>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    <?php echo $row["price"]; ?>
                </p>

                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo $row["name"]; ?></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        <?php echo $row["img_desc"]; ?>
                    </p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    <?php endforeach; ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>


</body>

</html>