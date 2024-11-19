const gulp = require('gulp');
const webpack = require('webpack-stream');
const minify = require('gulp-minify');

// Paths
const paths = {
    scripts: {
      watch: './js/**/*.js',
      entry: './js/app.js',
      dest: './',
    },
    styleguide: {
      src: './scss',
      dest: './styleguide',
    },
};

gulp.task('scripts', function() {
    return gulp.src(paths.scripts.entry)
        .pipe(webpack({
            mode: 'development',
            entry: {
              app: paths.scripts.entry,
            },
            output: {
              filename: 'main.js',
            },
          }))
        .pipe(gulp.dest(paths.scripts.dest))
});

// Watch Task
gulp.task('watch', function() {
    gulp.watch(paths.scripts.watch, gulp.series('scripts'));
});