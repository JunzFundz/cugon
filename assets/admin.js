$(document).ready(function () {

    //! Click handler for viewButton
    $(document).on('click', '.viewButton', function () {
        const userID = $(this).data('user_id');
        const resID = $(this).data('res_id');
        const itemID = $(this).data('item_id');

        console.log(userID, resID, itemID);
        $.ajax({
            url: '../data/admin-view-request.php',
            type: 'post',
            data: {
                "getUserRequest": true,
                'userID': userID,
                'resID': resID,
                'itemID': itemID,
            },
            success: function (response) {
                $('.modal-body').html(response);
                $('#modal-request-view').modal('show');
            },
            error: function () {
                alert('Error: Unable to load user details');
            }
        });
    });

    //! Click handler for editItem
    $(document).on('click', '.editItem', function (e) {
        e.preventDefault();
        var item_id = $(this).data('item_id');

        console.log(item_id)
        $.ajax({
            url: '../data/data-items.php',
            type: 'post',
            data: {
                'check_view': true,
                'item_id': item_id,
            },
            success: function (response) {
                $.each(response, function (Key, value) {
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

    //! Click handler for viewrecords
    $(document).on('click', '.get-records', function (e) {
        e.preventDefault();
        var userID = $(this).data('user_ID');
        $.ajax({
            url: '../data/admin-view-records.php',
            type: 'post',
            data: {
                'check_records': true,
                'userID': userID,
            },
            success: function (response) {
                $('.modal-body').html(response);
                $('#show-records-data').modal('show');
            },
            error: function () {
                alert('Error: getting data');
            }
        });
    });

    // !approve btn
    $(document).on('click', '.approval-request', function (e) {
        e.preventDefault();
        const userID = $(this).data('user_id');
        const resID = $(this).data('res_id');
        const itemID = $(this).data('item_id');
        const item = $(this).data('item_name');
        const resNumber = $(this).data('res_num');
        const total = $(this).data('total_amount');
        const date = $(this).data('date');
        const quantity = $(this).data('quantity');

        // console.log(quantity)

        $.ajax({
            url: '../data/admin-approve.php',
            type: 'post',
            data: {
                'approve_request': true,
                'userID': userID,
                'resID': resID,
                'itemID': itemID,
                'item_name': item,
                'resNumber': resNumber,
                'quantity': quantity,
                'total': total,
                'date': date
            },
            success: function (response) {
                location.reload();
            },
            error: function () {
                alert('Error: getting data');
            }
        });
    });

    //!decline 
    $('.decline-btn').on('click', function () {
        const id = $(this).data('user_id');
        const reason = $('input[name="flexRadioDefault"]:checked').next('label').text();

        console.log(id)
        $.ajax({
            url: '../data/admin-decline-request.php',
            type: 'post',
            data: {
                'decline_request': true,
                'id': id,
                'reason': reason
            },
            success: function () {
                alert("Request Declined");
                location.reload();
            }
        })
    })

    //! in and out
    $(document).on('click', '.time--in', function(e){
        e.preventDefault();

        const userId = $(this).data('user_id');
        const tNumber = $(this).data('t_number');
        const rNumber = $(this).data('res_number');

        console.log(userId, tNumber, rNumber);

        $.ajax({
            url: '../data/admin-transactions.php',
            type: 'post',
            data: {
                'time_in': true,
                'user_id': userId,
                't_number': tNumber, 
                'r_number': rNumber
            }
        })
    });

    $(document).on('click', '.time--out', function(e){
        e.preventDefault();

        const userId = $(this).data('user_id');
        const tNumber = $(this).data('t_number');
        const rNumber = $(this).data('res_number');

        console.log(userId, tNumber, rNumber);

        $.ajax({
            url: '../data/admin-transactions.php',
            type: 'post',
            data: {
                'time_out': true,
                'user_id': userId,
                't_number': tNumber, 
                'r_number': rNumber
            }
        })
    });

    //! contents
    $('#myTable').DataTable();

    var content = sessionStorage.getItem('loadedContent');
    if (content) {
        $('.main').html(content);
    }

    $('#booking-requests').on('click', function () {
        $('.main').load('requests.php', function () {
            sessionStorage.setItem('loadedContent', $('.main').html());
        });
    });

    $('#transactions').on('click', function () {
        $('.main').load('transactions.php', function () {
            sessionStorage.setItem('loadedContent', $('.main').html());
        });
    });

    $('#items').on('click', function () {
        $('.main').load('items.php', function () {
            sessionStorage.setItem('loadedContent', $('.main').html());
        });
    });
    
    $('#ratings').on('click', function () {
        $('.main').load('ratings.php', function () {
            sessionStorage.setItem('loadedContent', $('.main').html());
        });
    });

    $('#reports').on('click', function () {
        $('.main').load('reports.php', function () {
            sessionStorage.setItem('loadedContent', $('.main').html());
        });
    });

    $('#dashboard').on('click', function (event) {
        event.preventDefault();
        $('.main').load('dashboard.php');
        sessionStorage.setItem('loadedContent', $('.main').html());
    });

});

// !delete item
function deleteItem(itemID) {
    if (confirm("Confirm delete?")) {
        $.ajax({
            url: '../data/admin-delete-item.php',
            type: 'post',
            data: {
                itemID: itemID
            },
            success: function (response) {
                alert('Success');
                location.reload();
            },
            error: function () {
                alert('Error: ');
            }
        });
    }
}
