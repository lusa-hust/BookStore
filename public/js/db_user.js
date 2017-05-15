$(document).on('click', '.user-delete-button', function(e) {
	var id = $(this).data('id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


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

$(document).on('click', '.user-edit-button', function(e) {
	var id = $(this).data('id');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
		type: 'GET',
		url: '/dashboard/user/edit/' + id,
		headers: {
			Accept: 'application/json'
		}		
	}).done(function(data) {
		if (data.hasOwnProperty('html')) {
			$('#app').append(data.html);
			$('#edit-user-modal').modal();
		}
	});
});

$(document).on('hidden.bs.modal', '#edit-user-modal', function (e) {
	$('#edit-user-modal').remove();
});

$(document).on('click', '#edit-user-button', function (e) {
	$("#edit-user-form").submit();
});