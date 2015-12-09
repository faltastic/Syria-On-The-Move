(function() {
	$.ajaxPrefilter(function(options, originalOptions, xhr) {
		var token = $('meta[name="X-CSRF-TOKEN"]').attr('content');
		if (token) {
			return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		}
	});
})(jQuery);


(function() {
	$(window).scroll(function(e) {
		var scrollTop = $(window).scrollTop();

    var firstSection = $('#section-map').outerHeight();

    console.log(firstSection);
    console.log(scrollTop);
    console.log('=====');

    
		$('#navigation')
			.toggleClass('top', scrollTop > 1400)
			.toggleClass('visible', scrollTop <= 1400 && scrollTop > 1505 - $(window).height());
	});
})(jQuery);

//# sourceMappingURL=app.js.map
