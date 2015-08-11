<?php
/**
 * easy-WebDev functions and definitions
 *
 * @package easy-WebDev
 */

if ( ! function_exists( 'easy_webdev_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function easy_webdev_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on easy-WebDev, use a find and replace
	 * to change 'easy-webdev' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'easy-webdev', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'easy-webdev' ),
		'social' => esc_html__( 'Social Menu', 'easy-webdev' ),
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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );
}
endif; // easy_webdev_setup
add_action( 'after_setup_theme', 'easy_webdev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function easy_webdev_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'easy_webdev_content_width', 640 );
}
add_action( 'after_setup_theme', 'easy_webdev_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function easy_webdev_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'easy-webdev' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'easy_webdev_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function easy_webdev_scripts() {
	wp_enqueue_style( 'easy-webdev-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');

	wp_enqueue_style( 'prism',  get_template_directory_uri() . '/css/prism.css' );

	wp_enqueue_script( 'easy-webdev-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'typedjs', get_template_directory_uri() . '/js/typed.min.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.js', array('jquery'), '20120206', true );

    wp_enqueue_script( 'jquerymh', get_template_directory_uri() . '/js/jquery-matchheight.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'prism', get_template_directory_uri() . '/js/prism.js', array('jquery'), '20120206', true );

	wp_enqueue_script( 'easy-webdev-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'scripts' , get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20120206', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'easy_webdev_scripts' );

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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Post Types
 */
require get_template_directory() . '/inc/post-types.php';

/**
 * CMB2 Fields
 */
require get_template_directory() . '/inc/fields.php';
