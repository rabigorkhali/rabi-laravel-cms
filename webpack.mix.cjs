const mix = require("laravel-mix");

mix.webpackConfig({
    resolve: {
        extensions: [".js", ".json", ".vue", ".ts", ".jsx", ".css"],
    },
});

mix.js("resources/js/app.js", "public/compiled/js")
    .sass("resources/sass/app.scss", "public/compiled/css")
    .sourceMaps();

mix.js('resources/js/system/system.js', 'public/compiled/js')
    .options({
        processCssUrls: false,
    });
