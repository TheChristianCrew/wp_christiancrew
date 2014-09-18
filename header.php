<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<!-- Page Setup -->
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('title'); ?></title>
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

	<header id="site-header">
		<div class="inner-wrap">
			<a id="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?></a>
			<nav id="site-nav">
				<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'none')); ?>
			</nav>
		</div>
	</header>