'use strict';
var gulp = require('gulp'),
    minifyCss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    ngmin = require('gulp-ngmin'),
    concat = require('gulp-concat'),
    del = require('del');

var path = {
    dest: './public/',
    js_src: [
        'public/js/main.js',
        'public/js/app/constant.js',
        'public/js/app/core.service.js',
        'public/js/app/root.ctrl.js',
        'public/js/app/home.ctrl.js',
        'public/js/app/icon.ctrl.js',
        'public/js/app/about.ctrl.js'
    ],
    css_src: [
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
    return gulp.src(path.js_src)
        .pipe(ngmin())
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
