<?php
session_start();
include('user-header.php');
include('navigation.php');
include('../data/user-load-info.php');
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
                <?php foreach ($result2 as $row) : ?>
                    <!-- component -->
                    <a href="get-item.php?i_id=<?= $row['i_id'] ?>">
                        <div class="block rounded-lg bg-white w-72 mt-32">
                            <input type="hidden" class="item_id" value="<?php echo $row['i_id'] ?>">
                            <div class="relative overflow-hidden bg-cover bg-no-repeat" data-te-ripple-init data-te-ripple-color="light">
                                <img class="image-prod rounded-lg  sm:m-h-64 md:h-64 w-full" src="../Admin/Items/<?php echo $row["i_img"]; ?>" name="image" alt="" />
                                <a href="get-item.php?i_id=<?= $row['i_id'] ?>">
                                    <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100">
                                    </div>
                                </a>
                            </div>

                            <div class="p-2">
                                <div class="flex justify-between">
                                    <h5 class="mb-2 text-sm font-bold leading-tight text-neutral-800 dark:text-neutral-50">
                                        <?php echo $row["i_name"]; ?>
                                    </h5>
                                    <h5 class="mb-2 text-sm font-bold leading-tight  dark:text-neutral-50 flex" id="average-ratings">
                                        0.0<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 ml-1 text-yellow-300">
                                            <path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd" />
                                        </svg>
                                    </h5>
                                </div>
                                <p class=" text-red-600 hover:bg-sky-700 bg-sky-800 py-2 rounded-br-xl mb-1 text-sm dark:text-neutral-200">
                                    ₱<?= number_format($row['i_price']); ?>
                                </p>
                                <p class="mb-1 text-sm text-neutral-600 dark:text-neutral-200">
                                    x<?php echo $row["i_quantity"]; ?>
                                </p>

                                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                                    Date Range - Owner
                                </p>

                                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                                    <a href="get-item.php?i_id=<?= $row['i_id'] ?>" class="relative px-4 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                        Get
                                    </a>
                                </button>

                                <button class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800">
                                    <a href="get-item.php?i_id=<?= $row['i_id'] ?>" class="relative px-4 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                        <i class="fa-solid fa-cart-shopping text-gray-600"></i>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
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
                                            <p id="available" class="availability text-xs text-green-500 ml-0"><?php echo $row["i_quantity"]; ?>Available</p>
                                        </div>
                                    </div>
                                    <a class=" text-red-600 hover:bg-sky-700 bg-sky-800 py-2 rounded-br-xl" href="get-item.php?i_id=<?= $row['i_id'] ?>">₱<?= number_format($row['i_price']); ?></a>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <br><br><br>

    <div class="flex flex-col mx-3 bg-white rounded-lg" style="padding: 1rem;">
        <div class="w-full draggable">
            <div class="container flex flex-col mx-auto">
                <div class="flex flex-col items-center w-full my-20">
                    <span class="mb-8">
                        <img src="../images/logo.jpg" alt="" style="height: 75px">
                    </span>
                    <div class="flex flex-col items-center gap-6 mb-8">
                        <div class="flex flex-wrap items-center justify-center gap-5 lg:gap-12 gap-y-3 lg:flex-nowrap text-dark-grey-900">
                            <a href="javascript:void(0)" class="text-gray-600 hover:text-gray-900">About</a>
                            <a href="javascript:void(0)" class="text-gray-600 hover:text-gray-900">Features</a>
                            <a href="javascript:void(0)" class="text-gray-600 hover:text-gray-900">Blog</a>
                            <a href="javascript:void(0)" class="text-gray-600 hover:text-gray-900">Resources</a>
                            <a href="javascript:void(0)" class="text-gray-600 hover:text-gray-900">Partners</a>
                            <a href="javascript:void(0)" class="text-gray-600 hover:text-gray-900">Help</a>
                            <a href="javascript:void(0)" class="text-gray-600 hover:text-gray-900">Terms</a>
                        </div>
                        <div class="flex items-center gap-8">
                            <a href="javascript:void(0)" class="text-grey-700 hover:text-grey-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6348 20.7273V12.766H16.3582L16.7668 9.66246H13.6348V7.68128C13.6348 6.78301 13.8881 6.17085 15.2029 6.17085L16.877 6.17017V3.39424C16.5875 3.35733 15.5937 3.27273 14.437 3.27273C12.0216 3.27273 10.368 4.71881 10.368 7.37391V9.66246H7.63636V12.766H10.368V20.7273H13.6348Z" fill="currentColor" />
                                    <mask id="mask0_3320_6483" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="7" y="3" width="10" height="18">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6348 20.7273V12.766H16.3582L16.7668 9.66246H13.6348V7.68128C13.6348 6.78301 13.8881 6.17085 15.2029 6.17085L16.877 6.17017V3.39424C16.5875 3.35733 15.5937 3.27273 14.437 3.27273C12.0216 3.27273 10.368 4.71881 10.368 7.37391V9.66246H7.63636V12.766H10.368V20.7273H13.6348Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_3320_6483)">
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0)" class="text-grey-700 hover:text-grey-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.8182 6.14597C21.1356 6.44842 20.4032 6.65355 19.6337 6.74512C20.4194 6.27461 21.0208 5.5283 21.3059 4.64176C20.5689 5.07748 19.7553 5.39388 18.8885 5.56539C18.1943 4.82488 17.207 4.36364 16.1118 4.36364C14.0108 4.36364 12.3072 6.06718 12.3072 8.16706C12.3072 8.46488 12.3408 8.75576 12.4058 9.03391C9.24436 8.87512 6.44106 7.36048 4.56485 5.05894C4.23688 5.61985 4.0503 6.27342 4.0503 6.97109C4.0503 8.29106 4.72246 9.45573 5.74227 10.1371C5.11879 10.1163 4.53239 9.94476 4.01903 9.65967V9.70718C4.01903 11.5498 5.33088 13.0876 7.07033 13.4376C6.75164 13.5234 6.41558 13.5709 6.06791 13.5709C5.82224 13.5709 5.58467 13.5465 5.35173 13.5002C5.83612 15.0125 7.2407 16.1123 8.90485 16.1424C7.60343 17.1622 5.96246 17.7683 4.18012 17.7683C3.87303 17.7683 3.57055 17.7498 3.27273 17.7162C4.95658 18.7974 6.95564 19.4278 9.10418 19.4278C16.1026 19.4278 19.9281 13.6312 19.9281 8.60397L19.9153 8.11145C20.6628 7.57833 21.3094 6.90851 21.8182 6.14597Z" fill="currentColor" />
                                    <mask id="mask0_3320_6484" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="3" y="4" width="19" height="16">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.8182 6.14597C21.1356 6.44842 20.4032 6.65355 19.6337 6.74512C20.4194 6.27461 21.0208 5.5283 21.3059 4.64176C20.5689 5.07748 19.7553 5.39388 18.8885 5.56539C18.1943 4.82488 17.207 4.36364 16.1118 4.36364C14.0108 4.36364 12.3072 6.06718 12.3072 8.16706C12.3072 8.46488 12.3408 8.75576 12.4058 9.03391C9.24436 8.87512 6.44106 7.36048 4.56485 5.05894C4.23688 5.61985 4.0503 6.27342 4.0503 6.97109C4.0503 8.29106 4.72246 9.45573 5.74227 10.1371C5.11879 10.1163 4.53239 9.94476 4.01903 9.65967V9.70718C4.01903 11.5498 5.33088 13.0876 7.07033 13.4376C6.75164 13.5234 6.41558 13.5709 6.06791 13.5709C5.82224 13.5709 5.58467 13.5465 5.35173 13.5002C5.83612 15.0125 7.2407 16.1123 8.90485 16.1424C7.60343 17.1622 5.96246 17.7683 4.18012 17.7683C3.87303 17.7683 3.57055 17.7498 3.27273 17.7162C4.95658 18.7974 6.95564 19.4278 9.10418 19.4278C16.1026 19.4278 19.9281 13.6312 19.9281 8.60397L19.9153 8.11145C20.6628 7.57833 21.3094 6.90851 21.8182 6.14597Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_3320_6484)">
                                    </g>
                                </svg>
                            </a>
                            <a href="javascript:void(0)" class="text-grey-700 hover:text-grey-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M12 3C7.0275 3 3 7.13211 3 12.2284C3 16.3065 5.5785 19.7648 9.15375 20.9841C9.60375 21.0709 9.76875 20.7853 9.76875 20.5403C9.76875 20.3212 9.76125 19.7405 9.7575 18.9712C7.254 19.5277 6.726 17.7332 6.726 17.7332C6.3165 16.6681 5.72475 16.3832 5.72475 16.3832C4.9095 15.8111 5.78775 15.8229 5.78775 15.8229C6.6915 15.887 7.16625 16.7737 7.16625 16.7737C7.96875 18.1847 9.273 17.777 9.7875 17.5414C9.8685 16.9443 10.1003 16.5381 10.3575 16.3073C8.35875 16.0764 6.258 15.2829 6.258 11.7471C6.258 10.7399 6.60675 9.91659 7.18425 9.27095C7.083 9.03774 6.77925 8.0994 7.263 6.82846C7.263 6.82846 8.01675 6.58116 9.738 7.77462C10.458 7.56958 11.223 7.46785 11.988 7.46315C12.753 7.46785 13.518 7.56958 14.238 7.77462C15.948 6.58116 16.7017 6.82846 16.7017 6.82846C17.1855 8.0994 16.8818 9.03774 16.7917 9.27095C17.3655 9.91659 17.7142 10.7399 17.7142 11.7471C17.7142 15.2923 15.6105 16.0725 13.608 16.2995C13.923 16.5765 14.2155 17.1423 14.2155 18.0071C14.2155 19.242 14.2043 20.2344 14.2043 20.5341C14.2043 20.7759 14.3617 21.0647 14.823 20.9723C18.4237 19.7609 21 16.3002 21 12.2284C21 7.13211 16.9703 3 12 3Z" fill="currentColor" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)" class="text-grey-700 hover:text-grey-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                                    <path d="M16.2 0H1.8C0.81 0 0 0.81 0 1.8V16.2C0 17.19 0.81 18 1.8 18H16.2C17.19 18 18 17.19 18 16.2V1.8C18 0.81 17.19 0 16.2 0ZM5.4 15.3H2.7V7.2H5.4V15.3ZM4.05 5.67C3.15 5.67 2.43 4.95 2.43 4.05C2.43 3.15 3.15 2.43 4.05 2.43C4.95 2.43 5.67 3.15 5.67 4.05C5.67 4.95 4.95 5.67 4.05 5.67ZM15.3 15.3H12.6V10.53C12.6 9.81004 11.97 9.18 11.25 9.18C10.53 9.18 9.9 9.81004 9.9 10.53V15.3H7.2V7.2H9.9V8.28C10.35 7.56 11.34 7.02 12.15 7.02C13.86 7.02 15.3 8.46 15.3 10.17V15.3Z" fill="currentColor" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)" class="text-grey-700 hover:text-grey-900">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.60063 2.18182H16.3991C19.3873 2.18182 21.8183 4.61281 21.8182 7.60074V16.3993C21.8182 19.3872 19.3873 21.8182 16.3991 21.8182H7.60063C4.6127 21.8182 2.18182 19.3873 2.18182 16.3993V7.60074C2.18182 4.61281 4.6127 2.18182 7.60063 2.18182ZM16.3993 20.0759C18.4266 20.0759 20.0761 18.4266 20.0761 16.3993H20.0759V7.60074C20.0759 5.57348 18.4265 3.92405 16.3991 3.92405H7.60063C5.57336 3.92405 3.92405 5.57348 3.92405 7.60074V16.3993C3.92405 18.4266 5.57336 20.0761 7.60063 20.0759H16.3993ZM6.85714 12.0001C6.85714 9.16424 9.16418 6.85714 12 6.85714C14.8358 6.85714 17.1429 9.16424 17.1429 12.0001C17.1429 14.8359 14.8358 17.1429 12 17.1429C9.16418 17.1429 6.85714 14.8359 6.85714 12.0001ZM8.62798 12C8.62798 13.8593 10.1407 15.3719 12 15.3719C13.8593 15.3719 15.372 13.8593 15.372 12C15.372 10.1406 13.8594 8.6279 12 8.6279C10.1406 8.6279 8.62798 10.1406 8.62798 12Z" fill="currentColor" />
                                    <mask id="mask0_3320_6487" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2" y="2" width="20" height="20">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7.60063 2.18182H16.3991C19.3873 2.18182 21.8183 4.61281 21.8182 7.60074V16.3993C21.8182 19.3872 19.3873 21.8182 16.3991 21.8182H7.60063C4.6127 21.8182 2.18182 19.3873 2.18182 16.3993V7.60074C2.18182 4.61281 4.6127 2.18182 7.60063 2.18182ZM16.3993 20.0759C18.4266 20.0759 20.0761 18.4266 20.0761 16.3993H20.0759V7.60074C20.0759 5.57348 18.4265 3.92405 16.3991 3.92405H7.60063C5.57336 3.92405 3.92405 5.57348 3.92405 7.60074V16.3993C3.92405 18.4266 5.57336 20.0761 7.60063 20.0759H16.3993ZM6.85714 12.0001C6.85714 9.16424 9.16418 6.85714 12 6.85714C14.8358 6.85714 17.1429 9.16424 17.1429 12.0001C17.1429 14.8359 14.8358 17.1429 12 17.1429C9.16418 17.1429 6.85714 14.8359 6.85714 12.0001ZM8.62798 12C8.62798 13.8593 10.1407 15.3719 12 15.3719C13.8593 15.3719 15.372 13.8593 15.372 12C15.372 10.1406 13.8594 8.6279 12 8.6279C10.1406 8.6279 8.62798 10.1406 8.62798 12Z" fill="white" />
                                    </mask>
                                    <g mask="url(#mask0_3320_6487)">
                                    </g>
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <p class="text-base font-normal leading-7 text-center text-grey-700">
                            2023 Motion Tailwind CSS Library. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('user-footer.php'); ?>
    <script src="../assets/admin.js"></script>