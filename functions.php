<?php

/**
 * Setup our theme defaults
 */
function theme_setup() {

	// Add feed links to <head>
	add_theme_support('automatic-feed-links');

	// Register nav menu
	register_nav_menu('primary', 'Primary Navigation Menu');

}
add_action('after_setup_theme', 'theme_setup');

/**
 * Enqueue scripts and styles
 */
function theme_scripts_styles() {

	// Load our main stylesheet
	wp_enqueue_style('theme-style', get_stylesheet_uri(), false, '1.0');

}
add_action('wp_enqueue_scripts', 'theme_scripts_styles');

/**
 * Register dynamic sidebar(s)
 */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Home Page Widgets',
		'id'   => 'home_page_widgets',
		'description'   => 'These widgets get displayed on the home page.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));
	register_sidebar(array(
		'name' => 'About Sidebar',
		'id'   => 'about_page_sidebar',
		'description'   => 'About page sidebar.',
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