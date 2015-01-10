<?php

/**
 * Setup our theme defaults
 */
function theme_setup() {

	// Add feed links to <head>
	add_theme_support('automatic-feed-links');

	// Let WordPress handle document titles
	add_theme_support('title-tag');

	// Register nav menu
	register_nav_menus(array(
		'site_nav' => 'Site Nav',
	));

}
add_action('after_setup_theme', 'theme_setup');

/**
 * Enqueue scripts and styles
 */
function theme_scripts_styles() {

	// Load CC Global stylesheet
	wp_enqueue_style('global-style', get_stylesheet_directory_uri() .'/assets/css/cc-global.css', false, '1.0');

	// Load our main stylesheet
	wp_enqueue_style('theme-style', get_stylesheet_uri(), false, '1.0');

}
add_action('wp_enqueue_scripts', 'theme_scripts_styles');

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
		'name' => 'About Sidebar',
		'id'   => 'about_page_sidebar',
		'description'   => 'The About page sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
}

/**
 * Get page loop
 */
function get_page_loop() {

	echo '<div class="entry">';

	while ( have_posts() ) : the_post();

		// Get the page content
		the_content();

	endwhile;

	echo '</div>';

}
