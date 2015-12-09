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

		var sectionMap = $('#section-map').outerHeight();
		var navigation = $('#navigation-wrapper').outerHeight();

		$('#navigation-wrapper')
			.toggleClass('sticky', scrollTop > (sectionMap - navigation))
	});
});

//# sourceMappingURL=app.js.map
