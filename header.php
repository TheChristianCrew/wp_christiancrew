<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!-- Page Setup -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<!-- Font Awesome -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- WordPress Head Hook -->
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

	<header id="cc-site-header">

		<div class="cc-inner-wrap">

			<a id="cc-site-banner" href="<?php bloginfo('url'); ?>"><img src="<?php echo get_root_blog_url(); ?>/cc-global-theme/v3/img/cc-site-banner.png" alt="Christian Crew Gaming - A faith based gaming community" /></a>

			<nav id="cc-site-nav">
				<?php wp_nav_menu(array('theme_location' => 'primary_site_nav')); ?>
			</nav>

			<ul id="cc-social-links">
				<li class="twitter"><a href="http://twitter.com/ccgamingonline"><i class="fa fa-twitter-square"></i></a></li>
				<li class="facebook"><a href="http://facebook.com/ccgaming"><i class="fa fa-facebook-square"></i></a></li>
				<li class="steam"><a href="http://steamcommunity.com/groups/christiancrewgaming"><i class="fa fa-steam-square"></i></a></li>
				<li class="feed"><a href="http://forums.ccgaming.com/syndication.php?t=1&fid=82"><i class="fa fa-rss-square"></i></a></li>
			</ul>

		</div>

	</header>
