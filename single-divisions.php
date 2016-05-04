<?php
/**
 * Template name: Divisions
 */

get_header() ?>

<div class="page-wrap">

	<article>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="page-container">
			<div class="grid">
	      <div class="grid-4-4">
					<ul class="division-links">
						<li><a href="<?php echo get_post_meta($post->ID, '_steam_store_link', true); ?>"><i class="fa fa-shopping-cart fa-fw"></i> Steam Store Page</a></li>
						<li><a href="<?php echo phpbb::$url .'viewforum.php?f='. get_post_meta($post->ID, '_forum_id', true); ?>"><i class="fa fa-comments fa-fw"></i> Forum Section</a></li>
					</ul>
				  <?php get_template_part('partials/page', 'loop') ?>
	      </div>
			</div>
			<div class="grid">
				<div class="grid-2-4">
					<h2>Division Leaders</h2>
					<?php echo do_shortcode( '[phpbb-list-members users="'. get_post_meta( $post->ID, '_division_leader_ids', true ) .'"]' ); ?>
				</div>
				<div class="grid-2-4">
					<h2>Division Info</h2>
					<section class="division_info">
						Division info.
					</section>
				</div>
			</div>
		</div>

	</article>

</div>

<?php get_footer(); ?>
