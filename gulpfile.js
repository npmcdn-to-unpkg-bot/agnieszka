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
        .sass([
            'public/app.scss'
        ],'./public/css/app.css')
        .sass([
            'gallery/app.scss'
        ],'./public/css/gallery/app.css')
        .sass([
            'admin/app.scss'
        ],'./public/css/admin/app.css')
    	.scripts([
    		'libs/sweetalert-dev.js',
            'libs/smooth-scroll.js'
    	],'./public/js/libs.js')
    	.styles([
            'toggle.css',
    		'libs/sweetalert.css',
            'libs/social-icons.css'
    	],'./public/css/libs.css')
        .styles([
            'libs/admin-style.css',
        ],'./public/css/admin/admin-style.css')
    	.browserify('app.js')
    	.browserSync({
    		proxy: 'agnieszka.dev',
    		port:3008
    	});
});
