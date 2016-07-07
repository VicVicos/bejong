"use strict";
// Определяем переменные
var gulp = require('gulp'),
    jshint = require('gulp-jshint'),
    concat = require('gulp-concat'),
    rename = require("gulp-rename"),
    cssnano = require('gulp-cssnano'),
    imagemin = require('gulp-imagemin'),
    pngquant = require('imagemin-pngquant'),
    stylus = require('gulp-stylus'),
    uglify = require('gulp-uglify'),
    htmlhint = require("gulp-htmlhint"),
    autoprefixer = require('gulp-autoprefixer'),
    gulpif = require("gulp-if"),
    livereload = require('gulp-livereload'),
    clean = require('gulp-clean'),
    size = require('gulp-filesize'),
    changed = require('gulp-changed'),
    notify = require("gulp-notify");

// Иничиализация плагинов

// Для работы со stylus
gulp.task('stylus', function () {
  gulp.src('html/dev/stylus/*.styl')
    .pipe(concat('zstylcss.styl'))//Во что склеиваем
    .pipe(stylus({compress: true}))
    //.pipe(stylus({compress: false}))
    .pipe(gulp.dest('html/dev/css/'));
    // .pipe(gulp.dest('wp-content/themes/prazdnik/assets/css/'));

});

// Для работы с css
gulp.task('css', function() {
  return gulp.src('html/dev/css/*.css')//Что путь к файлам
    // .pipe(changed('html/assets/css/', {extension: '.css'}))
    .pipe(concat('styles.css'))//Во что склеиваем
    .pipe(cssnano())//Минимизация css
    .pipe(autoprefixer({browsers: ['last 20 versions'],cascade: false}))//Префиксы
    .pipe(rename('styles.min.css'))//Переименовываем выходной файл
    .pipe(gulp.dest('web/css/'))//куда помещаем лепнину
    .pipe(size())
    .pipe(notify("Done!"));//Сообщение о выполнении
});

// для работы с js
gulp.task('js', function() {
  //return gulp.src(['html/dev/js/vendor/*.js', 'dev/js/*.js'])
  return gulp.src(['html/dev/js/*.js'])
    // .pipe(changed('html/assets/js/', {extension: '.js'}))
    .pipe(concat('script.min.js'))
    .pipe(uglify())
    // .pipe(jshint())
    // .pipe(jshint.reporter('default'))
    .pipe(gulp.dest('web/js/'))
    .pipe(size());
});

// Для работы с img
gulp.task('img', function () {
    return gulp.src('html/dev/img/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('web/img/'));
});

// Для работы с html
gulp.task('html', function (){
	gulp.src("*.html")
        .pipe(htmlhint())
        .pipe(htmlhint.reporter())
})
// Sprite Generator

// Watch
gulp.task('watch', function (){
    // livereload.listen(8888);
	// Следить за изменениями в файлах *.* и при изменении запускать задачу default
	gulp.watch('html/dev/css/*.css', ['css']);
    //gulp.watch('dev/images/*', ['img'])
	gulp.watch('html/dev/js/*.js', ['js']);
	gulp.watch('html/dev/stylus/*.styl', ['stylus']);
});

// Очистка дирректорий...
gulp.task('clean-img', function () {
  return gulp.src('html/dev/img/*', {read: false})
    .pipe(clean());
});

// watch2
gulp.task('watch2', function (){
	// Следить за изменениями в файлах *.* и при изменении запускать задачу default
	//gulp.watch('dev/css/*.css', ['css'])
    //gulp.watch('dev/images/*', ['img'])
	gulp.watch('html/dev/js/*.js', ['js']);
	//gulp.watch('dev/stylus/*.styl', ['stylus'])
});

// Основная задача для запуска
// Исключили img, html
gulp.task('default', ['watch', 'stylus', 'css', 'js']);
gulp.task('default3', ['watch', 'img']);

gulp.task('images', ['img', 'clean-img']);

gulp.task('gjs', ['watch', 'js']);
gulp.task('gjcss', ['watch', 'stylus', 'css']);
