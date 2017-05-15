$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'GET',
        url: $('meta[name="subscribe-not-href"]').attr('content'),
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        headers: {
            Accept: 'application/json'
        }
    }).done(function (data) {

        console.log(data);

        if (data.hasOwnProperty('status')) {

            if (data.status) {
                $(".notification").addClass("glyphicon-ok").removeClass("notification");
            }


        }

    });

});