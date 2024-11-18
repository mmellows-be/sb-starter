const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const kss = require('kss');
const connect = require('gulp-connect');

// Paths
const paths = {
    styles: {
      watch: 'scss/**/*.scss',
      src: 'scss/main.scss',
      dest: './styleguide',
    },
    styleguide: {
      src: './scss',
      dest: './styleguide',
    },
};

const server = () => {
  connect.server({
    root: __dirname + '/styleguide',
    livereload: true,
    port: 8888
  });
}

// Compile SCSS to CSS
gulp.task('styles', function(cb) {
    gulp.src(paths.styles.src)
      .pipe(sass().on('error', sass.logError))
      .pipe(gulp.dest(paths.styles.dest));

    cb()
});

gulp.task('styleguide', function(cb) {
    kss({
        source: paths.styleguide.src,
        destination: paths.styleguide.dest,
        css: './main.css',
    });

    cb()
});

// Watch Task
gulp.task('watch', function() {
    server()

    gulp.watch(paths.styles.watch, gulp.series('styles', 'styleguide'));
});