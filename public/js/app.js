(function() {
	$.ajaxPrefilter(function(options, originalOptions, xhr) {
		var token = $('meta[name="X-CSRF-TOKEN"]').attr('content');
		if (token) {
			return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		}
	});
})(jQuery);


jQuery(document).ready(function($) {
	$(window).scroll(function(e) {
		var scrollTop = $(window).scrollTop();
		var navigation = $('#navigation-wrapper');
		navigation
			.toggleClass('sticky', scrollTop > ($(window).height() - navigation.outerHeight()))
	});
});

(function() {
	$('.slideshow').slick({
		dots: true,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 2500,
		speed: 850,
		slidesToShow: 2,
		slidesToScroll: 1,
		cssEase: 'linear',
		centerMode: true,
		focusOnSelect: true,
		responsive: [{
				breakpoint: 1024,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					infinite: true,
					dots: true
				}
			}
		]
	});
})(jQuery)

//# sourceMappingURL=app.js.map
