var gulp = require('gulp'),
    uglify = require('gulp-uglify'),
    plumber = require('gulp-plumber'),
    livereload = require('gulp-livereload');


gulp.task('scripts', function(){

  gulp.src('js/*js')
      .pipe(plumber())
      .pipe(uglify())
      .pipe(gulp.dest('minjs'));

});

gulp.task('css', function(){

  gulp.src('css/*.css')
      .pipe(livereload());

});


gulp.task('php', function(){

  gulp.src('*.php')
      .pipe(livereload());

});



gulp.task('watch', function(){

  var server = livereload.listen();
  gulp.watch('js/*.js', ['scripts']);
  gulp.watch('*.php', ['php']);
  gulp.watch('admin/*.php', ['php']);
  gulp.watch('*.css', ['css']);
  gulp.watch('admin/*.css', ['css']);

});

gulp.task('default', ['scripts', 'watch', 'php', 'css']);
