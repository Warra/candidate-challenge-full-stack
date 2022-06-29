const mix = require("laravel-mix");
const path = require("path");
const autoprefixer = require("autoprefixer");
require("laravel-mix-purgecss");

mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css")
    .options({
        postCss: [require("tailwindcss")],
    })
    .purgeCss();

mix.alias({
    "@": path.join(__dirname, "resources/js"),
});
