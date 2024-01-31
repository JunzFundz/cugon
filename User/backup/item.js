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