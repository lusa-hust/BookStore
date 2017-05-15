/**
 * Created by samhv on 5/13/17.
 */

window.rateYo = require('rateyo/src/jquery.rateyo');

$(function () {

    $("#starVote").rateYo({
        numStars: 10,
        maxValue: 10,
        onChange: function (rating, rateYoInstance) {

            $("#starVoteValue").val(rating);
            $(this).next().text(rating);

        }
    });


});