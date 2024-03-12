<!-- flowbite modules -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

<!-- validations -->
<script src="../assets/validation.js"></script>
<script src="../assets/user.js"></script>

<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if (isset($_SESSION['status']) && $_SESSION['status'] != '') { ?>
    <script>
        Swal.fire({
            icon: "<?php echo $_SESSION['status_code']; ?>",
            title: "<?php echo $_SESSION['status']; ?>",
            showConfirmButton: false,
            timer: 3000,
            customClass: {
                icon: 'custom-icon-class',
                popup: 'custom-alert-box',
                title: 'custom-title'
            }
        });
    </script>
<?php unset($_SESSION['status']);
} ?>

</body>

</html>