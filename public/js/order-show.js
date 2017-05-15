/**
 * Created by samhv on 5/15/17.
 */
$('.delete-orderRow').on('click', function () {
    // $('#delete-form').attr('action', $(this).data('delete-link'));

    $(this).parent().submit();

});





$('.edit-orderRow').on('click', function () {
    // $('#delete-form').attr('action', $(this).data('delete-link'));

    var inputQty = $(this).parent().find($("input.inputQty"));

    inputQty.prop("readonly", false);

    var editSymbol = $(this).parent().find($(".glyphicon"));

    editSymbol.removeClass("glyphicon-edit");
    editSymbol.addClass("glyphicon-ok");
    $(this).addClass("edit-orderRow-ok");
    $(this).removeClass("edit-orderRow");

    $('.edit-orderRow-ok').on('click', function () {
        // $('#delete-form').attr('action', $(this).data('delete-link'));

        $(this).parent().submit();
    });

});


