<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>
	<title>
		<?php if (is_front_page()) {
			echo bloginfo('name'); echo ' - '; echo bloginfo('description');
		} elseif (is_404()) {
			echo 'Page Not Found';
		} elseif (is_archive()) {
			echo 'Archive for '; wp_title(''); echo ' | '; echo bloginfo('name');
		} elseif (is_search()) {
			echo bloginfo('name'); echo 'Search Results for'; echo $_GET['s'];
		} else {
			echo wp_title(''); echo ' | '; echo bloginfo('name');
		}
		?>
	</title>
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="http://localhost/sites/_thechristiancrew/theme/christiancrew_v2.2/global.css" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header id="ccgaming_site_header">
	
		<a id="ccgaming_site_banner" href="<?php bloginfo('url'); ?>"><img src="http://localhost/sites/_thechristiancrew/theme/christiancrew_v2.2/assets/img/site_banner.png" alt="Christian Crew Gaming - A faith based gaming community" /></a>
		
		<nav id="ccgaming_site_nav">
			<?php wp_nav_menu(array('theme_location' => 'ccgaming_primary_site_nav')); ?>
			<?php wp_nav_menu(array('theme_location' => 'ccgaming_secondary_site_nav', 'container_id' => 'ccgaming_secondary_site_nav')); ?>
		</nav> <!-- /ccgaming_site_nav -->
		
		<nav id="ccgaming_social_links">
			<li class="twitter"><a href="http://twitter.com/ccgamingonline">Twitter</a></li>
			<li class="facebook"><a href="http://facebook.com/ccgaming">Facebook</a></li>
			<li class="steam"><a href="http://steamcommunity.com/groups/christiancrewgaming">Steam</a></li>
			<li class="rss"><a href="http://ccgaming.com/feed">RSS</a></li>
		</nav> <!-- /ccgaming_social_links -->
	
	</header> <!-- /ccgaming_site_header -->
	
	<div id="ccgaming_site_subnav">
		<?php
		if (is_page('about') || $post->post_parent == '2') {
			wp_nav_menu(array('theme_location' => 'about_sub_nav'));
		} else if (is_home() || is_archive() || is_single()) {
			wp_nav_menu(array('theme_location' => 'news_sub_nav'));
		}
		?>
	</div><!-- /ccgaming_site_subnav -->
	
	<div id="ccgaming_site_container">