'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var cssnano = require('gulp-cssnano');
var sourcemaps = require('gulp-sourcemaps');
var gulpif = require('gulp-if');
var browserSync = require('browser-sync').create();
var svgstore = require('gulp-svgstore');
var svgmin = require('gulp-svgmin');
var path = require('path');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
sass.compiler = require('node-sass');


var PRODUCTION = false;

gulp.task('sass', function () {
  return gulp.src('./assets/sass/app.scss')
    .pipe(sass.sync().on('error', sass.logError))

    .pipe(sourcemaps.init())
    .pipe(cssnano())
    .pipe(gulpif(PRODUCTION !== true, sourcemaps.write('.')))
    .pipe(gulp.dest('./css'))
    .pipe(browserSync.stream());
});

gulp.task('sass:watch', function () {
  gulp.watch('./assets/sass/**/*.scss', gulp.series(['sass']));
});

gulp.task('svgstore', function () {
  return gulp
      .src('assets/svg/*.svg')
      .pipe(svgmin(function (file) {
          var prefix = path.basename(file.relative, path.extname(file.relative));
          return {
              plugins: [{
                  cleanupIDs: {
                      prefix: prefix + '-',
                      minify: true
                  }
              }]
          }
      }))
      .pipe(svgstore({ inlineSvg: true }))
      .pipe(gulp.dest('svg'));
});

 
gulp.task('js', () =>
    gulp.src('src/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(concat('all.js'))
        .pipe(gulpif(PRODUCTION !== true, sourcemaps.write('.')))
        .pipe(gulp.dest('./js'))
);

gulp.task('browser-sync', function (done) {
  browserSync.reload();
  done();
});

gulp.task('browser-stream', function (done) {
  
  done();
});

gulp.task('sync', function(){
  // Serve files from the root of this project
  browserSync.init({
    proxy: "http://localhost/sacredheart"
  });
  gulp.series(['sass', 'svgstore']);
  gulp.watch('./assets/sass/**/*.scss', gulp.series(['sass', 'browser-stream']));
  gulp.watch('./assets/js/*.js', gulp.series(['js', 'browser-sync']));
  gulp.watch('./assets/svg/*.svg', gulp.series(['svgstore', 'browser-sync']));
  gulp.watch('./**/*.twig', gulp.series(['browser-sync']));
})