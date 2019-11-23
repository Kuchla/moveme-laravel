const mix = require("laravel-mix");

mix.copy(["resources/assets/images"], "public/assets/images");
mix.sass('resources/assets/css/app.scss', 'public/assets/css/app.css');
mix.js('resources/assets/js/app.js', 'public/assets/js/app.js');



