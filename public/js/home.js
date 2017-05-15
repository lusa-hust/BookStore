$(document).on('click', '.ajax-load-more', function (e) {
    var category_id = $(this).data('category');
    var page = $(this).data('page');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
        url: '/home/more_books/'+ category_id + '/' + page,
    }).done(function (data) {
        data = jQuery.parseJSON(data);
        if (data.hasOwnProperty('html')) {
            // if data has html
            if (data.html) {
                $('.book-list').append(data.html);
            }

        }

        if (data.hasOwnProperty('page')) {
            // if page is set
            if (data.page > page) {
                // set page for load more link
                $('.ajax-load-more').data('page', data.page);
            } else {
                // hide load more link
                $('.load-more').hide();
            }
        }
    })
});