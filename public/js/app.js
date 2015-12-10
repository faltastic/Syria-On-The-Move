(function() {
	$.ajaxPrefilter(function(options, originalOptions, xhr) {
		var token = $('meta[name="X-CSRF-TOKEN"]').attr('content');
		if (token) {
			return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		}
	});
})(jQuery);


(function() {

	// Set up glitter functionality
	$.fn.fadeloop = function(options) {
		var
			settings = {
				timeout: 1500,
				timein: 1500,
				wait: 2000,
				timescale: 3,
				loop: true
			};

		$.extend(settings, options);

		var $elem = $(this)

		var fn = function() {
			$elem.fadeOut(settings.timeout).fadeIn(settings.timein);
		};

		fn();
		if (settings.loop)
			setInterval(fn, settings.timescale * settings.wait);
	};

	// Attach glitter
	$('.glitter .glitter-item').each(function(i, elem) {
		var wait = function() {
			return (Math.random(0, 2) + i) * 1000;
		}

		var waitI = wait();

		$(elem).fadeloop({
			wait: waitI
		});
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
