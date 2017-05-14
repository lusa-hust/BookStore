/**
 * Created by samhv on 5/15/17.
 */
$('.delete-order').on('click', function () {
    // $('#delete-form').attr('action', $(this).data('delete-link'));

    $(this).parent().submit();

});

$(".clickable-row").click(function () {
    window.location = $(this).data("href");
}).hover(function () {
    $(this).css("background-color","#cfe8ff")
}, function () {
    $(this).css("background-color","transparent")
});