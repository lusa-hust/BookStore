/**
 * Created by samhv on 5/14/17.
 */
$('.delete-review').on('click', function () {
    // $('#delete-form').attr('action', $(this).data('delete-link'));

    $(this).parent().submit();

});


$('.edit-review').on('click', function () {
    $('#edit-form').attr('action', $(this).data('edit-link'));

    var review = $(this).data('review');
    var vote = $(this).data('vote');

    $('#reviewEditContent').val(review);
    $('#starVoteValueEdit').val(vote);


    $("#starVoteEdit").rateYo({
        numStars: 10,
        maxValue: 10,
        rating: vote,
        onChange: function (rating, rateYoInstance) {

            $("#starVoteValueEdit").val(rating);
            $(this).next().text(rating);

        }
    });
});