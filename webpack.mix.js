const mix = require("laravel-mix");

mix.copy(["resources/assets/images"], "public/assets/images");
mix.styles(["resources/assets/css/site.css"], "public/assets/css/site.css");
mix.styles(["resources/assets/css/public-profile.css"], "public/assets/css/public-profile.css");
mix.styles(["resources/assets/css/comment.css"], "public/assets/css/comment.css");
mix.js(["resources/assets/js/event.js"], "public/assets/js/event.js");
mix.js(["resources/assets/js/place.js"], "public/assets/js/place.js");
mix.js(["resources/assets/js/public-profile.js"], "public/assets/js/public-profile.js");
mix.js(["resources/assets/js/comment.js"], "public/assets/js/comment.js");

