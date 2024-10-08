const mix = require('laravel-mix');
const LiveReloadPlugin = require('webpack-livereload-plugin');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
    .sass('resources/css/styles.scss', 'public/css')
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/categories-select.js', 'public/js')
    .js('resources/js/favorites-filter-button.js', 'public/js')
    .js('resources/js/add-to-favorites-button.js', 'public/js')
    .js('resources/js/seasons-select.js', 'public/js')
    .js('resources/js/search-bar.js', 'public/js')
    .webpackConfig({
        plugins: [new LiveReloadPlugin()]
    })
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('tailwindcss'),
        require('autoprefixer')
    ]);
