$(function(){


	// ==================================================
	// スムーススクロール
	// ==================================================
	$('a.smooth[href^=#]').on('click', function(){
			var $_this = $(this);
			var $speed = 500;
			var $href= $(this).attr("href");
			var $target = $($href == "#" || $href == "" ? 'html' : $href);
			var position = $target.offset().top;

            var menuHeight = $('.l-site-header').height();

				position = position - menuHeight;

			$("html, body").animate({scrollTop:position}, $speed, "swing");
			return false;
	});

	setKVHeight();
	$(window).resize(function(){
		setKVHeight();
	});

	// $('#js-hero-btn').on('click', function(){
	// 	var scrollHeight = $('.l-top-clients').offset().top - $('.l-site-header').height();
	// 	jQuery('html, body').animate({scrollTop:scrollHeight}, $speed, 'swing');
	// });

});	//document ready

// ==================================================
	// nav bar hamburger
	// ==================================================

  function is_touch_device() {
  if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
    return true
  } else {
    return false;
  }
//  return (('ontouchstart' in window)
//       || (navigator.MaxTouchPoints > 0)
//       || (navigator.msMaxTouchPoints > 0));
}
function removeIOSRubberEffect(el) {
    el.addEventListener('touchstart', function() {
        var top = el.scrollTop
            , totalScroll = el.scrollHeight
            , currentScroll = top + el.offsetHeight

        //If we're at the top or the bottom of the containers
        //scroll, push up or down one pixel.
        //
        //this prevents the scroll from "passing through" to
        //the body.
        if(top === 0) {
            el.scrollTop = 1
        } else if(currentScroll === totalScroll) {
            el.scrollTop = top - 1
        }
    })

    el.addEventListener('touchmove', function(evt) {
        //if the content is actually scrollable, i.e. the content is long enough
        //that scrolling can occur
        if(el.offsetHeight < el.scrollHeight) evt._isScroller = true;
        // else
            else evt._isScroller = false;
    })
    //
    document.body.addEventListener('touchmove', function(evt) {
        //In this case, the default behavior is scrolling the body, which
        //would result in an overflow.  Since we don't want that, we preventDefault.
        if(evt._isScroller === false) {
            evt.preventDefault()
        }
    })
}

$(document).ready(function(){

	$(this).scrollTop(0);

	//Scroll to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300 ) {
            $('.scroll-top:hidden').stop(true, true).fadeIn();
        } else {
            $('.scroll-top').stop(true, true).fadeOut();
        }
    });

    $(function(){$('.scroll').click(function(){$('html,body').animate({scrollTop:0},"1000");return false})
    });

	//Mobile menu
	$('#js-mobile-button').click(function(e){
		e.preventDefault();
		var menuHeight = $('.navigation__mobile').height();

		$('#js-mobile-menu').toggleClass('open');

		if ($('#js-mobile-menu').hasClass('open')){
			$('html,body').css({'overflow':'hidden'});
			$('#js-mobile-menu').css({'top': menuHeight});
			removeIOSRubberEffect(document.querySelector('.l-site-header .navigation__wrap'));
		} else {
			$('html,body').css({'overflow':'auto'});
		};

		if($(window).width() > 992){
			$('#js-mobile-menu .open').css({'height':'auto'});
		} return false;
	});


	$('#js-mobile-button').on('click', function() {
		$('.navigation__hamburger').toggleClass('animate');
	});

});

//Loading 

$(window).on('load', function(){
  TweenMax.to('.loading', 0.5, {opacity: 0, onComplete: function () {
      $('body').removeClass('h-overflow-hidden');
      setTimeout(function(){
          $('.loading').remove();
      }, 300)
  }})
});

// Set KV height depending on browser height 

function setKVHeight(){
  var windowHeight = $(window).height();
  var header = $('.l-site-header');
  var keyVisual = $('.l-top-kv');
  var KVHeight = windowHeight - header.height();

  keyVisual.css({ 'padding-bottom': 0, height: KVHeight });
}