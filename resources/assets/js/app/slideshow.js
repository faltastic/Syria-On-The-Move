(function() {
	$('.slideshow').slick({
		dots: true,
		infinite: true,
		autoplay: true,
		autoplaySpeed: 2500,
		speed: 850,
		slidesToShow: 1,
		slidesToScroll: 1,
		cssEase: 'linear',
		centerMode: false,
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
