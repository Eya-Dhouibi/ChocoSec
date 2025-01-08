const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const cleanCSS = require('gulp-clean-css');
const browserSync = require('browser-sync').create();

// Chemins des fichiers
const paths = {
  styles: {
    src: 'sass/css/style.scss',
    dest: 'assets/css/'
  },
  scripts: {
    src: 'sass/js/app.js', // Tous les fichiers JavaScript
    dest: 'assets/js/'  // Dossier de sortie JavaScript
  }
};

function compileSass() {
  return gulp
    .src(paths.styles.src)
    .pipe(sourcemaps.init()) // Initialise les sourcemaps
    .pipe(sass().on('error', sass.logError)) // Compile Sass
    .pipe(rename({ suffix: '.min' })) // Renomme le fichier en ajoutant '.min'
    .pipe(cleanCSS()) // Minifie le fichier CSS
    .pipe(sourcemaps.write('.')) // Ajoute les sourcemaps
    .pipe(gulp.dest(paths.styles.dest)) // Sauvegarde le fichier minifié
    .pipe(browserSync.stream()); // Recharge le navigateur si utilisé avec BrowserSync
}

// Tâche pour transpiler et minifier JavaScript
function bundleJs() {
  return gulp.src(paths.scripts.src)
    .pipe(sourcemaps.init()) // Initialiser les sourcemaps pour JS
    .pipe(uglify()) // Minifier JS
    .pipe(rename({ suffix: '.min' })) // Renommer le fichier JS en app.min.js
    .pipe(sourcemaps.write('.')) // Ajouter les sourcemaps
    .pipe(gulp.dest(paths.scripts.dest)) // Sortir le fichier JS minifié
    .pipe(browserSync.stream()); // Injecter les changements de JS sans rafraîchir la page
}

// Tâche pour surveiller les fichiers
function watchFiles() {
  gulp.watch('sass/**/*.scss', compileSass);
  gulp.watch(paths.scripts.src, bundleJs);
  gulp.watch('**/*.php').on('change', browserSync.reload);
}

// Tâches par défaut
exports.default = gulp.series(compileSass, bundleJs, watchFiles);
