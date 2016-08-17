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
    	.sass('app.scss')
        .sass([
            'gallery.scss'
        ],'./public/css/gallery.css')
    	.scripts([
    		'libs/sweetalert-dev.js',
            'libs/smoothscroll.js'
    	],'./public/js/libs.js')
    	.styles([
            'toggle.css',
    		'libs/sweetalert.css',
            'libs/social-icons.css'
    	],'./public/css/libs.css')
    	.browserify('app.js')
    	.browserSync({
    		proxy: 'agnieszka.dev',
    		port:3006
    	});
});
