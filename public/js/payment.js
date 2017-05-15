/**
 * Created by samhv on 5/15/17.
 */
$('.delete-order').on('click', function () {
    // $('#delete-form').attr('action', $(this).data('delete-link'));

    $(this).parent().submit();

}).hover(function () {
    $(this).parent().parent().parent().css("background-color","#ff8d7c")
}, function () {
    $(this).parent().parent().parent().css("background-color","transparent")
});

$(".clickable-row").click(function () {
    window.location = $(this).data("href");
}).hover(function () {
    $(this).parent().css("background-color","#cfe8ff")
}, function () {
    $(this).parent().css("background-color","transparent")
});