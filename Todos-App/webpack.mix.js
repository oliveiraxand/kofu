const mix = require('laravel-mix');

mix.js('resources/src/app.js', 'public/js')
   .sass('resources/saas/app.scss', 'public/css')
   .sourceMaps();