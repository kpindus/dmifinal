$(document).ready(function () {
    tinymce.init({
        selector: '.content_body',
        height: '400px',
        plugins: [
            'advlist autolink lists link image charmap preview anchor',
            'visualblocks code fullscreen',
            'media contextmenu paste code'
        ],
        toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    });
    setClickHandlers();
});

function setClickHandlers() {

     $('li', '.nav-sidebar').click(function () {
        $('.active', '.nav-sidebar').removeClass('active');
        $(this).toggleClass('active');
    });

    $('.add-btn').on('click', function () {
        $('.add-edit-block').css('visibility', 'visible');
        $('.add-edit-block').show();
        $('.edit-row').hide();
    });

    $('.edit-row').click(function () {
        $('.add-edit-block').css('visibility', 'visible');
        $('.add-edit-block').show();
        $('.add-btn').hide();
    });

    $('.cancel-btn').click(function () {
        tinymce.activeEditor.setContent('');
        $('.header-name').val('');
        $('.add-edit-block').hide();
        $('.add-btn').show();
        $('.edit-row').show();
    });
}



