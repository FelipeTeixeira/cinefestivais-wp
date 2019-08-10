var gulp            = require("gulp");
var browserSync     = require("browser-sync").create();
var sass            = require("gulp-sass");
var sourcemaps      = require('gulp-sourcemaps');
var gulpSequence    = require('gulp-sequence')

gulp.task("serve", ["sass"], function() {
    browserSync.init({
        // Configurar aqui de acordo com o PATH localhost do XAMPP
        proxy: "http://localhost/dev/cinefestivais-wp"
    });

    gulp.watch("./wp-content/themes/cinefestivais/assets/scss/**/*.scss", ["sass"]);
    gulp.watch(['wp-content/themes/cinefestivais/**/*.php', './wp-content/themes/cinefestivais/**/*.js']).on("change", browserSync.reload);
});

// CSS
gulp.task("sass", function() {
    return gulp.src("./wp-content/themes/cinefestivais/assets/scss/**/*.scss")
        .pipe(sourcemaps.init())
        .pipe(sass({
            outputStyle: "compressed"
        }).on("error", sass.logError))
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest("./wp-content/themes/cinefestivais/assets/css"))
        .pipe(browserSync.stream());
});

gulp.task("default", gulpSequence('serve'));