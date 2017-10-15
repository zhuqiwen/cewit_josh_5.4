$(document).on('click', '.caret-more-details', function () {
    var row = $(this).parent('.parent_row');
    if (row.next('.child_row').css('display') == 'table-row')
    {
        row.next('.child_row').hide();
        $(this).children('[data-name="caret-down"]').hide();
        $(this).children('[data-name="caret-right"]').show();

    }
    else
    {
        row.next('.child_row').show();

        $(this).children('[data-name="caret-right"]').hide();
        $(this).children('[data-name="caret-down"]').show();

    }
});