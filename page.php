<?php

/**
 * Place 'the loop' inside a function so we can reuse it
 */
function get_loop() {
	
	if (have_posts()) : while (have_posts()) : the_post(); ?>
		
	<div class="page" id="post-<?php the_ID(); ?>">

		<h1><?php the_title(); ?></h1>

		<div class="entry">

			<?php the_content(); ?>

			<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

		</div> <!-- /entry -->

	</div> <!-- /page -->

<?php endwhile; endif;
	
}
	
/**
 * Get the header
 */
get_header();

/**
 * Check if the page has an active sidebar
 *
 * If yes, make the page multi-column
 * Otherwise make it a fullwidth page
 */
if (is_active_sidebar($post->post_name .'_page_sidebar')) {
	
	echo '<div class="column_left">';
	
		get_loop();
	
	echo '</div>
	
	<div class="column_right">';
	
		get_sidebar();
		
	echo '</div>';
	
} else {
	
	get_loop();
	
}

/**
 * Get the footer
 */
get_footer();
	
?>