$(document).on('click', '.db-delete-book', function(e) {
	var id = $(this).data('id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


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

$(document).on('click', '#add-book-button', function (e) {
	$("#add-book-form").submit();
});

$(document).on('click', '#edit-book-button', function (e) {
	$("#edit-book-form").submit();
});

$(document).on('click', '.db-edit-book', function(e) {
	var id = $(this).data('id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	$.ajax({
		type: 'GET',
		url: '/book/edit/' + id,
		headers: {
			Accept: 'application/json'
		}		
	}).done(function(data) {
		if (data.hasOwnProperty('html')) {
			$('#app').append(data.html);
			$('#edit-book-modal').modal();
		}
	});
});

$(document).on('hidden.bs.modal', '#edit-book-modal', function (e) {
	$('#edit-book-modal').remove();
});