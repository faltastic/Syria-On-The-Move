var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	mix
		.styles([
			'/normalize-css/normalize.css'
			],
			'public/css/lib.css', './vendor/bower_components')
		.sass([
				'app.scss',
			],
			'public/css/app.css')
		.scripts([
				'/jquery/dist/jquery.js',
			],
			'public/js/lib.js', 'vendor/bower_components')
		.scripts([
				'/config.js',
				'/app/**/*.js',
			],
			'public/js/app.js')
		.version(['public/css/lib.css', 'public/css/app.css', 'public/js/lib.js', 'public/js/app.js']);
});
