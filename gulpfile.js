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
		.styles([
				'/leaflet/dist/leaflet.css',
				'/leaflet.markercluster/dist/MarkerCluster.css',
				'/leaflet.Photo/Leaflet.Photo.css',
				'/Leaflet.TileLegend/Leaflet.TileLegend.css'
			],
			'public/css/map-lib.css', './vendor/bower_components')
		.sass([
				'app.scss'
			],
			'public/css/app.css')
		.scripts([
				'/jquery/dist/jquery.js'
			],
			'public/js/lib.js', 'vendor/bower_components')
		.scripts([
				'/reqwest/src/reqwest.js',
				'/leaflet/dist/leaflet-src.js',
				'/stamen.tile/index.js',
				'/leaflet.markercluster/dist/leaflet.markercluster-src.js',
				'/leaflet.Photo/Leaflet.Photo.js',
				'/Leaflet.TileLegend/Leaflet.TileLegend.js'
			],
			'public/js/map-lib.js', 'vendor/bower_components')
		.scripts([
				'/config.js',
				'/app/**/*.js'
			],
			'public/js/app.js')
		.scripts([
				'/map/**/*.js'
			],
			'public/js/map.js')
		.version(['public/css/lib.css', 'public/css/map-lib.css', 'public/css/app.css', 'public/js/lib.js', 'public/js/map-lib.js', 'public/js/map.js', 'public/js/app.js'])
		.copy('vendor/bower_components/Leaflet.TileLegend/toolbox.png', 'public/build/css/');
});
