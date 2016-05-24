$(document).ready(function(){
    setOnClickHandlers();
});

function setOnClickHandlers(){
    $(".edit-row").click(function () {
        var url = 'AdminAboutUs/getDataForEdit';

        $.getJSON(url, {
            format: 'json'
        }).done(function (data) {
            tinymce.activeEditor.setContent(data['content']);
        });
    });
}