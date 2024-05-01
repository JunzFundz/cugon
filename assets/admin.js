var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
})

$(document).ready(function () {

    $('#myTable').DataTable();

    $(document).on('click', '.get-records', function (e) {
        e.preventDefault();
        var userID = $(this).data('user-id');
        var tNumber = $(this).data('t_number');

        console.log(userID, tNumber);

        $.ajax({
            url: '../data/admin-view-records.php',
            type: 'post',
            data: {
                'check_records': true,
                'userID': userID,
                't_number': tNumber,
            },
            success: function (response) {
                $('.modal-body').html(response);
                $('#show-records-data').modal('show');
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Error: getting data');
            }
        });
    });

    $('#dashboard-ii').on('click', function (event) {
        event.preventDefault();
        $('.main').load('dashboard.php');
    });

    function filterContent(activity) {
        $('#change--content table tbody tr').each(function () {
            var rowActivity = $(this).find('.view--time').data('activity');

            if (activity === 'All' || activity === rowActivity) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

    $('.dropdown-menu a.dropdown-item').click(function (e) {
        e.preventDefault();

        var selectedOption = $(this).text();
        $('.dropdown-toggle').text(selectedOption);

        filterContent(selectedOption);
    })
    filterContent('All');
});

$(document).ready(function () {

    //! change password
    $('#change--pass--form').on('submit', function (e) {
        e.preventDefault();

        const old_pass = $('#old_pass').val();
        const id = $('#uid').val();
        const new_pass = $('#new_pass').val();
        const re_pass = $('#re_pass').val();

        console.log(old_pass, new_pass, re_pass)

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: {
                'save--auth': true,
                'user_id': id,
                'old_pass': old_pass,
                'new_pass': new_pass,
                're_pass': re_pass
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    showToast(response.success, 'fa-circle-exclamation');
                } else if (response.error) {
                    showToast(response.error, 'fa-circle-xmark');
                }
            },
            error: function (xhr, status, error) {
                showToast(response.error, 'fa-circle-xmark');
            }

        });
    });

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

    //! remove comment
    $('.remove-comment--').on('click', function () {
        const id = $(this).data('rate-id');
        console.log(id)
        $.ajax({
            url: '../data/admin-handler.php',
            type: 'post',
            data: {
                'remove-comment': true,
                'rate-id': id
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    showToast(response.success, 'fa-circle-exclamation');
                } else if (response.error) {
                    showToast(response.error, 'fa-circle-xmark');
                }
            },
            error: function () {
                showToast('Error: getting data', 'fa-circle-xmark');
            }
        })
    })

    //! remove posts
    $('.remove-rating--').on('click', function () {
        const id = $(this).data('rate-id');

        console.log(id)
        $.ajax({
            url: '../data/admin-handler.php',
            type: 'post',
            data: {
                'remove-ratings': true,
                'rate-id': id
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    showToast(response.success, 'fa-circle-exclamation');
                } else if (response.error) {
                    showToast(response.error, 'fa-circle-xmark');
                }
            },
            error: function () {
                showToast('Error: getting data', 'fa-circle-xmark');
            }
        })
    });

    //! Click handler for viewrecords

    function showToast(message, iconClass) {
        $('#text-toast').text(message);
        $('.icon-success').removeClass('fa-circle-check fa-circle-exclamation fa-circle-xmark').addClass(iconClass);

        var toastLiveExample = document.getElementById('liveToast');
        var toast = new bootstrap.Toast(toastLiveExample);
        toast.show();

        setTimeout(function () {
            toast.hide();
        }, 2000);
    }

    $(document).on('click', '.add-type', function (e) {
        e.preventDefault();
        var type = $('#type').val();

        $.ajax({
            url: '../data/admin-handler.php',
            type: 'post',
            data: {
                'submit-type': true,
                'type': type,
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    showToast(response.success, 'fa-circle-exclamation');
                    $('#add-type-modal').modal('hide');
                } else if (response.error) {
                    showToast(response.error, 'fa-circle-xmark');
                }
            },
            error: function () {
                showToast('Error: getting data', 'fa-circle-xmark');
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
                if (response.success) {
                    showToast(response.success, 'fa-circle-exclamation');
                    $('#decline-request').modal('hide');
                } else if (response.error) {
                    showToast(response.error, 'fa-circle-xmark');
                }
            },
            error: function () {
                alert('Error: getting data');
            }
        });
    });

    //! delivered
    $('.set-delivered').on( "click", function() {
        const id = $(this).data('order-id');
        const userid = $(this).data('user-id');

        console.log(id, userid)

        $.ajax({
            url: '../data/admin-approve.php',
            method: 'post',
            data:{
                'setDelivered' : true,
                'orderId' : id,
                'userid' : userid
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    showToast(response.success, 'fa-circle-exclamation');
                } else if (response.error) {
                    showToast(response.error, 'fa-circle-xmark');
                }
            },
            error: function () {
                alert('Error: getting data');
            }
        });
    })

    //!decline 
    $('.decline-btn').on('click', function () {
        const user_id = $('#user_id').val();
        const res_id = $('#res_id').val();
        const res_num = $('#res_num').val();
        const reason = $('input[name="flexRadioDefault"]:checked').val();

        console.log(user_id, res_id, res_num, reason)

        $.ajax({
            url: '../data/admin-decline-request.php',
            type: 'post',
            data: {
                'confirm_decline': true,
                'user_id': user_id,
                'res_id': res_id,
                'res_num': res_num,
                'reason': reason
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    showToast(response.success, 'fa-circle-exclamation');
                    $('#decline-request').modal('hide');
                } else if (response.error) {
                    showToast(response.error, 'fa-circle-xmark');
                }
            },
            error: function () {
                showToast('Error: getting data', 'fa-circle-xmark');
            }
        })
    });

    $('.declineButton').on('click', function () {
        const user_id = $(this).data('user_id');
        const res_id = $(this).data('res_id');
        const res_num = $(this).data('res_num');
        console.log(user_id, res_id, res_num)
        $.ajax({
            url: '../data/admin-decline-request.php',
            type: 'post',
            data: {
                'decline_request': true,
                'user_id': user_id,
                'res_id': res_id,
                'res_num': res_num
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#user_id').val(response.user_id);
                    $('#res_id').val(response.res_id);
                    $('#res_num').val(response.res_num);
                } else {
                    console.error("Error retrieving user_id");
                }
            }
        })
    })

    //! in and out
    $(document).on('click', '.time--in', function (e) {
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

    $(document).on('click', '.time--out', function (e) {
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

    $('#items--').on('click', function () {
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

    $('#view-accounts').on('click', function (event) {
        event.preventDefault();
        $('.main').load('accounts.php', function () {
            sessionStorage.setItem('loadedContent', $('.main').html());
        });
    });

    $('#items-rating').on('click', function (event) {
        event.preventDefault();
        $('.main').load('items-rating.php', function () {
            sessionStorage.setItem('loadedContent', $('.main').html());
        });
    });

    $('#admin-profile').on('click', function (event) {
        event.preventDefault();
        $('.main').load('profile.php', function () {
            sessionStorage.setItem('loadedContent', $('.main').html());
        });
    });

});

// !delete item
function deleteItem(itemID) {
    if (confirm("Confirm removing this item?")) {
        $.ajax({
            url: '../data/admin-delete-item.php',
            type: 'post',
            data: {
                itemID: itemID
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    showToast(response.success, 'fa-circle-exclamation');
                } else if (response.error) {
                    showToast(response.error, 'fa-circle-xmark');
                }
            },
            error: function () {
                showToast(response.error, 'fa-circle-xmark');
            }
        });
    }
}
