jQuery(function(){


	// ==================================================
	// スムーススクロール
	// ==================================================
	jQuery('a.smooth[href^=#]').on('click', function(){
			var $_this = jQuery(this);
			var $speed = 500;
			var $href= jQuery(this).attr("href");
			var $target = jQuery($href == "#" || $href == "" ? 'html' : $href);
			var position = $target.offset().top;
			jQuery("html, body").animate({scrollTop:position}, $speed, "swing");
			return false;
	});


});	//document ready
