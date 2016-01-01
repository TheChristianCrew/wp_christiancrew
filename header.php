<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header class="cc-site-header">
		<div class="cc-inner-wrap">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="cc-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
					<p class="cc-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<nav class="cc-site-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'site_nav' ) ); ?>
			</nav>
			<ul class="cc-connect-links">
				<li><a href="#tsviewer" id="ts_btn"><i class="fa fa-headphones"></i></a></li>
				<li><a href="https://steamcommunity.com/groups/christiancrewgaming"><i class="fa fa-steam"></i></a></li>
				<li><a href="https://twitter.com/ccgamingonline"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://facebook.com/ccgaming"><i class="fa fa-facebook"></i></a></li>
			</ul>
		</div>
	</header>
