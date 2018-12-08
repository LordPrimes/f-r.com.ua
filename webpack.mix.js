let mix = require('laravel-mix');
let ImageminPlugin     = require('imagemin-webpack-plugin').default;
let CopyWebpackPlugin  = require('copy-webpack-plugin');
let imageminMozjpeg    = require('imagemin-mozjpeg');


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */ 
if (mix.inProduction()) {
    mix.version();
    mix.disableNotifications();
}
/* Sass componet/vue page Processing */
mix
.sass('resources/assets/sass/bootstrap_variables.scss', 'public/css/StyleCore' )
.sass('resources/assets/sass/StyleCore/core.scss', 'public/css/StyleCore')
.sass('resources/assets/sass/StyleCore/header.scss', 'public/css/StyleCore')
.sass('resources/assets/sass/StyleCore/footers.scss', 'public/css/StyleCore')
.sass('resources/assets/sass/StyleCore/viewprod.scss', 'public/css/StyleCore')
.sass('resources/assets/sass/StyleCore/blogview.scss', 'public/css/StyleCore')
.sass('resources/assets/sass/StyleCore/blog.scss', 'public/css/StyleCore')
.sass('resources/assets/sass/StyleCore/search.scss', 'public/css/StyleCore')
.options({
    processCssUrls:true,
      postCss: [
      require('autoprefixer')({
          browsers: ['last 5 versions']
         
      })
    ]
});
/* Lib css */





/* Global combine core styles CSS */
mix.combine(['public/css/StyleCore/*'], 'public/css/styleCore.css');


/*front end bunlde  js */
mix.js('resources/assets/js/core.js', 'public/js')
.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery']
});


   
mix.webpackConfig({
   
    plugins: [
      new CopyWebpackPlugin([{
          from: 'public//img',
          to: 'img', 
      }]),
      new ImageminPlugin({
          test: /\.(jpe?g|png|gif|svg)$/i,
          plugins: [
              imageminMozjpeg({
                  quality: 65,
              })
          ]
      })
  ]
  });