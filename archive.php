<?php get_header(); ?>

	<?php
		if (is_category()) {
			// If this is a category archive
			echo '<h1>'. single_term_title('', false) .'</h1>';
		} elseif (is_tag()) {
			// If this is a tag archive
			echo '<h1>Posts Tagged &#8216;'. single_tag_title() .'&#8217;</h1>';
		} elseif (is_day()) {
			// If this is a daily archive
			echo '<h1>Archive for '. the_time('F jS, Y') .'</h1>';
		} elseif (is_month()) {
			// If this is a monthly archive
			echo '<h1>Archive for '. the_time('F, Y') .'</h1>';
		} elseif (is_year()) {
			// If this is a yearly archive
			echo '<h1>Archive for '. the_time('Y') .'</h1>';
		} else {
			echo '<h1>Archives</h1>';
		}
	?>

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
		
	</div>
	
	<div class="column_right">
		
		<?php get_sidebar(); ?>
		
	</div>
	
<?php get_footer(); ?>