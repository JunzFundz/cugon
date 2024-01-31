<?php
session_start();
include '../data/dItems.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/Userhome.css">
    <link href="../node_modules/flowbite/dist/flowbite.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Home</title>
</head>

<body>

    <div class="containernewdiv">

        <div class="nav-section">
            <?php include 'Navigation.php'; ?>
        </div>

        <div class="body-panel">
            <br><br><br><br><br>
            <!-- items block -->
            <div class="new-block" name="viewDetail">
                <?php foreach ($result as $row) : ?>
                    <a href="Itemcheckout.php?i_id=<?= $row['i_id'] ?>">
                        <div class="new">
                            <div class="w-60 h-80 bg-gray-800 p-3 flex flex-col gap-1 rounded-br-3xl">
                                <div class="duration-500 contrast-50 h-48 bg-gradient-to-bl from-black via-orange-900 to-indigo-600  hover:contrast-100"><img class="image-prod rounded-t-lg" name="image" src="../Admin/Rooms/<?php echo $row["i_img"]; ?>" alt="product image" /></div>

                                <div class="flex flex-col gap-4">
                                    <div class="flex flex-row justify-between">
                                        <div class="flex flex-col">
                                            <span class="text-xl text-white font-bold"><?php echo $row["i_name"]; ?></span>
                                            <p class="availability text-xs text-gray-400 ml-0"><?php echo $row["i_quantity"]; ?> Available</p>
                                        </div>
                                        <span class="font-bold  text-red-600">₱<?= number_format($row['i_price']); ?></span>
                                    </div>
                                    <a class="hover:bg-sky-700 text-white bg-sky-800 py-2 rounded-br-xl" href="Itemcheckout.php?i_id=<?= $row['i_id'] ?>">Book now</a>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
    <script src="../assets/sweetalert.min.js"></script>
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>

        <script>
            swal({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                button: "Ok",
            });
        </script>

    <?php
        unset($_SESSION['status']);
    }
    ?>

</body>

</html>