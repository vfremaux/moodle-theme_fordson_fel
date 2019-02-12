if ($('#go-to-bottom').length) {
    var scrollTrigger = 200, // px
        goToBottom = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#go-to-bottom').removeClass('show');
            } else {
                $('#go-to-bottom').addClass('show');
            }
        };
    goToBottom();
    $(window).on('scroll', function () {
        goToBottom();
    });
    $('#go-to-bottom').on('click', function (e) {
        e.preventDefault();
        var fullheight = $('#page-wrapper').height();
        $('html,body').animate({
            scrollTop: fullheight
        }, 700);
    });
}