const mix = require('laravel-mix');
const glob = require('glob');

// Find all SCSS files in public/assets/scss and subdirectories
glob.sync('public/assets/scss/**/*.scss').forEach(file => {
    mix.sass(file, 'public/assets/css');
});

mix.version();