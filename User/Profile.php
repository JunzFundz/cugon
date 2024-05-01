<?php
session_start();
if (strlen($_SESSION['user_id'] == 0)) {
    header('location: ../database/logout.php');
} else {
include('user-header.php');
include('navigation.php');
include('../data/user-load-info.php');
?>

<title>Profile</title>

<header class="antialiased">
    <nav class=" px-4 lg:px-8 py-8">
        <div class="flex flex-wrap justify-center items-center">
            <div class="flex items-center text-center lg:order-2">
                <!-- Apps -->
                <button type="button" data-dropdown-toggle="apps-dropdown" class="p-4 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
                    <span class="sr-only">View notifications</span>
                    <!-- Icon -->
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:bg-gray-700 dark:divide-gray-600" id="apps-dropdown">
                    <div class="block py-2 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        Apps
                    </div>
                    <div class="grid grid-cols-3 gap-4 p-4">
                        <a href="info-page.php?user_id=<?php echo $user_id ?>&&email=<?php echo $_SESSION['email']; ?>" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                            <div class="text-sm font-medium text-gray-900 dark:text-white">Information</div>
                        </a>
                        <a href="items.php?userId=<?php echo $user_id; ?>" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                                <path d="M19 0H1a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1ZM2 6v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6H2Zm11 3a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8a1 1 0 0 1 2 0h2a1 1 0 0 1 2 0v1Z" />
                            </svg>
                            <div class="text-sm font-medium text-gray-900 dark:text-white">Products</div>
                        </a>
                        <a href="transactions.php?userId=<?php echo $user_id; ?>" class="block p-4 text-center rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 group">
                            <svg class="mx-auto mb-2 w-5 h-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-400 dark:group-hover:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                <path d="M7 11H5v1h2v-1Zm4 3H9v1h2v-1Zm-4 0H5v1h2v-1ZM5 5V.13a2.98 2.98 0 0 0-1.293.749L.88 3.707A2.98 2.98 0 0 0 .13 5H5Z" />
                                <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM13 16a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v6Zm-1-8H9a1 1 0 0 1 0-2h3a1 1 0 1 1 0 2Zm0-3H9a1 1 0 0 1 0-2h3a1 1 0 1 1 0 2Z" />
                                <path d="M11 11H9v1h2v-1Z" />
                            </svg>
                            <div class="text-sm font-medium text-gray-900 dark:text-white">Receipts</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>


<div class="antialiased bg-gray-50 dark:bg-gray-900">

    <main class="p-4 md:ml-64 h-auto">

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-4 mb-4">
            <div class=" dark:border-gray-600 h-96 md:h-64" style="overflow: auto;">
                <div class="space-y-4 py-6 md:py-8 history--">
                    <span class="text-xl font-semibold text-gray-900 dark:text-white ">History</span>
                </div>
                <?php foreach ($res as $row) {
                    $status = htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8');
                    $itemName = htmlspecialchars($row['item_name'], ENT_QUOTES, 'UTF-8');
                    $resNumber = htmlspecialchars($row['res_number'], ENT_QUOTES, 'UTF-8');

                    $createdAt = new DateTime($row['created_at']);
                    $now = new DateTime();
                    $interval = $createdAt->diff($now);

                    if ($interval->days > 0) {
                        $timeDiff = $interval->days . " day" . ($interval->days > 1 ? "s" : "") . " ago";
                    } elseif ($interval->h > 0) {
                        $timeDiff = $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
                    } elseif ($interval->i > 0) {
                        $timeDiff = $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
                    } else {
                        $timeDiff = "just now";
                    }
                ?>
                    <div class="space-y-4 py-5 md:py-8">
                        <div class="grid gap-4">
                            <div>
                                <span class="inline-block rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 md:mb-0"><?= $status ?></span>
                            </div>

                            <a href="#" class="text-xl font-semibold text-gray-900 hover:underline dark:text-white"><?= $itemName ?></a>
                        </div>
                        <span class="text-sm font-normal text-gray-500 dark:text-gray-400"><?= $timeDiff ?></span>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400"><?= $resNumber ?></p>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            <?= $timeDiff ?>
                        </p>
                    </div>
                <?php } ?>
            </div>

            <div class="dark:border-gray-600 h-96 md:h-64" style="overflow: auto;">
                <div class="space-y-4 py-6 md:py-8 rate--">
                    <span class="text-xl font-semibold text-gray-900 dark:text-white ">Ratings</span>
                </div>
                <?php foreach ($item as $row) { ?>
                    <div class="space-y-4 py-6 md:py-8">
                        <div class="grid gap-4">
                            <div>
                                <span class="inline-block rounded bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800 dark:bg-green-900 dark:text-green-300 md:mb-0"><?= $row['date_posted'] ?></span>
                            </div>

                            <a href="#" class="text-xl font-semibold text-gray-900 hover:underline dark:text-white">“<?= $row['quality'] ?>”</a>
                        </div>
                        <p class="text-base font-normal text-gray-500 dark:text-gray-400"><?= $row['comments'] ?></p>

                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            <a href="get-item.php?i_id=<?= $row['item_id'] ?>" class="text-gray-900 hover:underline dark:text-white">See comment</a>
                        </p>
                    </div>
                <?php } ?>
            </div>

        </div>

        <div class="border-2 border-gray-300 dark:border-gray-600 h-auto mb-4">
            <div class="dark:border-gray-600 h-auto md:h-64">
                <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
                    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                        <div class="mx-auto max-w-5xl">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Cugon Bamboo Resort Overview</h2>
                            <div class="my-8 xl:mb-16 xl:mt-12">
                                <img class="w-full dark:hidden" src="../images/cover.jpg" alt="Cugon Bamboo Resort" />
                                <img class="hidden w-full dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-showcase-dark.svg" alt="" />
                            </div>
                            <div class="mx-auto max-w-2xl space-y-6">
                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">The Cugon Bamboo Resort offers a serene and eco-friendly retreat nestled amidst lush bamboo forests. Designed with sustainability in mind, the resort provides guests with a unique experience of living harmoniously with nature.</p>

                                <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                                    This resort features bamboo cottages and villas, each meticulously crafted to blend seamlessly with the surrounding environment. Guests can enjoy breathtaking views of the bamboo forest, while indulging in modern amenities and comforts.
                                </p>

                                <p class="text-base font-semibold text-gray-900 dark:text-white">Key Features and Benefits:</p>
                                <ul class="list-outside list-disc space-y-4 pl-4 text-base font-normal text-gray-500 dark:text-gray-400">
                                    <li>
                                        <span class="font-semibold text-gray-900 dark:text-white"> Sustainable Bamboo Architecture: </span>
                                        Experience the beauty of sustainable architecture with our bamboo cottages and villas. Each structure is designed to minimize environmental impact while maximizing comfort and aesthetics.
                                    </li>
                                    <li>
                                        <span class="font-semibold text-gray-900 dark:text-white"> Serene Natural Surroundings: </span>
                                        Immerse yourself in the tranquility of nature. The resort is surrounded by lush bamboo forests, providing a peaceful and rejuvenating atmosphere for guests.
                                    </li>

                                    <li>
                                        <span class="font-semibold text-gray-900 dark:text-white"> Eco-Friendly Practices: </span>
                                        At Cugon Bamboo Resort, we are committed to sustainability. From solar-powered energy to organic farming practices, we strive to minimize our ecological footprint.
                                    </li>

                                    <li>
                                        <span class="font-semibold text-gray-900 dark:text-white"> Wellness and Relaxation: </span>
                                        Indulge in holistic wellness experiences at our on-site spa. From rejuvenating massages to yoga sessions amidst nature, we offer a range of wellness activities to help you relax and unwind.
                                    </li>

                                    <li>
                                        <span class="font-semibold text-gray-900 dark:text-white"> Local Cuisine: </span>
                                        Savor the flavors of authentic local cuisine at our restaurant. Using fresh and organic ingredients sourced from our own farm, our chefs create delicious and nutritious meals that cater to all dietary preferences.
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <div class=" h-auto " style="overflow: auto;">
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
        </div>

    </main>
</div>


<script>
    $(document).ready(function() {
        $.ajax({
            url: '../data/test.php',
            method: 'POST',
            data: {
                users_id: <?php echo $_SESSION['user_id']; ?>
            },
            dataType: 'json',
            success: function(response) {
                $('#set-name').val(response.full_name);
                $('#set-email').val(response.email);
                $('#set-phone').val(response.phone);
                $('#set-city').val(response.city);
                $('#set-brgy').val(response.brgy);
                $('#set-zip').val(response.zip_code);
                $('#set-msg').val(response.message);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    })
</script>
<?php include('user-footer.php') ?>    
<?php } ?>