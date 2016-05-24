$(document).ready(function () {
    $(".select-files-btn").click(function(){
        $("#uploadFile").click();
    });
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'fixedNavigation': false
    })
});