// Example of how to zip a directory 
var gulp = require('gulp');
var zip = require('gulp-zip');

var filename = __dirname + '.zip';


gulp.task('zip', function () {
  return gulp.src([
    './**/*', 
    '!./{node_modules,node_modules/**/*}', 
    '!./assets/{sass,sass/*}', 
    '!./gulpfile.js', 
    '!./package.json', 
    '!./package-lock.json',
    '!./{src,src/**/*}', 
    `!./${filename}`
  ],{base: './'})
    .pipe(zip(filename))
    .pipe(gulp.dest('output/dest/'));
});