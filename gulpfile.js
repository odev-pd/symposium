const elixir = require('laravel-elixir');

require('laravel-elixir-vueify');

elixir((mix) => {
    mix.sass('app.scss')
        browserify('app.js');
});
