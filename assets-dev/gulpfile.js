// Load plugins
var gulp = require('gulp'),
sass = require('gulp-ruby-sass'),
autoprefixer = require('gulp-autoprefixer'),
cleanCSS = require('gulp-clean-css'),
jshint = require('gulp-jshint'),
uglify = require('gulp-uglify'),
rename = require('gulp-rename'),
concat = require('gulp-concat'),
notify = require('gulp-notify'),
cache = require('gulp-cache'),
del = require('del'),
path = require('path');

// Styles
gulp.task('styles', function() {
  return sass('sass/main.scss', { style: 'expanded' })
  .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
  .pipe(gulp.dest('../assets/css'))
  .pipe(rename({suffix: '.min'}))
  .pipe(cleanCSS())
  .pipe(gulp.dest('../assets/css'))
  .pipe(notify({ title: 'Ultralight Web Kit', message: 'Styles task complete', icon: path.join(__dirname, 'ultralight.png') }));
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src([
    'js/libraries/**/*.js',
    'js/code.js'
  ])
  //.pipe(jshint('.jshintrc'))
  //.pipe(jshint.reporter('default'))
  .pipe(concat('main.js'))
  .pipe(gulp.dest('../assets/js'))
  .pipe(rename({suffix: '.min'}))
  .pipe(uglify())
  .pipe(gulp.dest('../assets/js'))
  .pipe(notify({ title: 'Ultralight Web Kit', message: 'Scripts task complete', icon: path.join(__dirname, 'ultralight.png') }));
});

// Clean
gulp.task('clean', function(cb) {
  del(['../assets/css', '../assets/js'], cb)
});

// Default task
gulp.task('default', ['watch']);

// Watch
gulp.task('watch', function() {
  gulp.watch('sass/**/*.scss', ['styles']);
  gulp.watch('js/**/*.js', ['scripts']);
});
