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

//# sourceMappingURL=app.js.map
