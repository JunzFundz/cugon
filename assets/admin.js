
$(document).ready(function () {

    //! Click handler for viewButton
    $(document).on('click', '.viewButton', function () {
        var userID = $(this).data('user_id');
        $.ajax({
            url: '../data/admin-view-request.php',
            type: 'post',
            data: {
                "getUserRequest": true,
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

    //! Click handler for editItem
    $(document).on('click', '.editItem', function (e) {
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
                $('#show-records').modal('show');
            },
            error: function () {
                alert('Error: getting data');
            }
        });
    });

    //!decline 
    $('.decline-btn').on('click', function(){
        const id = $(this).data('user_id');
        const reason = $('input[name="flexRadioDefault"]:checked').next('label').text();
        $.ajax({
            url: '../data/admin-decline-request.php',
            type: 'post',
            data: {
                'decline_request' : true ,
                'id': id,
                'reason': reason
            },
            success: function() {
                alert("Request Declined");
                location.reload();
            }
        })
    })
});


//! Function for approveReq
/*function approveReq(resID, userID, itemIDs, itemQS) {
    if (confirm("Approving this booking request?")) {
        var itemIDsArray = itemIDs.split(',').map(Number);
        var itemQuantitiesArray = itemQuantities.split(',').map(Number);
        for (var i = 0; i < itemIDsArray.length; i++) {
            var itemID = itemIDsArray[i].trim();
            var itemQuantity = itemQS[itemID];  

            if (itemQuantity === undefined) {
                console.log("Error: Item ID " + itemID + " not found in itemQS object.");
            } else {
                console.log("Item ID: " + itemID + ", Quantity: " + itemQuantity);
            }
        }
        $.ajax({
            url: '../data/admin-approve.php',
            type: 'post',
            data: {
                resID: resID,
                userID: userID
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
}*/

//!test
function approveReq(resID, userID, itemIDs, itemQuantities) {
    var itemIDsArray = itemIDs.split(',').map(Number);
    var itemQuantitiesArray = itemQuantities.split(',').map(Number);
    var itemQS = {};

    for (var i = 0; i < itemIDsArray.length; i++) {
        itemQS[itemIDsArray[i]] = itemQuantitiesArray[i];
    }
    for (var i = 0; i < itemIDsArray.length; i++) {
        var itemID = itemIDsArray[i].toString().trim();
        var itemQuantity = itemQS[itemID];

        if (itemQuantity === undefined) {
            console.log("Error: Item ID " + itemID + " not found in itemQS object.");
        } else {
            console.log("Item ID: " + itemID + " Quantity: " + itemQuantity);
        }
    }
    $.ajax({
        url: '../data/admin-approve.php',
        type: 'post',
        data: {
            resID: resID,
            userID: userID,
            itemIDs: itemIDs,
            itemQuantities: itemQuantities
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

function deleteItem(itemID) {
    if (confirm("Confirm delete?")) {
        $.ajax({
            url: '../data/admin-delete-item.php',
            type: 'post',
            data: {
                itemID: itemID
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
