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

	<header class="site-header">
		<div class="inner-wrap">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<nav class="site-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'site_nav' ) ); ?>
			</nav>
			<ul class="connect-links">
				<li><a href="<?php echo get_template_directory_uri(); ?>/tsviewer.php" class="ts-btn"><span><em class="ts-users">-</em> on TeamSpeak</span> <i class="fa fa-headphones"></i></a></li>
				<li><a href="https://steamcommunity.com/groups/christiancrewgaming"><i class="fa fa-steam"></i></a></li>
				<li><a href="https://twitter.com/ccgamingonline"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://facebook.com/ccgaming"><i class="fa fa-facebook"></i></a></li>
			</ul>
		</div>
	</header>
