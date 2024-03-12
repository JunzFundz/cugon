function item_profile(id)
{
	$('#static-modal').modal('show');
	$.ajax({
		url: 'item.php',
		dataType: 'json',
		type: 'post',
		data: {
			id: id
		},
		success: function(event){
			$('.item-name').val(event.name);
		},
		error: function(){
			alert('Error: item_profile L136+');
		}
	});
}

$(document).ready(function() {


	//! button

	//!form
	// $('#checkoutForm').submit(function(e) {
	//     e.preventDefault();
	//     var checkedItemIDs = $('.item-checkbox:checked').map(function() {
	//         return $(this).data('item-id');
	//     }).get();
	//     var startDate = new Date($('#startDate').val());
	//     var endDate = new Date($('#endDate').val());
	//     var singleDate = new Date($('#singleDate').val());

	//     if (options == 'stay') {
	//         var timeDifference = endDate.getTime() - startDate.getTime();
	//         var daysDifference = timeDifference / (1000 * 3600 * 24);
	//     } else {
	//         var daysDifference = 1;
	//     }

	//     var checkedItems = $('.item-checkbox:checked');
	//     var formData = [];

	//     checkedItems.each(function() {
	//         var itemId = $(this).data('item-id');
	//         var userId = $(this).data('user_id');
	//         var price = $(this).data('s_price');

	//         formData.push({
	//             'itemId': itemId,
	//             'userId': userId,
	//             'price': price
	//         });
	//     });

	//     $.ajax({
	//         url: $(this).attr('action'),
	//         type: $(this).attr('method'),
	//         data: {
	//             'checkoutData': formData
	//         }
	//     });

	// });
});
