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
        'js/main.js ',
        'js/splash.js '
    ],
    css_src: [
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
