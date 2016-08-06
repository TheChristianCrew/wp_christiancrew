<?php

require_once( get_stylesheet_directory() .'/includes/class-phpbb.php');
require_once( get_stylesheet_directory() .'/includes/class-phpbb-admin.php');
require_once( get_stylesheet_directory() .'/includes/class-divisions.php' );
require_once( get_stylesheet_directory() .'/includes/class-widget-ts-btn.php' );
require_once( get_stylesheet_directory() .'/includes/class-widget-forums-btn.php' );
require_once( get_stylesheet_directory() .'/includes/class-widget-announcements.php' );

/**
 * Setup our theme defaults
 */
function wp_christiancrew_setup() {

	add_action( 'init', array( 'phpBB', 'init' ) );

	if ( is_admin() ) {
		add_action( 'init', array( 'phpBBAdmin', 'init' ) );
	}

	// Instantiate custom post types
	$CC_Divisions = new CC_Divisions();

	// Instantiate widgets
	add_action( 'widgets_init', function(){ register_widget( 'TS_BTN' ); });
	add_action( 'widgets_init', function(){ register_widget( 'Forums_BTN' ); });
	add_action( 'widgets_init', function(){ register_widget( 'CC_Announcements' ); });

	// Add feed links to <head>
	add_theme_support('automatic-feed-links');

	// Let WordPress handle document titles
	add_theme_support('title-tag');

	// Add support for featured images to the cc_divisions post type
	add_theme_support( 'post-thumbnails', array( 'divisions' ) );
	add_image_size( 'division-thumb', 246, 138, true );

	// Register nav menu
	register_nav_menus(array(
		'site_nav' => 'Site Nav',
	));

	// Remove unnecessary bits from WordPress
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );

}
add_action('after_setup_theme', 'wp_christiancrew_setup');

/**
 * Custom URL getter
 *
 * Checks if our site is sitting on the live or dev server
 * add returns the appropriate URL string
 */
function get_root_blog_url($root = false) {

	$url = '';

	if (site_url() == 'http://localhost/sites/thechristiancrew') {
		$url = 'http://localhost/sites';
	} else {
		$url = site_url();
	}

	return $url;

}

/**
 * Load scripts
 */
function wp_christiancrew_scripts() {

	// Load our main stylesheet
	wp_enqueue_style('theme-style', get_stylesheet_uri(), false, '4.0');

	// Load FontAwesome
	wp_enqueue_style( 'fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css', false, '4.6.1' );

	// Load main JavaScript file
	wp_enqueue_script( 'cc-script', get_template_directory_uri() . '/assets/js/cc.min.js', array( 'jquery' ), '12312015', true );

}
add_action('wp_enqueue_scripts', 'wp_christiancrew_scripts');

/**
 * Register dynamic sidebar(s)
 */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Home Page',
		'id'   => 'home-widgets',
		'description'   => 'Widgets that go in the home page container.',
	));
}

/**
 * Add page slug to body_class
 * Source: http://www.wpbeginner.com/wp-themes/how-to-add-page-slug-in-body-class-of-your-wordpress-themes/
 */
function add_page_slug( $classes ) {

	global $post;

	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}

	return $classes;
}
add_filter( 'body_class', 'add_page_slug' );
