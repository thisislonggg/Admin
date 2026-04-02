const mix = require('laravel-mix');
const WebpackRTLPlugin = require('webpack-rtl-plugin');
const lodash = require("lodash");
const folder = {
    src: "resources/", // source files
    dist: "public/", // build files
    dist_assets: "public/assets/" //build assets files
};

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

// copy all fonts
mix.copyDirectory(folder.src + "fonts", folder.dist_assets + "fonts");

// copy all images 
mix.copyDirectory(folder.src + "images", folder.dist_assets + "images");

// copy all js
mix.copyDirectory(folder.src + "js", folder.dist_assets + "js");

// copy all pages js
mix.copyDirectory(folder.src + "pages", folder.dist_assets + "pages");

// copy all plugins
mix.copyDirectory(folder.src + "plugins", "public/assets/plugins");


mix.sass('resources/scss/bootstrap.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap.css");
mix.sass('resources/scss/bootstrap-material.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap-material.css");
mix.sass('resources/scss/bootstrap-dark.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/bootstrap-dark.css");
mix.sass('resources/scss/icons.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/icons.css");
mix.sass('resources/scss/app.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/app.css");
mix.sass('resources/scss/app-material.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/app-material.css");
mix.sass('resources/scss/app-dark.scss', folder.dist_assets + "css").minify(folder.dist_assets + "css/app-dark.css");

// mix.sass('resources/scss/app-dark.scss', folder.dist_assets + "css");
// mix.sass('resources/scss/bootstrap-material.scss', folder.dist_assets + "css");
// mix.sass('resources/scss/bootstrap-dark.scss', folder.dist_assets + "css");
// mix.sass('resources/scss/icons.scss', folder.dist_assets + "css");
// mix.sass('resources/scss/app.scss', folder.dist_assets + "css");
// mix.sass('resources/scss/app-material.scss', folder.dist_assets + "css");
// // mix.sass('resources/scss/app-dark.scss', folder.dist_assets + "css");

mix.webpackConfig({
    plugins: [
        new WebpackRTLPlugin()
    ],
    stats: {
        children: true,
    },
});




