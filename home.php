<?php get_header(); ?>

<div class="page-wrap">
	<div class="home-intro">
		<div class="home-intro-inner">
			<h2>Welcome to Christian Crew Gaming.</h2>
			<p>Our mission is to be a gaming community that provides a clean environment, great fellowship, and exciting gameplay.</p>
		</div>
	</div>
	<div class="home-container">
		<div class="grid">
			<?php if ( is_active_sidebar( 'home-widgets' ) ) : ?>
				<?php dynamic_sidebar( 'home-widgets' ); ?>
			<?php endif; ?>
		</div>
		<div class="divisions_list grid">
			<h2>Current Divisions</h2>
			<?php do_action( 'cc_get_division_list' ); ?>
		</div>
	</div>
</div>

<ul id="scene" class="scene-home">
	<li class="layer" data-depth="0.20"><div class="background"></div></li>
	<li class="layer" data-depth="0.40"><div class="chopper"></div></li>
</ul>

<?php get_footer(); ?>
