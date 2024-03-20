<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/output.css">
    <link rel="stylesheet" href="src/index.css">
    <link rel="stylesheet" href="src/grids.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Cugon</title>
</head>

<style>

</style>
<script>
    window.addEventListener("load", () => {
        const loader = document.querySelector(".loader");
        loader.classList.add("loader--hidden");

        loader.addEventListener("transitionend", () => {
            document.body.removeChild(loader);
        });
    });
</script>

<body>

    <div class="loader"></div>
    <div class="containernewdiv">

        <div class="nav-section">
        <img id="logo-img" src="images/logo.jpg" alt="">
            <h1 class="ml">+63-9319-158-016</h1>
            <a href="" class="float-right cursor-pointer hover:text-blue-600">About</a> 

            <div class="line"></div>

            <div class="section-child">
                <ul>
                    <li><a id="sign-up" href="#">Home</a></li>
                    <li><a id="sign-up" href="">Gallery</a></li>
                    <li><a href="dist/signup" id="sign-up">Sign Up</a></li>
                    <li><a id="sign-up" href="dist/login">Log in</a></li>
                </ul>
            </div>
        </div>

        <div class="background-style">
            <div class="body-section">
                <ul>
                    <li>
                        <h1>Cugon Bamboo Resort</h1>
                    </li>
                    <br>
                    <li><button id="button-new" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Explore more</button></li>
                </ul>

            </div>
        </div>

        <div class="offers-body">

            <section class="offers">
                <header>Top Offers</header>
                <span>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic commodi adipisci asperiores, minima saepe vero ducimus cum! Dignissimos dolorem asperiores ad perspiciatis ipsum ut rerum, commodi laboriosam velit sed error.
                </span>
            </section>

            <main class="offers-items">
                <section class="one">
                    <img src="https://scontent.fceb1-1.fna.fbcdn.net/v/t39.30808-6/431036520_813139584163952_5266956927940096735_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeFrTs4W0w4wN_wUf1gSWL6mBErxTIIYl_kESvFMghiX-XIgQy26Rl9CXsNqLplk3zdSkoJk0WiA_6Uzqln_8SEl&_nc_ohc=pg_54cKwwWEAX_moNQt&_nc_ht=scontent.fceb1-1.fna&oh=00_AfASFkAvZlfMRtTABl-_zOVApLP-V0oPzFUH6ZSiCk4r2w&oe=65F94320" alt="">
                    <span>
                        Lorem ipsum dolor sit amet.
                    </span>
                </section>

                <section class="two">
                    <img src="https://images.pexels.com/photos/20528016/pexels-photo-20528016/free-photo-of-silhouette-of-woman-walking-along-seashore-at-dawn.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
                    <span>
                        Lorem ipsum dolor sit amet.
                    </span>
                </section>

                <section class="three">
                    <img src="https://images.pexels.com/photos/20400720/pexels-photo-20400720/free-photo-of-a-beach-with-a-boat-on-the-shore-at-sunset.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" alt="">
                </section>

                <section class="four">
                    <img src="https://images.pexels.com/photos/20522460/pexels-photo-20522460/free-photo-of-a-snowy-landscape-with-mountains-in-the-background.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
                </section>
                <section class="five">
                    <img src="https://images.pexels.com/photos/20015800/pexels-photo-20015800/free-photo-of-a-squirrel-sitting-on-a-tree-branch-with-its-eyes-open.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
                </section>

                <section class="six">
                    <img src="https://images.pexels.com/photos/19989958/pexels-photo-19989958/free-photo-of-a-view-of-the-sky-from-above-a-forest.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" alt="">
                </section>

                <section class="seven">
                    <img src="https://images.pexels.com/photos/20496825/pexels-photo-20496825/free-photo-of-house-on-the-lake.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
                </section>

                <section class="eight">
                    <img src="https://images.pexels.com/photos/20404044/pexels-photo-20404044/free-photo-of-a-bedroom-with-a-bed-a-window-and-a-door.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load" alt="">
                </section>
            </main>

            <div class="company-testimony">

                <div class="img-section">
                    <img src="https://images.pexels.com/photos/261204/pexels-photo-261204.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="">
                </div>

                <div class="message">
                    <div>
                        <h5 class=" font-semibold italic">Name : Jhon Doe</h5>
                        <span>Company Name: ABC Co.</span>

                        <section class="">
                            <section>
                                “I have been working with this company for a few months now and I must say it has been an incredible experience.
                            </section>
                            <section>
                                “I have been working with this company for a few months now and I must say it has been an incredible experience.
                                “I have been using this product for a few months now and I can confidently say that it has made my business thrive.
                            </section>
                        </section>
                    </div>
                </div>
            </div>

            <div class="business">
                <section class="bg-white dark:bg-gray-900">
                    <div class="gap-8 items-center py-8 px-4 mx-auto max-w-screen-xl xl:gap-16 md:grid md:grid-cols-2 sm:py-16 lg:px-6">
                        <img class="w-full dark:hidden" src="https://images.pexels.com/photos/225502/pexels-photo-225502.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="dashboard image">
                        <img class="w-full hidden dark:block" src="https://images.pexels.com/photos/225502/pexels-photo-225502.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" alt="dashboard image">
                        <div class="mt-4 md:mt-0">
                            <h2 class="business-title">Let's create more tools and ideas that brings us together.</h2>
                            <p class="mb-6 font-light text-gray-500 md:text-lg dark:text-gray-400">Connect with us with full of exciting promos Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus nulla fugit facere quas? Dolorem laboriosam debitis labore fugiat aliquam vitae aperiam quasi, necessitatibus culpa veritatis ratione, quas delectus quos aspernatur.</p>

                            <a href="#" class="inline-flex items-center text-black bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900">
                                <button class="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
                                    </svg>
                                    <div class="text">
                                        Visit
                                    </div>
                                </button>
                            </a>

                        </div>
                    </div>
                </section>
            </div>

            <div class="footer">
                <footer class="p-4  sm:p-6 dark:bg-gray-800">
                    <div class="mx-auto max-w-screen-xl">
                        <div class="md:flex md:justify-between">
                            <div class="mb-6 md:mb-0">
                                <a href="https://www.facebook.com/eniego.jabagat.10" class="flex items-center">
                                    <img src="images/logo.jpg" class="mr-3 h-8" alt="FlowBite Logo" class=" text-white" style="border-radius: 50%;"/>
                                    <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Cugon Bamboo Resort</span>
                                </a>
                            </div>
                            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                                <div>
                                    <h2 class="mb-6 text-sm font-semibold text-white uppercase dark:text-white">Follow us</h2>
                                    <ul class="text-white dark:text-gray-400">
                                        <li class="mb-4">
                                            <a href="https://www.facebook.com/eniego.jabagat.10" class="hover:underline ">Facebook</a>
                                        </li>
                                        <li>
                                            <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Youtube</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h2 class="mb-6 text-sm font-semibold text-white uppercase dark:text-white">Legal</h2>
                                    <ul class="text-white dark:text-gray-400">
                                        <li class="mb-4">
                                            <a href="#" class="hover:underline">Privacy Policy</a>
                                        </li>
                                        <li>
                                            <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
                        <div class="sm:flex sm:items-center sm:justify-between">
                            <span class="text-sm text-white sm:text-center dark:text-gray-400">© 2022 <a href="#" class="hover:underline">CugonCorp</a>. All Rights Reserved.
                            </span>
                            <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                                <a href="https://www.facebook.com/eniego.jabagat.10" class="text-white hover:text-white dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                <a href="https://www.instagram.com/explore/locations/100715478605862/cugon-resort/" class="text-white hover:text-white dark:hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>


        </div>



    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>

</html>