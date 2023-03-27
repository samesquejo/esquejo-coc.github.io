let mix = require('laravel-mix')

mix.js('src/js/app.js', 'dist/js')
    .vue()
    .postCss("src/css/tailwind.css", "dist/css", [
        require("tailwindcss"),
    ])