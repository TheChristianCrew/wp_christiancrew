<?php get_header(); ?>

<div class="page-wrap">

	<div class="home-intro">
		<div class="grid no-pad">
			<div class="push-4-12 mobile-col-1-1 no-pad">
				<h2>Welcome to Christian Crew Gaming.</h2>
				<p>Our mission is to be a gaming community that provides a clean environment, great fellowship, and exciting gameplay.</p>
			</div>
		</div>
	</div>

	<div class="container bg-white">
		<div class="grid grid-pad">
			<?php if ( is_active_sidebar( 'home-widgets' ) ) : ?>
				<?php dynamic_sidebar( 'home-widgets' ); ?>
			<?php endif; ?>
		</div>
		<div class="divisions_list">
			<div class="grid grid-pad">
				<h2>Current Divisions</h2>
				<?php do_action( 'cc_get_division_list' ); ?>
			</div>
		</div>
	</div>
</div>

<ul id="scene" class="scene-home">
	<li class="layer" data-depth="0.10"><div class="background"></div></li>
	<li class="layer" data-depth="0.20"><div class="lol_girl"></div></li>
	<li class="layer" data-depth="0.30"><div class="lol_guy"></div></li>
	<li class="layer" data-depth="0.40"><div class="rl_ball"></div></li>
	<li class="layer" data-depth="0.30"><div class="rl_car"></div></li>
	<li class="layer" data-depth="0.50"><div class="tf2_pryo"></div></li>
	<li class="layer" data-depth="0.10"><div class="mission_bg"></div></li>
</ul>

<?php get_footer(); ?>
