jQuery(document).ready(function($) {
	$(window).scroll(function(e) {
		var scrollTop = $(window).scrollTop();
		var navigation = $('#navigation-wrapper');
		navigation
			.toggleClass('sticky', scrollTop > ($(window).height() - navigation.outerHeight()))
	});
});
