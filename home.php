<?php get_header(); ?>

<div class="page-wrap">
	<div class="home-intro">
		<div class="home-intro-inner">
			<h2>Welcome to Christian Crew Gaming.</h2>
			<p>Our mission is to be a gaming community that provides a clean environment, great fellowship, and exciting gameplay.</p>
		</div>
	</div>
	<div class="page-container home-container">
		<?php
			$divisions = new WP_Query( array( 'post_type' => 'cc_divisions' ) );
			while ( $divisions->have_posts() ) : $divisions->the_post();
		?>
			<div class="division-thumb grid-4-4">
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( 'division-thumb' ); ?>
					<?php the_title(); ?>
				</a>
			</div>
		<?php endwhile; ?>
	</div>
</div>

<ul id="scene" class="scene-home">
	<li class="layer" data-depth="0.20"><div class="background"></div></li>
	<li class="layer" data-depth="0.40"><div class="chopper"></div></li>
</ul>

<?php get_footer(); ?>
