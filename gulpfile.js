'use strict';
var gulp = require('gulp'),
  minifyCss = require('gulp-minify-css'),
  uglify = require('gulp-uglify'),
  ngAnnotate = require('gulp-ng-annotate'),
  concat = require('gulp-concat'),
  del = require('del'),
  merge = require('merge2');

var path = {
  dest: './public/',
  js_min: [
    'public/js/lib/material.min.js',
    'public/js/lib/loading-bar.min.js',
    'public/bower/ng-dialog/js/ngDialog.min.js',
    'public/bower/angular-aria/angular-aria.min.js',
    'public/bower/angular-cookies/angular-cookies.min.js',
    'public/bower/tinycolor/dist/tinycolor-min.js',
    'public/bower/angular-material/angular-material.min.js',
    'public/bower/md-color-picker/dist/mdColorPicker.min.js'
  ],
  js_src: [
    'public/js/main.js',
    'public/js/app/constant.js',
    'public/js/app/directive.js',
    'public/js/app/core.service.js',
    'public/js/app/root.ctrl.js'
  ],
  css_src: [
    'public/css/bootstrap-material-design.min.css',
    'public/css/loading-bar.min.css',
    'public/bower/ng-dialog/css/ngDialog.min.css',
    'public/bower/ng-dialog/css/ngDialog-theme-default.min.css',
    'public/bower/angular-material/angular-material.min.css',
    'public/bower/md-color-picker/dist/mdColorPicker.min.css',
    'public/css/main.css'
  ]
};

gulp.task('css', function() {
  return gulp.src(path.css_src)
    .pipe(minifyCss())
    .pipe(concat('all.css'))
    .pipe(gulp.dest(path.dest + 'css/'));
});

gulp.task('js', function () {
  return merge(
    gulp.src(path.js_min),
    gulp.src(path.js_src)
      .pipe(ngAnnotate())
      .pipe(uglify())
  )
    .pipe(concat('all.js'))
    .pipe(gulp.dest(path.dest + 'js/'));
});

gulp.task('clean', function(){
  del.bind(null, [
    path.dest
  ]);
});

gulp.task('build', gulp.series('clean', gulp.parallel(['css', 'js'])));

gulp.task('default', gulp.parallel('build'));
