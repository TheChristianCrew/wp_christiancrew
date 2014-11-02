<div id="sidebar">

	<?php
		if (is_home() || is_single() || is_archive()) {
			if (function_exists('dynamic_sidebar') && dynamic_sidebar('blog_sidebar')) : else : ?>
	
				<!-- If no dynamic sidebar exists, use the content below -->
				Error loading sidebar
		
			<?php endif;
		} else {
			if (function_exists('dynamic_sidebar') && dynamic_sidebar($post->post_name .'_page_sidebar')) : else : ?>
	
				<!-- If no dynamic sidebar exists, use the content below -->
				Error loading <?php echo $post->post_name; ?> sidebar
		
			<?php endif;		
		}
	?>

</div> <!-- /sidebar -->