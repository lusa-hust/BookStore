$(document).on('click', '.user-delete-button', function(e) {
	var id = $(this).data('id');
	$.ajax({
		type: 'GET',
		url: '/dashboard/user/delete/' + id,
		contentType: "application/x-www-form-urlencoded; charset=UTF-8",
		headers: {
			Accept: 'application/json'
		}
	}).done(function(data) {
		if (data.hasOwnProperty('state') && data.state) {
			$("#user_"+id).hide();
		}
	});
});