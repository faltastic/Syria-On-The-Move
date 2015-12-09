jQuery(document).ready(function($) {


	$(window).scroll(function(e) {
		var scrollTop = $(window).scrollTop();

		var sectionMap = $('#section-map').outerHeight();
		var navigation = $('#navigation-wrapper').outerHeight();

		$('#navigation-wrapper')
			.toggleClass('sticky', scrollTop > (sectionMap - navigation))
	});
});
