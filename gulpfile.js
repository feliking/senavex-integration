
var fs = require('fs')
    , ini = require('ini')

var config = ini.parse(fs.readFileSync('./config/config.ini', 'utf-8'));
var environment = config.application.app_route.split('/')[3];


/**
 * Created by Renzo on 10/7/2016.
 */
var gulp =require('gulp'),
    browserSync = require('browser-sync').create(),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    uglifycss =require('gulp-uglifycss'),
    sass = require('gulp-sass');


gulp.task('sass', function () {
    return gulp.src('styles/css-personales/sass/**/*.scss')
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(uglifycss({
            'uglyComments':false
        }))
        .pipe(gulp.dest('styles/css-personales'))
        .pipe(browserSync.stream({stream:true}));
});

gulp.task('scripts', function () {
    return gulp.src('styles/js-personales/ddjj/**/*.js')
        .pipe(uglify({mangle:false}))
        .pipe(concat('ddjj.min.js'))
        .pipe(gulp.dest('styles/js-personales/'))
        .pipe(browserSync.stream());
});

gulp.task('watch', function () {
    gulp.watch('styles/css-personales/sass/**/*.scss', ['sass']);
    gulp.watch('vista/**/*.tpl', browserSync.reload);
    gulp.watch('styles/js-personales/**/*.js',['scripts']);
});
//gulp.task('sass:watch', function () {
//    gulp.watch('./sass/**/*.scss', ['sass']);
//});
gulp.task('browserSync', function () {
    browserSync.init({
        proxy: "localhost/" + environment
    });
});
gulp.task('default', ['browserSync', 'sass','scripts','watch']);
