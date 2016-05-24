$(document).ready(function(){
    setOnClickHandlersInNews();
});

function setOnClickHandlersInNews(){
    $(".edit-row").click(function () {
        $parent = $(this).parent().parent();
        var dataRowId = $('.data-row-id', $parent).text();
        var uri = 'AdminNews/getRowDataById/' + dataRowId;
        console.log(uri);
        $.getJSON(uri, {
            format: 'json'
        }).done(function (data) {
            tinymce.activeEditor.setContent(data['new_content']);
            $('.header-name').val(data['new_name']);
            $('.is-main').val(data['new_is_main'] == true ? 1 : 0);
            $('.data-form').attr('action', 'AdminNews/edit/' + dataRowId);
        }).fail(function() {
            console.log( "error" );
        });
    });

    $('.cancel-btn').click(function () {
        $('.data-form').attr('action', 'AdminNews/add')
    });
}