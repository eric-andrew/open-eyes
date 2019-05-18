const gulp = require('gulp');
const autoprefixer = require('autoprefixer');
const browserSync = require('browser-sync').create();
const concat = require('gulp-concat');
const cssnano = require('cssnano');
const plumber = require("gulp-plumber");
const postcss = require('gulp-postcss');
const atImport = require("postcss-import");
const sourcemaps = require('gulp-sourcemaps');
const tailwindcss = require('tailwindcss');

function css() {
  var plugins = [
    autoprefixer({browsers: ['last 2 versions']}),
    atImport(),
    tailwindcss('./tailwind.js'),
    cssnano({
      preset: 'default',
    })
  ];
  return gulp
    .src('src/css/style.css')
    .pipe(sourcemaps.init())
    .pipe(postcss(plugins))
    .pipe(plumber())
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream());
}

function js() {
  return src('./js/*.js', { sourcemaps: true })
    .pipe(concat('build.min.js'))
    .pipe(gulp.dest('./js/min', { sourcemaps: true }));
}

function browser() {
  browserSync.init({
    ui: {
      port: '9999',
    },
    proxy: 'http://localhost:8888/',
    files: [
      './**/*.php'
    ]
  });
  gulp.watch('./src/css/*.css', css);
  gulp.watch('./src/js/*.js', js).on('change', browserSync.reload);
};

exports.css = css;
exports.js = js;
exports.default = browser;
