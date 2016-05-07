<?php
/**
 * Template name: Divisions
 */

get_header() ?>

<div class="page-wrap">

	<article>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="container">
			<div class="grid grid-pad">
	      <div class="col-1-1">
					<ul class="division-links">
						<li><a href="<?php echo get_post_meta($post->ID, '_steam_store_link', true); ?>"><i class="fa fa-shopping-cart fa-fw"></i> Steam Store Page</a></li>
						<li><a href="<?php echo phpbb::$url .'viewforum.php?f='. get_post_meta($post->ID, '_forum_id', true); ?>"><i class="fa fa-comments fa-fw"></i> Forum Section</a></li>
					</ul>
				  <?php get_template_part('partials/page', 'loop') ?>
	      </div>
			</div>
			<div class="grid grid-pad">
				<div class="col-1-3">
					<h2>Division Leaders</h2>
					<?php echo do_shortcode( '[phpbb-list-members users="'. get_post_meta( $post->ID, '_division_leader_ids', true ) .'"]' ); ?>
				</div>
				<div class="col-2-3">
					<h2>Division Info</h2>
					<section class="division_info">
						Division info.
					</section>
				</div>
			</div>
			<div class="grid grid-pad">
				<h2>Recent Topics</h2>
				<?php echo do_shortcode( '[phpbb-list-topics limit="4" forum_id="'. get_post_meta( $post->ID, '_forum_id', true ) .'"]' ); ?>
			</div>
		</div>

	</article>

</div>

<?php get_footer(); ?>
