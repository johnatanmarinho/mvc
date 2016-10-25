var gulp = require('gulp'),
    sass = require('gulp-sass'),
    browserSync= require('browser-sync'),
    prefix  = require('gulp-autoprefixer'),
    plumber = require('gulp-plumber');

/**
 * run browser sync
 */
gulp.task('browserSync', function() {
  browserSync({
        proxy: 'localhost/mvc2/public'
  });
});

/**
 * run sass
 */
 gulp.task('sass', function() {
   return gulp.src('./public/assets/_sass/main.sass')
              .pipe(sass())
              .on('error', function (err) {
                  console.error(err.message);
                  browserSync.notify(err.message, 3000);    //shows error in the browserSync
                  this.emit('end');  //revent gulp from catching the error
              })
              .pipe(prefix())
              .pipe(gulp.dest('./public/assets/css'))
              .pipe(browserSync.reload({stream: true}));
 });

/**
 * watch php files the next step will put a error handler
 */
gulp.task('php', browserSync.reload);

gulp.task('watch', function(){
  gulp.watch('./public/assets/_sass/**', ['sass']);
  gulp.watch('./**/*.php', ['php']);
});

gulp.task('default', ['browserSync', 'watch']);
