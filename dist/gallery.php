<?php
require_once('../database/Connection.php');
$db = new Dbh();
$conn = $db->connect();

$stmt = $conn->query("SELECT * FROM ratings");
$images = [];
foreach ($stmt as $row) {
    $imageArray = json_decode($row['img'], true);
    $images[] = $imageArray;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cugon</title>
    <title>Gallery</title>
</head>

<body>

    <section class="flex items-center bg-gray-50 dark:bg-gray-900">
        <div class="w-full max-w-screen-xl px-4 mx-auto lg:px-12">
            <!-- Start coding here -->
            <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="flex-row items-center justify-between p-4 space-y-3 sm:flex sm:space-y-0 sm:space-x-4">
                    <div>
                        <h5 class="mr-3 font-semibold dark:text-white">Cugon Users</h5>
                        <p class="text-gray-500 dark:text-gray-400">Users Uploads</p>
                    </div>
                    <a href="home" type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Go to Home
                    </a>
                </div>
            </div>
        </div>
    </section>


    <div class="flex flex-wrap" style="padding-inline: 5rem; padding-top: 5rem">
        <?php foreach ($images as $imageArray) { ?>
            <?php foreach ($imageArray as $image) { ?>

                <figure class="relative max-w-sm transition-all duration-300 cursor-pointer" style="padding: 0.7rem">
                    <a href="#">
                        <img class="rounded-lg" src="../uploads/<?php echo htmlspecialchars($image); ?>" alt="image description">
                    </a>
                    <figcaption class="absolute px-4 text-lg text-white bottom-6">
                        <p><?= htmlspecialchars($row['caption']) ?></p>
                    </figcaption>
                </figure>

            <?php } ?>
        <?php } ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>

</html>