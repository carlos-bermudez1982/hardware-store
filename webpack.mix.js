let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js','public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .stylus('resources/assets/stylus/styles.styl', 'public/css', {
        use : [
          require('rupture')(),
          require('nib')()  
        ],
        import: [
          '~rupture/rupture/index.styl',
          '~nib/index.styl'
        ]  
    })
   .styles('public/css/vendor/fontawesome/css/font-awesome.min.css', 'public/css/all.css')
   .browserSync({
    	proxy: 'http://localhost:8000'
	 })
   
;

  // .sass('resources/assets/sass/app.scss', 'public/css')
  //  .stylus('resources/assets/stylus/app.styl', 'public/css', {
  //     use : [
  //       require('rupture')(),
  //       require('nib')()  
  //     ],
  //     import: [
  //       '~rupture/rupture/index.styl',
  //         '~nib/index.styl'
  //       ]  
  // })
  //  .styles([
  //     'node_modules/bootstrap/dist/css/bootstrap.min.css',
  //     'public/css/vendor/fontawesome/css/fontawesome.min.css'
  //   ], 'public/css/all.css'
  // )
//  .styles([
  //     'node_modules/bootstrap/dist/css/bootstrap.min.css',
  //     'public/css/vendor/fontawesome/css/fontawesome.min.css'
  //   ], 'public/css/all.css'
  // )