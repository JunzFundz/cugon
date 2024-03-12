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
    .loader {
        z-index: 9999999999;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #333333;
        transition: opacity 0.75s, visibility 0.75s;
    }

    .loader--hidden {
        opacity: 0;
        visibility: hidden;
    }

    .loader::after {
        content: "";
        width: 80px;
        height: 80px;
        border: 10px solid #dddddd;
        border-top-color: #009578;
        border-radius: 50%;
        animation: loading 0.75s ease infinite;
    }

    @keyframes loading {
        from {
            transform: rotate(0turn);
        }

        to {
            transform: rotate(1turn);
        }
    }
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

    <div class="containernewdiv ">

        <img id="logo-img" src="logo.jpg" alt="">

        <div class="nav-section">

            <h1 class="ml">+63-9319-158-016</h1>
            <h1 class="float-right">About</h1>

            <div class="line"></div>

            <div class="section-child">
                <ul>
                    <li><a id="sign-up" href="#">Home</a></li>
                    <li><a id="sign-up" href="">Gallery</a></li>
                    <li><a href="dist/signup" id="sign-up" target=”_blank”>Sign Up</a></li>
                    <li><a id="sign-up" href="dist/login" target=”_blank”>Log in</a></li>
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

        <div class="form-section">
            <header>Top on the List</header>
            <center>
                <div class="line-buttom"></div>
            </center>
        </div>

        

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>

</html>