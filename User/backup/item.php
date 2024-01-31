<!-- body -->
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
                            <span class="font-bold  text-red-600">₱<?= $row['i_price'] ?></span>
                        </div>
                        <a class="hover:bg-sky-700 text-white bg-sky-800 py-2 rounded-br-xl" href="Itemcheckout.php?i_id=<?= $row['i_id'] ?>">Book now</a>
                    </div>
                </div>
            </div>
        </a>

    <?php endforeach; ?>
</div>