<?php get_header(); ?>

	<h1>News</h1>
	
	<div class="column_left">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article <?php post_class('box_shadow') ?> id="post-<?php the_ID(); ?>">
				<h2 class="post_title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
				<?php include(TEMPLATEPATH .'/inc/meta.php'); ?>
				<div class="entry">
					<?php the_content(); ?>
				</div> <!-- /entry -->
			</article> <!-- /post_classes -->
		<?php endwhile; ?>
	
		<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>

		<?php else : ?>
			<h2>No articles were found!</h2>
		<?php endif; ?>
		
	</div><!-- /column_left -->
	
	<div class="column_right">
	
		<?php get_sidebar(); ?>
		
	</div><!-- /column_right -->
	
<?php get_footer(); ?>