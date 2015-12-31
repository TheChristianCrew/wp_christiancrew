<?php

/**
 * Setup our theme defaults
 */
function wp_christiancrew_setup() {

	// Add feed links to <head>
	add_theme_support('automatic-feed-links');

	// Let WordPress handle document titles
	add_theme_support('title-tag');

	// Register nav menu
	register_nav_menus(array(
		'site_nav' => 'Site Nav',
	));

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

	// Load main JavaScript file
	wp_enqueue_script( 'cc-script', get_template_directory_uri() . '/assets/js/cc.min.js', array( 'jquery' ), '12312015', true );

	// Load TSViewer
	wp_enqueue_script( 'tsviewer', 'https://static.tsviewer.com/short_expire/js/ts3viewer_loader.js', '', true );

}
add_action('wp_enqueue_scripts', 'wp_christiancrew_scripts');

/**
 * Register dynamic sidebar(s)
 */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Home Sidebar Widgets',
		'id'   => 'home_sidebar_widgets',
		'description'   => 'Home page sidebar widgets.',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Announcements',
		'id'   => 'announcement_widgets',
		'description'   => 'Announcement widgets.',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>'
	));
	register_sidebar(array(
		'name' => 'Divisions Sidebar',
		'id'   => 'divisions_page_sidebar',
		'description'   => 'The Divisions page sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
	register_sidebar(array(
		'name' => 'Get Involved Sidebar',
		'id'   => 'getinvolved_page_sidebar',
		'description'   => 'The Get Involved page sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
	register_sidebar(array(
		'name' => 'About Sidebar',
		'id'   => 'about_page_sidebar',
		'description'   => 'The About page sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
}
