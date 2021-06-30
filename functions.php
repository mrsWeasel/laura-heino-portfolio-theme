<?php
/**
 * Tuomas functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Laura Heino
 */

if ( ! function_exists( 'sassyscores_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sassyscores_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Tuomas, use a find and replace
	 * to change 'lauraheino' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lauraheino', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	remove_filter( 'the_content', 'wpautop' );
	remove_filter( 'the_excerpt', 'wpautop' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// Wide portfolio image xs 100vw sm 66,6vw
	add_image_size('portfolio_2_1', 1200, 600, true);
	// Square, smaller portfolio image xs 50vw 33,3vw
	add_image_size('portfolio_1_1', 600, 600, true);
	// Page header image
	add_image_size('page_8_1', 1200, 150, true);


	// Some additional image sizes for srcset
	
	add_image_size('portfolio_2_1_md', 992, 496, true);
	add_image_size('portfolio_2_1_sm', 768, 384, true);
	add_image_size('portfolio_2_1_s', 600, 300, true);
	add_image_size('page_8_1_md', 992, 124, true);
	add_image_size('page_8_1_sm', 768, 96, true);
	add_image_size('page_8_1_s', 600, 75, true);
	add_image_size('portfolio_1_1_md', 450, 450, true);
	add_image_size('portfolio_1_1_xs', 225, 225, true);



	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'lauraheino' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Support for post formats
	add_theme_support( 'post-formats', array( 'image' ) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'sassyscores_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'sassyscores_setup' );

function lh_add_image_sizes($sizes) {
	$lh_sizes = array(
		'portfolio_1_1' => __('Portfolio 1:1', 'lauraheino'),
		'portfolio_2_1' => __('Portfolio 2:1', 'lauraheino'),
	);

	$image_sizes = array_merge($sizes, $lh_sizes);
	return $image_sizes;
}

add_filter('image_size_names_choose', 'lh_add_image_sizes');

function lh_responsive_images($sizes, $size) {
	//special adjustments for portfolio image sizes
	if (1200 >= $size[0]) {
		$sizes = '(max-width: 767px) 100vw, (max-width: 991px) 67vw, (max-width: 1199px) 67vw, 1200px';
  		return $sizes;
  	} elseif (600 <= $size[0]) {
  		$sizes = '(max-width: 767px) 50vw, (max-width: 991px) 50vw, (max-width: 1199px) 50vw, 600px';
  		return $sizes;
	} else {
		return $sizes;
	}
}

add_filter('wp_calculate_image_sizes', 'lh_responsive_images', 10, 2);
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sassyscores_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sassyscores_content_width', 1920 );
}
add_action( 'after_setup_theme', 'sassyscores_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sassyscores_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'lauraheino' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lauraheino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Header Widget', 'lauraheino' ),
		'id'            => 'header_widget',
		'description'   => esc_html__( 'Add widgets here.', 'lauraheino' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'sassyscores_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sassyscores_scripts() {
	
	wp_enqueue_style( 'sassyscores-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Libre+Baskerville' );

	wp_enqueue_script( 'no-js', get_template_directory_uri() . '/js/no-js.js', array(), '123', false);

	wp_enqueue_script( 'minified-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20210630', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sassyscores_scripts' );

function sassyscores_remove_more_link_scroll( $link ) {
	$link = preg_replace('|#more-[0-9]+|', '', $link);
	return $link;
}

add_filter('the_content_more_link', 'sassyscores_remove_more_link_scroll');


function more_posts() {
  global $wp_query;
  return $wp_query->current_post + 1 < $wp_query->post_count;
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Modify tag cloud min / max font sizes.
 */
require get_template_directory() . '/inc/tag_cloud.php';


/**
 * Post entry meta
 */
require get_template_directory() . '/inc/post-meta.php';
