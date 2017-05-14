$(document).on('click', '.db-delete-book', function(e) {
	var id = $(this).data('id');
	$.ajax({
		type: 'GET',
		url: '/dashboard/book/delete/' + id,
		contentType: "application/x-www-form-urlencoded; charset=UTF-8"
	}).done(function(data) {
		data = jQuery.parseJSON(data);
		if (data.hasOwnProperty('state') && data.state) {
			$("#book_"+id).hide();
		}
	});
});