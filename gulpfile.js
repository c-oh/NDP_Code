var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    browserSync = require('browser-sync').create(),
    reload = browserSync.reload,
    rename = require('gulp-rename'),
    plumber = require('gulp-plumber'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    cssnano = require('gulp-cssnano')
    notify = require('gulp-notify');


// This gulp will notify if there is an error 
var plumberErrorHandler = {
    errorHandler:notify.onError({
        title:'Gulp',
        message: 'Error: <%= error.message %>'
    })
};

//GULP SASS
gulp.task('sass', function() {
    gulp.src('./sass/style.scss')
      .pipe(plumber(plumberErrorHandler))
      .pipe(sass())
      .pipe(autoprefixer({
         browsers: ['last 2 versions']
      }))
      .pipe(gulp.dest('./build/css'))
      .pipe(cssnano())
      .pipe(rename('style.min.css'))
      .pipe(gulp.dest('./build/css'));
});



// GULP browserSync 
   
gulp.task('serve', function () {
    // Serve files from the root of this project
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });

    gulp.watch(["build/css/*.css"]).on("change", browserSync.reload);
});

gulp.task('watch', function(){
    gulp.watch("sass/*.scss", ['sass']);
});



gulp.task('default', ['serve', 'watch']);