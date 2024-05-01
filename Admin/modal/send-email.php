<div class="modal fade" tabindex="-1" id="send-email-msg" aria-labelledby="send-email-msgLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="send-email-msgLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="email-recepient" style="border: none; margin-bottom:20px">

                <input type="text" class="form-control" id="subject" placeholder="Subject" />
                <br>
                <textarea class="form-control" id="message" rows="3" placeholder="Add a message here"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary confirm-send-email">Send</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '.confirm-send-email', function() {
        const email = $('#email-recepient').val();
        const subject = $('#subject').val();
        const message = $('#message').val();

        console.log(email, subject, message)
        $.ajax({
            url: '../data/admin-handler.php',
            type: 'post',
            data: {
                'send-email': true,
                'email': email,
                'subject': subject,
                'message': message
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    showToast(response.success, 'fa-circle-exclamation');
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
            error: function() {
                showToast('Error: getting data', 'fa-circle-xmark');
                setTimeout(function() {
                        window.location.reload();
                    }, 1500);
            }
        })
    })
</script>