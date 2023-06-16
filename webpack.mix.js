const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.browserSync({
    proxy : process.env.MIX_APP_URL,
    host: process.env.MIX_APP_HOST,
    open: 'external',
    https: {
        key : '/Users/prunacatalin/projects/devilbox/ca/devilbox-ca.key',
        cert : '/Users/prunacatalin/projects/devilbox/ca/devilbox-ca.crt'
    },
});
mix.js('resources/js/app.js', 'public/js')
    .vue()
    .styles([
        'resources/css/app.css',
    ], 'public/css/app.css')
    .sass('resources/sass/app.scss', 'public/css')
    .alias({
        '@' : './resources/js/modules',
        '~' : './resources/js/',
    }).sourceMaps();
