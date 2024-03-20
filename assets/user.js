//! inputs option for regular and stay
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('twoDates').style.display = 'none';
    document.getElementById('singleDate').style.display = '';
});

function changeInputs() {
    const twoDates = document.getElementById('twoDates');
    const singleDate = document.getElementById('singleDate');

    if (options.value === 'reg') {
        singleDate.style.display = '';
        twoDates.style.display = 'none';
    } else {
        twoDates.style.display = '';
        singleDate.style.display = 'none';
    }
}

//! show more items
function toggleItems() {
    var remainingItems = document.getElementById('remainingItems');
    var showBtn = document.getElementById('show-btn');

    if (remainingItems.style.display === 'none') {
        remainingItems.style.display = '';
        showBtn.innerText = 'Hide items...';
    } else {
        remainingItems.style.display = 'none';
        showBtn.innerText = 'Show more items...';
    }
}

//! user cancel booking request
function cancelBook(resID) {
    if (confirm("Are you sure you want to cancel this request?")) {
        $.ajax({
            url: '../data/user-cancel.php',
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

$(function () {

    //!save info
    $(document).on('submit', '#informationForm', function (e) {
        e.preventDefault();

        if (submitDetails()) {

            var getUserId = $('#get-userid').val();
            var setName = $('#set-name').val();
            var setEmail = $('#set-email').val();
            var setPhone = $('#set-phone').val();
            var setCity = $('#set-city').val();
            var setBrgy = $('#set-brgy').val();
            var setZip = $('#set-zip').val();
            var setMsg = $('#set-msg').val();

            $.ajax({
                url: $(this).attr('action'),
                type: $(this).attr('method'),
                data: {
                    'set-info': true,
                    'getUserId': getUserId,
                    'setName': setName,
                    'setEmail': setEmail,
                    'setPhone': setPhone,
                    'setCity': setCity,
                    'setBrgy': setBrgy,
                    'setZip': setZip,
                    'setMsg': setMsg
                },
                success: function (data) {
                    var result = JSON.parse(data);
                    if (result) {
                        $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                        $('#alert-text').html("Information saved");

                        setTimeout(function () {
                            $('#alert-box').removeClass('visible').addClass('invisible');
                        }, 1500);

                    }
                },
                error: function (xhr, status, error) {
                    document.write(xhr.responseText);
                }
            });
        }

        return true;
    })

    //!sigle booking
    $('#placedSingleBooking').on('click', function (e) {
        e.preventDefault();

        if (submitDetails()) {

            const get_user_id = $('#get_user_id').val();
            const get_end_date = $('.get_end_date').data('get_end_date');
            const get_reg_date = $('.get_reg_date').data('get_reg_date');
            const get_item_id = $('.get_item_id').data('get_item_id');
            const get_quantity = $('.quantity').data('get_quantity');
            const get_start_date = $('.get_start_date').data('get_start_date');
            const total_in_days = $('.total_in_days').data('total_in_days');
            const get_payment = $('.get_payment').data('get_payment');
            const get_price = $('.get_price').data('get_price');

            $.ajax({
                url: '../data/user-placed-booking.php',
                type: "POST",
                data: {
                    'get-booking': true,
                    'get_user_id': get_user_id,
                    'get_item_id': get_item_id,
                    'get_quantity': get_quantity,
                    'get_price': get_price,
                    'get_payment': get_payment,
                    'total_in_days': total_in_days,
                    'get_reg_date': get_reg_date,
                    'get_start_date': get_start_date,
                    'get_end_date': get_end_date
                },
                success: function (response) {
                    window.location.href = 'home.php';
                },
                error: function (xhr, status, error) {
                    document.write(xhr.responseText);
                }
            });
        }
    });

    //? test
    // $('#placedSingleBookingtest').on('click', function () {

    //     var totalInDays = $('.get-item-info').data('total_in_days');
    //     var getItemId = $('.get-item-info').data('get_item_id');
    //     var userId = $('.get-item-info').data('user_id');
    //     var sellingPrice = $('.get-item-info').data('get_price');
    
    //     console.log('Total in days:', totalInDays);
    //     console.log('Item ID:', getItemId);
    //     console.log('User ID:', userId);
    //     console.log('Selling price:', sellingPrice);
    // });
    

    //!place marked booking
    $('#placedBooking').on("click", function (e) {
        e.preventDefault();

        if (submitDetails()) {

            const dateOptions = $('.dateOptions').val();
            const get_payment = $('.get_payment').data('get_payment');
            const total_in_days = $('.total_in_days').data('total_in_days');
            const get_reg_date = $('.get_reg_date').data('get_reg_date');
            const get_start_date = $('.get_start_date').data('get_start_date');
            const get_end_date = $('.get_end_date').data('get_end_date');

            $('.get_primary_info').each(function () {
                handlePrimaryInfo(get_payment, total_in_days, get_reg_date, get_start_date, get_end_date, dateOptions, this);
            });
        }
    });

    function handlePrimaryInfo(get_payment, total_in_days, get_reg_date, get_start_date, get_end_date, dateOptions, element) {
        const get_item_id = $(element).attr('data-get_id');
        const get_user_id = $(element).attr('data-get_user_id');
        const get_quantity = $(element).attr('data-get_quantity');
        const get_item_price = $(element).attr('data-get_item_price');

        $.ajax({
            url: '../data/user-placed-booking.php',
            type: "POST",
            data: {
                'get-booking': true,

                'get_user_id': get_user_id,
                'get_item_id': get_item_id,
                'get_quantity': get_quantity,
                'get_item_price': get_item_price,

                'get_payment': get_payment,
                'total_in_days': total_in_days,
                'get_reg_date': get_reg_date,
                'get_start_date': get_start_date,
                'get_end_date': get_end_date
            }, success: function () {
                var result = JSON.parse(response);
                var message = result ? "Reservation sent!" : "Failed!";

                $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                $('#alert-text').html(message);

                setTimeout(function () {
                    $('#alert-box').removeClass('visible').addClass('invisible');
                }, 1500);
                window.location.href = 'transactions.php';
            }
        });
    }

    //!notification
    $('.user-notification').on('click', function () {
        const user_id = $(this).data('user_id');
        // console.log(user_id)
        $.ajax({
            url: '../data/user-show-notification.php',
            type: 'post',
            data: {
                'show-notification': true,
                user_id: user_id
            }, success: function (response) {
                $('.notif-modal-body').html(response);
                $('.notif-modal').modal('show');
            }
        })
    })

    //! loop items
    $('.input-quantity').each(function () {
        var quantity = parseInt($(this).val());
        var decrement = $(this).closest('.cart-items').find('.decrement-btn');

        if (quantity <= 1) {
            decrement.prop('disabled', true);
            decrement.css({
                "cursor": "not-allowed",
                "opacity": "30%"
            });
        } else {
            decrement.prop('disabled', false);
        }
    });

    //! decrement-btn
    $('.decrement-btn').click(function () {
        const itemID = $(this).data('item-id');
        const userID = $(this).data('user-id');

        $.ajax({
            url: '../data/user-decrement-quantity.php',
            type: 'post',
            data: {
                "userID": userID,
                "itemID": itemID
            },
            success: function (response) {
                location.reload()
            }
        });
    });

    //! increment-btn
    $('.increment-btn').click(function () {
        const itemID = $(this).data('item-id');
        const userID = $(this).data('user-id');
        $.ajax({
            url: '../data/user-increment-quantity.php',
            type: 'post',
            data: {
                "userID": userID,
                "itemID": itemID
            },
            success: function (response) {
                location.reload()
            }
        });
    });

    //!delete item
    $('.delete--item').on('click', function () {
        const itemId = $(this).data('item--id');
        const userId = $(this).data('user--id');
        // console.log(itemId, userId);
        $.ajax({
            url: '../data/user-delete-cart.php',
            type: 'post',
            data: {
                itemId: itemId,
                userId: userId
            }, success: function () {
                location.reload();
            }
        })
    })

    //! checkbox
    $('.item-checkbox').change(function () {

        let total = 0;
        let items = 0;

        $('.item-checkbox:checked').each(function () {
            total += parseFloat($(this).data('initial'));
        });

        var checkedItemIDs = $('.item-checkbox:checked').map(function () {
            return $(this).data('item-id');
        }).get();

        var checkedItemCount = checkedItemIDs.length;

        $('#total-items-pay').css('opacity', 0);
        setTimeout(function () {
            $('#total-items-pay').text(total.toFixed(2));
            $('#total-items').text(checkedItemCount);
            $('#total-items-pay').css('opacity', 1);
        }, 300);
    });

    //! rating
    var rating_data = 0;
    $(document).on('mouseenter', '.star--rating', function () {
        var rating = $(this).data('rating-star');

        removeStar();

        for (var count = 1; count <= rating; count++) {
            $('#submit--star--rating' + count).addClass('text-yellow-300');
        }
    })

    $(document).on('mouseleave', '.start--rating', function () {
        removeStar();
    })

    $(document).on('click', '.star--rating', function () {
        rating_data = $(this).data('rating-star');
    })

    //!submit review
    $('#submitYourReview').on('click', function (e) {
        e.preventDefault();
        var ratingCaption = $('#rating-caption-text').val();
        var userEmail = $(this).data('user-email');

        var formData = new FormData();

        formData.append('ratingCaption', ratingCaption);
        formData.append('userEmail', userEmail);
        formData.append('ratingData', rating_data);

        var totalFiles = $('#image-array')[0].files.length;

        for (var i = 0; i < totalFiles; i++) {
            var file = $('#image-array')[0].files[i];
            formData.append('photosUpload[]', file);
            // console.log('File', i + 1, ':', file.name);
        }

        // console.log('Rating Data:', rating_data);

        $.ajax({
            url: '../data/user-add-ratings.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                var result = JSON.parse(response);

                if (result.success) {
                    $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                    $('#alert-text').html(result.success);

                    setTimeout(function () {
                        $('#alert-box').removeClass('visible').addClass('invisible');
                        window.location.href = 'home.php';
                    }, 3000);
                } else if (result.error) {
                    $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                    $('#alert-text').html(result.error);

                    setTimeout(function () {
                        $('#alert-box').removeClass('visible').addClass('invisible');
                        if (response) {
                            window.location.href = 'home.php';
                        }
                    }, 3000);
                } else {
                    $('#alert-box').removeClass('invisible').addClass('visible opacity-100');
                    $('#alert-text').html(message);

                    setTimeout(function () {
                        $('#alert-box').removeClass('visible').addClass('invisible');
                        if (result) {
                            window.location.href = 'login.php';
                        }
                    }, 3000);

                }


            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });

});
function removeStar() {
    for (var count = 1; count <= 5; count++) {
        $('#submit--star--rating' + count).removeClass('text-yellow-300');
    }
}

showStarRating();

function showStarRating() {
    $.ajax({
        url: '../data/load-ratings.php',
        method: 'post',
        data: { action: 'load_ratings' },
        dataType: 'JSON',
        success: function (data) {
            $('#average-ratings').text(data.average_rating)
        }
    })
}





