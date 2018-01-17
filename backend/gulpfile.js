// Include gulp
var gulp = require("gulp");

// Include Our Plugins
var jshint = require("gulp-jshint");
var sass = require("gulp-sass");
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");
var rename = require("gulp-rename");
var moreCSS = require("gulp-more-css");
var cssnano = require("gulp-cssnano");
var jade = require("gulp-jade");

// Concatenate & Minify JS
gulp.task("fancybox", function() {
    return gulp.src("node_modules/@fancyapps/fancybox/dist/*.js")
        .pipe(rename("lightbox.js"))
        .pipe(uglify())
        .pipe(gulp.dest("web/js"));
});

gulp.task("jquery", function() {
    return gulp.src("node_modules/jquery/dist/jquery.js")
        .pipe(rename("jquery-3.2.1.js"))
        .pipe(uglify())
        .pipe(gulp.dest("web/js"));
});

gulp.task("fancyboxcss", function() {
    return gulp.src("node_modules/@fancyapps/fancybox/dist/jquery.fancybox.min.css")
        .pipe(rename("fancybox.css"))
        .pipe(gulp.dest("web/css"));
});
// Watch Files For Changes
gulp.task("watch", function() {
    gulp.watch("node_modules/@fancyapps/fancybox/dist/*.js", ["fancybox", "jquery", "fancyboxcss"]);
});

// Default Task
gulp.task("default", ["fancyboxcss", "jquery", "fancybox", "watch"]);