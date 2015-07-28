'use strict';
var gulp = require('gulp'),
    sass = require('gulp-sass'),
    minifyCss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    del = require('del');

var path = {
    dest: './',
    js_src: [
        'js/jquery-1.11.2.min.js',
        'js/bootstrap.min.js',
        'js/sweet-alert.min.js',
        'js/main.js '
    ],
    css_src: [
        'css/bootstrap.min.css',
        'css/sweet-alert.css',
        'css/main.css'
    ]
};

gulp.task('css', function() {
    return gulp.src(path.css_src)
        .pipe(minifyCss())
        .pipe(concat('all.css'))
        .pipe(gulp.dest(path.dest + 'css/'));
});

gulp.task('js', function () {
    return gulp.src(path.js_src)
        .pipe(uglify())
        .pipe(concat('all.js'))
        .pipe(gulp.dest(path.dest + 'js/'));
});

gulp.task('clean', function(){
    del.bind(null, [
        path.dest
    ]);
});

gulp.task('build', ['clean'], function () {
    gulp.start(['css', 'js']);
});

gulp.task('default', function () {
    gulp.start('build');
});
