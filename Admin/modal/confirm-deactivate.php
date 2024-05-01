<div class="modal fade" id="deactivate-account" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6 id="uid"></h6>
                <h6 id="username"></h6>
                <h6 id="email"></h6>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-subtle" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger confirm-deactivate">Confirm</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.confirm-deactivate').on("click", function() {
            const uid = $('#uid').text();

            console.log(uid)

            $.ajax({
                url: '../data/admin-handler.php',
                type: 'post',
                data: {
                    'confirm-deactivate': true,
                    'uid': uid
                },
                dataType: 'json',
                success: function(response) {
                    if (response.message) {
                        showToast(response.message, 'fa-circle-exclamation');
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    } else if (response.error) {
                        showToast(response.error, 'fa-circle-xmark');
                        setTimeout(function() {
                            window.location.reload();
                        }, 1500);
                    }
                },
                error: function(xhr) {
                    showToast(response.xhr.statusText, 'fa-circle-xmark');
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);
                }
            })
        });
    })
</script>