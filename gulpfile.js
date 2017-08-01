'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
const sassFiles = 'www/css/**/*.scss';
const sassDest = 'wwww/css';

gulp.task('sass', function () {
  return gulp.src(sassFiles)
    .pipe(sass({outputStyle: ''}).on('error', sass.logError))
    .pipe(gulp.dest(sassDest));
});

gulp.task('watch:sass', function () {
  gulp.watch(sassFiles, ['sass']);
});

gulp.task('compressed:sass', function() {
  return gulp.src(sassFiles)
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(gulp.dest(sassDest));
});
