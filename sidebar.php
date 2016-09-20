<div id="sidebar">
	
	<?php
		// Get page ancestors
		// Have to store in variable for PHP < 5.4
		$ancestors = get_post_ancestors($post);
	?>

	<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar(get_post($ancestors[0])->post_name .'_page_sidebar') || dynamic_sidebar(get_post($ancestors[1])->post_name .'_page_sidebar')) : else : ?>
	
		<!-- If no dynamic sidebar exists, use the content below -->
		Error loading <?php echo $post->post_name; ?> sidebar
		
	<?php endif; ?>

</div> <!-- /sidebar -->
