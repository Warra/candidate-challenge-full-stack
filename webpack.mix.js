const mix = require("laravel-mix");
const path = require("path");
const autoprefixer = require("autoprefixer");

mix.js("resources/js/app.js", "public/js")
    .vue()
    .postCss("resources/css/app.css", "public/css", [require("tailwindcss")]);

mix.alias({
    "@": path.join(__dirname, "resources/js"),
});
