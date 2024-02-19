<!-- flowbite modules -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/datepicker.min.js"></script>


<!-- validations -->
<!-- <script src="../assets/validation.js"></script> -->
<script src="../assets/user.js"></script>

<!-- sweet alert -->
<script src="../assets/sweetalert.min.js"></script>

<?php if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "Ok",
        });
    </script>
<?php unset($_SESSION['status']);
} ?>

</body>

</html>