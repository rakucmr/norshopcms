$(function(){
    $('.icon').click(function() {
        var src = $(this).attr('src');
        $('#main_icon img').attr('src', src);
        $('#main_icon a').attr('href', src);
    });
});