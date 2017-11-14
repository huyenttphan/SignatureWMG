$(document).ready(function(){
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300 ) {
            $('.scroll-top:hidden').stop(true, true).fadeIn();
        } else {
            $('.scroll-top').stop(true, true).fadeOut();
        }
    });
    $(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:0},"1000");return false})

    });
});