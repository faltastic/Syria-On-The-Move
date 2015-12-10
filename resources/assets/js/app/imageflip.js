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

		console.log(i, waitI);

		$(elem).fadeloop({
			wait: waitI
		});
	});
})(jQuery);
