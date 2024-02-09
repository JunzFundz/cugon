<?php
session_start();
include('../data/user-show-items.php');
include('user-header.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<title>Home</title>
</head>

<body>

    <div class="user-home-container">

        <div id="floating-drawer" class="fixed w-36 h-300 h-36 right-0 rounded-full">
            <a href="#rooms" style="transition: 0.5s;" class="scroll"><img src="https://www.svgrepo.com/show/490552/bed-2.svg" alt="" class=" w-1/12"></a>
            <a href="#cottage" style="transition: 0.5s;" class="scroll"><img src="https://www.svgrepo.com/show/116197/sunbed.svg" alt="" class=" w-1/12"></a>
            <a href=""><img src="https://www.svgrepo.com/show/30745/fast-food.svg" alt="" class=" w-1/12"></a>
        </div>

        <div class="nav-section">
            <?php include 'Navigation.php'; ?>
        </div>

        <div class="body-item-panel">
            <h1 id="rooms" class=" scroll custom-h1-style mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">R</span>ooms</h1>
            <p class="custom-p-style text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae ratione possimus ab sint iste nemo similique.</p>
            <div class="new-block" name="viewDetail">

                <?php foreach ($result2 as $row) : ?>

                    <a href="Itemcheckout.php?i_id=<?= $row['i_id'] ?>">

                        <div class="custom-items-style w-60 h-80 bg-gray-800 p-3 flex flex-col gap-1 rounded-br-3xl newclass">

                            <input type="hidden" class="item_id" value="<?php echo $row['i_id'] ?>">

                            <div class="duration-500 contrast-50 h-48 bg-gradient-to-bl from-black via-orange-900 to-indigo-600  hover:contrast-100"><img class="image-prod rounded-t-lg" name="image" src="../Admin/Items/<?php echo $row["i_img"]; ?>" alt="product image" /></div>

                            <div class="flex flex-col gap-4">
                                <div class="flex flex-row justify-between">
                                    <div class="flex flex-col">
                                        <span class="text-xl text-white font-bold"><?php echo $row["i_name"]; ?></span>
                                        <p id="available" class="availability font-semibold text-xs text-green-500 ml-0"><?php echo $row["i_quantity"]; ?> Available</p>
                                    </div>
                                </div>
                                <a data-modal-target="default-modal" data-modal-toggle="default-modal" class="font-bold  text-red-600   hover:bg-sky-700 bg-sky-800 py-2 rounded-br-xl" href="Itemcheckout.php?i_id=<?= $row['i_id'] ?>">₱<?= number_format($row['i_price']); ?></a>
                            </div>
                        </div>
                    </a>

                <?php endforeach; ?>
            </div>


            <br><br>
            <h1 id="cottage" style="transition: 0.5;" class="scroll custom-h1-style mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">C</span>ottages</h1>
            <p class="custom-p-style text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae ratione possimus ab sint iste nemo similique.</p>

            <div class="new-block" name="viewDetail">
                
                <?php foreach ($result3 as $row) : ?>

                    <a href="Itemcheckout.php?i_id=<?= $row['i_id'] ?>">
                        <div class="custom-items-style w-60 h-80 bg-gray-800 p-3 flex flex-col gap-1 rounded-br-3xl">
                            <div class="duration-500 contrast-50 h-48 bg-gradient-to-bl from-black via-orange-900 to-indigo-600  hover:contrast-100"><img class="image-prod rounded-t-lg" name="image" src="../Admin/Items/<?php echo $row["i_img"]; ?>" alt="product image" /></div>

                            <div class="flex flex-col gap-4">
                                <div class="flex flex-row justify-between">
                                    <div class="flex flex-col">
                                        <span class="text-xl text-white font-bold"><?php echo $row["i_name"]; ?></span>
                                        <p class="availability text-xs text-green-500 ml-0"><?php echo $row["i_quantity"]; ?> Available</p>
                                    </div>
                                    <span class="font-bold  text-red-600">₱<?= number_format($row['i_price']); ?></span>
                                </div>
                                <a class="hover:bg-sky-700 text-white bg-sky-800 py-2 rounded-br-xl" href="Itemcheckout.php?i_id=<?= $row['i_id'] ?>">Book now</a>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include('user-footer.php'); ?>
    <script src="../assets/admin.js"></script>