var gulp = require('gulp');
var sass = require('gulp-dart-sass');
var watch = require('gulp-watch');
var sourcemaps = require('gulp-sourcemaps');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync').create();
var runSequence = require('gulp4-run-sequence');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

var sassOptions = {
  errLogToConsole: true,
  outputStyle: 'expanded'
};

var productionFiles = ''

gulp.task('browser-sync', function() {

	var files = [
		'**/*.php',
		'assets/**/*.+(svg|jpg|jpeg|png|php)'
	];

	browserSync.init(files, {
	proxy: {
		target: 'localhost',
		ws: true
	}
	});
});

gulp.task('scripts', function() {
	return gulp.src('js/src/*.js')
	.pipe(concat('scripts.js'))
	.pipe(gulp.dest('./js/'))
	.pipe(browserSync.reload({stream: true}));
});

gulp.task('sass', function() {
	return gulp.src('sass/**/*.scss')
		.pipe(sass(sassOptions).on('error', sass.logError))
		.pipe(sourcemaps.write('.'))
		.pipe(autoprefixer())
		.pipe(gulp.dest('./css/'))
		.pipe(browserSync.reload({stream: true}));
});

gulp.task('php', function() {
	return gulp.src('**/*.php')
		.pipe(browserSync.reload({stream: true}));
});

// gulp.task('watch', gulp.series('browser-sync', 'sass', 'scripts', function() {
// 	gulp.watch('sass/**/*.scss', gulp.series('sass'));
// 	gulp.watch('**/*.js', gulp.series('scripts'));
// }));

gulp.task('watch', function(done) {
	gulp.watch('sass/**/*.scss', gulp.series('sass'));
	gulp.watch('js/src/*.js', gulp.series('scripts'));
	gulp.watch('css/style.css').on('change', browserSync.reload);
	gulp.watch('js/src/*.js').on('change', browserSync.reload);
	done();
	
});

gulp.task('default', gulp.series('watch', 'browser-sync'));

// production

gulp.task('rootfiles', function() {
	return gulp.src('*.+(php|png|css)')
	.pipe(gulp.dest('./dist/laura-heino'));
});

gulp.task('inc', function() {
	return gulp.src('inc/*.php')
	.pipe(gulp.dest('./dist/laura-heino/inc'));
});

gulp.task('template-parts', function() {
	return gulp.src('template-parts/*.php')
	.pipe(gulp.dest('./dist/laura-heino/template-parts'));
});

gulp.task('page-templates', function() {
	return gulp.src('page-templates/*.php')
	.pipe(gulp.dest('./dist/laura-heino/template-parts'));
});

gulp.task('js', function() {
	return gulp.src('js/*.js')
	//.pipe(rename('scripts.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('./dist/laura-heino/js'));
});

gulp.task('css', function() {
	return gulp.src('css/*.css')
	.pipe(gulp.dest('./dist/laura-heino/css'));
});

gulp.task('icons', function() {
	return gulp.src('assets/icons/*.+(svg|php)')
	.pipe(gulp.dest('./dist/laura-heino/assets/icons'));
});

gulp.task('images', function() {
	return gulp.src('assets/images/*.+(svg|png|jpeg|jpg|php)')
	.pipe(gulp.dest('./dist/laura-heino/assets/images'));
});

gulp.task('build', async function(callback) {
	runSequence('sass', 'scripts', ['rootfiles', 'inc', 'template-parts', 'page-templates', 'js', 'css', 'icons', 'images']), callback
});
