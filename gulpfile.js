const gulp = require("gulp");

exports.deploy = () => gulp.src("./**/*.php")
    .pipe(gulp.dest("../../Hosts/wvalleyfiber/wp-content/themes/wvalleyfiber-theme/vendor/pendulum/base-theme-php"))