$(document).ready(function() {
    $('div.has-dropdown').hover(function() {
        $(this).toggleClass('is-active');
    });

    $('#edit-button').click(function() {
        $(this).hide();
        $('#user-bio').hide();
        $('#open-modal').hide();
        $('#save-button').show();
        $('#edit-bio').show();
    });

    $('.profile-header .image').hover(function() {
        $('#delete-photo, #add-photo').fadeToggle(100);
    });

    $('#add-photo').click(function() {
        $("#file-input").click();
    });

    $('#file-input').change(function() {
        $('#edit-bio').submit();
    });

    $('#open-modal').click(function() {
        $('.modal').addClass('is-active');
    });

    $('.close-modal').click(function() {
        $('.modal').removeClass('is-active');
    });

    $('.navbar-burger').click(function(){
        $('.navbar-menu').toggleClass('is-active');
    });
});
