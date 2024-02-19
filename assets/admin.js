
$(document).ready(function() {

    //! Click handler for viewButton
    $(document).on('click', '.viewButton', function () {
        var userID = $(this).data('user_id');
        $.ajax({
            url: '../data/data-views.php',
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

    //! Click handler for tran-view
    var content = sessionStorage.getItem('loadedContent');
    if (content) {
        $('.content-new').html(content);
    }
    $('#tran-view').on('click', function(event) {
        event.preventDefault(); 
        $('.content-new').load('../Admin/transactions.php', function() {
            sessionStorage.setItem('loadedContent', $('.content-new').html());
        });
    });

    //! Click handler for item-view
    var content = sessionStorage.getItem('loadedContent');
    if (content) {
        $('.content-new').html(content);
    }
    $('#item-view').on('click',function(event) {
        event.preventDefault(); 
-
        $('.content-new').load('../Admin/Items.php', function() {
            sessionStorage.setItem('loadedContent', $('.content-new').html());
        });
    });

    //! Click handler for editItem
    $(document).on('click', '.editItem', function(e){
        e.preventDefault();
        var item_id = $(this).closest('.card').find('.item_id').val();
        $.ajax({
            url: '../data/data-edit-item.php',
            type: 'post',
            data: {
                'check_view': true,
                'item_id': item_id,
            },
            success: function (response) {
                $.each(response, function(Key, value){
                    $('#item_id').val(value['i_id']);
                    $('#name').val(value['i_name']);
                    $('#type').val(value['i_type']);
                    $('#old_img').val(value['i_img']);
                    $('#description').val(value['i_desc']);
                    $('#price').val(value['i_price']);
                    $('#quantity').val(value['i_quantity']);
                });
                $('#edit-modal').modal('show');

            },
            error: function () {
                alert('Error: getting data');
            }
        });
    });
});


//! Function for approveReq
function approveReq(resID) {
    if (confirm("Approving this booking request?")) {
        $.ajax({
            url: '../data/data-approve.php',
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
