$(document).ready(function() {
    var path = window.location.href;
    $('li a').each(function() {
        if (this.href === path) {
            $(this).addClass('mm-active');
            $(this).parent('li').parent('.mm-collapse').addClass('mm-show');
            $(this).parent('li').parent('.mm-collapse').parent('li').addClass('mm-active');
        }
    });
});