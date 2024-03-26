<?php
session_start();
include('Navigation.php');
include('../data/user-load-info.php');
include('user-header.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<title>Home</title>
</head>

<body>

    <div class="user-home-container">

        <div class="body-item-panel">
            <h1 id="rooms" class=" scroll custom-h1-style mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">R</span>ooms</h1>
            <p class="custom-p-style font-normal text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae ratione possimus ab sint iste nemo similique.</p>

            <div class="new-block" name="viewDetail">
                <?php if ($result2 !== null) : ?>
                    <?php foreach ($result2 as $row) : ?>
                        <a href="get-item.php?i_id=<?= $row['i_id'] ?>">
                            <div class="custom-items-style w-60 h-auto bg-white p-3 flex flex-col gap   -1 rounded-br-3xl newclass">
                                <input type="hidden" class="item_id" value="<?php echo $row['i_id'] ?>">
                                <div class="img-div duration-500 contrast-50 h-48 bg-gradient-to-bl from-black via-orange-900 to-indigo-600  hover:contrast-100"><img class="image-prod" name="image" src="../Admin/Items/<?php echo $row["i_img"]; ?>" alt="product image" /></div>

                                <div class="desc-pro flex flex-col gap-4">
                                    <div class="flex flex-row justify-between">
                                        <div class="flex flex-col">
                                            <span class="item-name text-xl text-black font-bold"><?php echo $row["i_name"]; ?></span>
                                            <p id="available" class="availability text-xs text-green-500 ml-0"><?php echo $row["i_quantity"]; ?> Available</p>
                                        </div>
                                    </div>
                                    <a class=" text-red-600   hover:bg-sky-700 bg-sky-800 py-2 rounded-br-xl" href="get-item.php?i_id=<?= $row['i_id'] ?>">₱<?= number_format($row['i_price']); ?></a>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>


            <br><br>
            <h1 id="cottage" style="transition: 0.5;" class="scroll custom-h1-style mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">C</span>ottages</h1>
            <p class="custom-p-style font-normal text-gray-500 dark:text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat ab perspiciatis ipsam, corrupti aspernatur sunt veritatis enim nobis qui nam, nemo libero tempore repellendus, voluptatum blanditiis aliquam sint in alias!</p>

            <div class="new-block" name="viewDetail">
                <?php if ($result2 !== null) : ?>
                    <?php foreach ($result3 as $row) : ?>
                        <a href="get-item.php?i_id=<?= $row['i_id'] ?>">
                            <div class="custom-items-style w-60 h-auto bg-white p-3 flex flex-col gap-1 rounded-br-3xl newclass">
                                <input type="hidden" class="item_id" value="<?php echo $row['i_id'] ?>">
                                <div class="img-div duration-500 contrast-50 h-48 bg-gradient-to-bl from-black via-orange-900 to-indigo-600  hover:contrast-100"><img class="image-prod rounded-t-lg" name="image" src="../Admin/Items/<?php echo $row["i_img"]; ?>" alt="product image" /></div>

                                <div class="desc-pro flex flex-col gap-4">
                                    <div class="flex flex-row justify-between">
                                        <div class="flex flex-col">
                                            <span class="item-name text-xl text-black font-bold"><?php echo $row["i_name"]; ?></span>
                                            <p id="available" class="availability text-xs text-green-500 ml-0"><?php echo $row["i_quantity"]; ?> Available</p>
                                        </div>
                                    </div>
                                    <a class=" text-red-600   hover:bg-sky-700 bg-sky-800 py-2 rounded-br-xl" href="get-item.php?i_id=<?= $row['i_id'] ?>">₱<?= number_format($row['i_price']); ?></a>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include('user-footer.php'); ?>
    <script src="../assets/admin.js"></script>