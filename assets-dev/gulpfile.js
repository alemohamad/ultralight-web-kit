// Load plugins
var gulp     = require('gulp'),
sass         = require('gulp-sass'),
autoprefixer = require('gulp-autoprefixer'),
cleanCSS     = require('gulp-clean-css'),
jshint       = require('gulp-jshint'),
uglify       = require('gulp-uglify'),
rename       = require('gulp-rename'),
concat       = require('gulp-concat'),
notify       = require('gulp-notify'),
cache        = require('gulp-cache'),
del          = require('del'),
sourcemaps   = require('gulp-sourcemaps'),
bourbon      = require('bourbon').includePaths,
path         = require('path');

var paths = {
  mainScss: ['sass/main.scss'],
  css: '../assets/css',
  jsOrigin: ['js/libraries/**/*.js', 'js/code.js'],
  jsDestination: '../assets/js'
};

// Styles
gulp.task('styles', function() {
  return gulp.src(paths.mainScss)
  .pipe(sass({ sourcemaps: true, includePaths: [bourbon] }))
  .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
  .pipe(gulp.dest(paths.css))
  .pipe(rename({suffix: '.min'}))
  .pipe(cleanCSS())
  .pipe(gulp.dest(paths.css))
  .pipe(notify({ title: 'Ultralight Web Kit', message: 'Styles task complete', icon: path.join(__dirname, 'ultralight.png') }));
});

// Scripts
gulp.task('scripts', function() {
  return gulp.src(paths.jsOrigin)
  //.pipe(jshint('.jshintrc'))
  //.pipe(jshint.reporter('default'))
  .pipe(concat('main.js'))
  .pipe(gulp.dest(paths.jsDestination))
  .pipe(rename({suffix: '.min'}))
  .pipe(uglify())
  .pipe(gulp.dest(paths.jsDestination))
  .pipe(notify({ title: 'Ultralight Web Kit', message: 'Scripts task complete', icon: path.join(__dirname, 'ultralight.png') }));
});

// Clean
gulp.task('clean', function(cb) {
  del([paths.css, paths.jsDestination], cb)
});

// Default task
gulp.task('default', ['watch']);

// Watch
gulp.task('watch', function() {
  gulp.watch('sass/**/*.scss', ['styles']);
  gulp.watch('js/**/*.js', ['scripts']);
});
