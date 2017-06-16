'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
const sassfiles = 'www/css/**/*.scss';

gulp.task('sass', function () {
  return gulp.src(sassfiles)
    .pipe(sass({outputStyle: ''}).on('error', sass.logError))
    .pipe(gulp.dest('www/css/'));
});

gulp.task('watch:sass', function () {
  gulp.watch(sassfiles, ['sass']);
});

gulp.task('compressed:sass', function() {
  return gulp.src(sassfiles)
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest('www/css/'));
});
