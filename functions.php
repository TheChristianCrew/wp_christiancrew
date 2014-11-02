<?php

/**
 * Clean up the <head> section
 */
function removeHeadLinks() {
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
}
add_action('init', 'removeHeadLinks');

/**
 * Add support for the RSS feed in the <head> section
 */
add_theme_support('automatic-feed-links');

/**
 * Add support for custom post formats
 * http://codex.wordpress.org/Post_Formats
 */
add_theme_support( 'post-formats', array( 'aside', 'link', 'image', 'quote', 'status', 'video' ) );

/**
 * Load jQuery via Google
 */
if( !is_admin()){
   wp_deregister_script('jquery'); 
   wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"), false, '1.4'); 
   wp_enqueue_script('jquery');
}

/**
 * Register dynamic sidebar(s)
 */
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Introduction Widgets',
		'id'   => 'introduction_widgets',
		'description'   => 'These widgets get displayed to the right of the introduction on the home page.',
		'before_widget' => '<div id="%1$s" class="widget intro_widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Quick Updates Sidebar',
		'id'   => 'quickupdates_widgets',
		'description'   => 'These widgets get displayed underneath the Get Involved section on the home page.',
		'before_widget' => '<div id="%1$s" class="widget quickupdate_widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id'   => 'blog_sidebar',
		'description'   => 'The front page and blog sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4><span>',
		'after_title'   => '</span></h4>'
	));
	register_sidebar(array(
		'name' => 'Gaming Sidebar',
		'id'   => 'gaming_page_sidebar',
		'description'   => 'The Gaming page sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4><span>',
		'after_title'   => '</span></h4>'
	));
	register_sidebar(array(
		'name' => 'Donate Sidebar',
		'id'   => 'donate_page_sidebar',
		'description'   => 'The Donate page sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4><span>',
		'after_title'   => '</span></h4>'
	));
	register_sidebar(array(
		'name' => 'Dispatch Sidebar',
		'id'   => 'dispatch_page_sidebar',
		'description'   => 'The Dispatch page sidebar.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4><span>',
		'after_title'   => '</span></h4>'
	));
}

/**
 * Register nav menus
 */
function ccgaming_register_nav_menus() {
	register_nav_menus(
		array(
			'ccgaming_primary_site_nav' => __('Primary Site Nav'),
			'ccgaming_secondary_site_nav' => __('CCGaming Secondary Site Nav'),
			'about_sub_nav' => __('About Page Sub Nav'),
			'news_sub_nav' => __('News Page Sub Nav'),
		)
	);
}
add_action('init', 'ccgaming_register_nav_menus');

/**
 * Make some changes to the site navigational menu
 */
function ccgaming_nav_menu_args($args = '') {
	
	// Make the home page selectable in the menu editor
	$args['show_home'] = true;
	
	// Return the arguments
	return $args;
}
add_filter( 'wp_page_menu_args', 'ccgaming_nav_menu_args' );

/**
 * Get and display the theme's version
 */
function get_theme_version() {
	
	$theme = wp_get_theme();
	
	echo 'v'. $theme->Version;
	
}

?>
