'use strict';
var gulp = require('gulp'),
    minifyCss = require('gulp-minify-css'),
    uglify = require('gulp-uglify'),
    ngAnnotate = require('gulp-ng-annotate'),
    concat = require('gulp-concat'),
    del = require('del');

var path = {
    dest: './public/',
    js_src: [
        'public/js/lib/material.min.js',
        'public/js/lib/loading-bar.min.js',
        'public/bower/ng-dialog/js/ngDialog.min.js',
        'public/js/main.js',
        'public/js/app/constant.js',
        'public/js/app/directive.js',
        'public/js/app/core.service.js',
        'public/js/app/root.ctrl.js'
    ],
    css_src: [
        'public/css/bootstrap-material-design.min.css',
        'public/css/loading-bar.min.css" rel="stylesheet',
        'public/bower/ng-dialog/css/ngDialog.min.css',
        'public/bower/ng-dialog/css/ngDialog-theme-default.min.css',
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
        .pipe(ngAnnotate())
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
