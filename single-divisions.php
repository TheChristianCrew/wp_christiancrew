<?php
/**
 * Template name: Divisions
 */

get_header() ?>

<div class="page-wrap">

	<article>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="page-container grid">
      <div class="grid-4-4">
			  <?php get_template_part('partials/page', 'loop') ?>
      </div>
			<div>
				<?php echo do_shortcode( '[phpbb-list-members users="'. get_post_meta( $post->ID, '_division_leader_ids', true ) .'"]' ); ?>
			</div>
		</div>

	</article>

</div>

<?php get_footer(); ?>
