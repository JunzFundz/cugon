new DataTable('#example');


$(document).ready(function () {
    $('.viewButton').click(function () {
        var userID = $(this).data('user_id');
        $.ajax({
            url: '../data/dViews.php',
            type: 'post',
            data: {
                userID: userID
            },
            success: function (response) {
                $('.modal-body').html(response);
                $('#exampleModal').modal('show');
            },
            error: function () {
                alert('Error: Unable to load user details');
            }
        });
    });
});

function approveReq(resID) {
    if (confirm("Approve kaha ko niya?")) {
        $.ajax({
            url: '../data/dApprove.php',
            type: 'post',
            data: {
                resID: resID
            },
            success: function (response) {
                console.log(response);
                alert('Success');
                location.reload();
            },
            error: function () {
                alert('Error: ');
            }
        });
    }
}
