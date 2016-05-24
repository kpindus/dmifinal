$(document).ready(function(){
    setOnClickHandlersInAlbums();
});

function setOnClickHandlersInAlbums(){
    $(".edit-row").click(function () {
        $parents = $(this).parent().parent();
        var dataRowAlbumId = $('.data-row-id', $parents).text();
        var url = 'AdminAlbums/getRowDataById/' + dataRowAlbumId;
        $.getJSON(url, {
            format: 'json'
        }).done(function (data) {
            tinymce.activeEditor.setContent(data['album_description']);
            $('.header-name').val(data['album_name']);
            $('.data-form').attr('action', 'AdminAlbums/edit/' + dataRowAlbumId);
        }).fail(function () {
            console.log('ERROR');
        });
    });
    $('.cancel-btn').click(function () {
       $('.data-form').attr('action', 'AdminAlbums/add');
    });
}