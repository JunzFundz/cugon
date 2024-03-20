<!-- flowbite modules -->
<link href="../node_modules/flowbite/dist/flowbite.css" rel="stylesheet" />

<!-- fontawsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- ajax cdn -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="../src/signup.css">

<div class="opacity-0 invisible" id="alert-box">
    <span class=" text-2xl text-white text-opacity-100" id="alert-text"></span>
</div>

<style>
    .verify-confirm {
        display: grid;
        place-items: center;
        margin: 10px auto 0 auto;
        margin-inline: auto;
        margin-block: 20rem;
    }
</style>

<?php require('../data/verify-signup.php') ?>

<form class="verify-confirm">
    <div class="grid grid-cols-3 gap-4 my-4">
        <div class="relative max-w-sm col-span-2">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            </div>
            <label for="card-expiration-input" class="sr-only">Card expiration date:</label>
            <input type="" id="verification-code" maxlength="4" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pe-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
        </div>
        <div class="col-span-1">
            <button type="submit" id="verify-account" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 verify">Verify</button>
        </div>
    </div>
</form>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="../assets/signup.js"></script>
<script>
    // $(document).ready(function() {

        // $('.verify').click(function(e) {
        //     e.preventDefault();

        //     const code = $('#verification-code').val()
        //     // console.log(code)
        //     $.ajax({
        //         url: '../data/verify-signup.php',
        //         type: 'post',
        //         data: {
        //             'verify': true,
        //             'email': '<?php echo $_GET["email"]; ?>',
        //             'token': '<?php echo $_GET["token"]; ?>',
        //             'code': code
        //         },
        //         success: function(response) {
        //             console.log(response);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error('An error occurred:', error);
        //         }
        //     });

        // })


        // function handleSubmit(event) {
        //     event.preventDefault(); 
        //     if (checkAllInputsFilled()) {
        //         var formData = $('#verification-form').serialize(); 
        //         $.ajax({
        //             url: '../data/verify-signup.php',
        //             type: 'post',
        //             data: formData,
        //             success: function(response) {
        //                 console.log(response); 
        //             },
        //             error: function(xhr, status, error) {
        //                 console.error('An error occurred:', error); 
        //             }
        //         });
        //     }
        // }

    // });
</script>