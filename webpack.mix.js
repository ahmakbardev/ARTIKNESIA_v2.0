//webpack.mix.js
const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .sourceMaps()
    .webpackConfig({
            devServer: {
                port: '8079'
            }
        }
    )
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")]).version();
