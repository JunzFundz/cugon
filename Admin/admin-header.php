<!-- bootsrap -->
<link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- ajax -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- datatables -->
<link rel="stylesheet" href="../node_modules/datatables/media/css/jquery.dataTables.css">
<link rel="stylesheet" href="../node_modules/datatables/media/css/jquery.dataTables.min.css">

<!-- Custom style -->
<link rel="stylesheet" href="../src/Adminhome.css">
<link rel="stylesheet" href="../src/welcome.css">

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>

<!-- datatables -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">

<div class="toast-container position-fixed bottom-0 start-0 p-6 show-toast">
    <div class="toast" id="liveToast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body">
            <div class="d-flex gap-4">
                <span><i class="fa-solid fa-circle-check fa-lg icon-success">&nbsp;&nbsp;</i><span id="text-toast"></span></span>
                <div class="d-flex flex-column flex-grow-1 gap-2">
                    <div class="d-flex align-items-center">
                        <span class="fw-semibold"></span>
                        <button type="button" class="btn-close btn-close-sm ms-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showToast(message, iconClass) {
        $('#text-toast').text(message);
        $('.icon-success').removeClass('fa-circle-check fa-circle-exclamation fa-circle-xmark').addClass(iconClass);

        var toastLiveExample = document.getElementById('liveToast');
        var toast = new bootstrap.Toast(toastLiveExample);
        toast.show();

        setTimeout(function() {
            toast.hide();
        }, 2000);
    }
</script>