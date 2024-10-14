const mix = require("laravel-mix");
const path = require('path');

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
mix.js("resources/js/app.js", "public/js")
    .sourceMaps()
    .vue({ version: 3 })
    .webpackConfig({
        resolve: {
            alias: {
                '@': path.resolve('resources/js'), // Adjust the path based on your project structure
            },
        }
    })
    .copyDirectory("resources/fonts", "public/fonts")
    .copyDirectory("resources/media", "public/media");


if (mix.inProduction()) {
    mix.version();
}
