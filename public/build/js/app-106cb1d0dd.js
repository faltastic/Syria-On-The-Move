(function() {
	$.ajaxPrefilter(function(options, originalOptions, xhr) {
		var token = $('meta[name="X-CSRF-TOKEN"]').attr('content');
		if (token) {
			return xhr.setRequestHeader('X-CSRF-TOKEN', token);
		}
	});
})(jQuery);


(function(){
    // $('#navigation').sticky({ topSpacing: 0 });
})(jQuery);

//# sourceMappingURL=app.js.map
