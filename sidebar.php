<?php
	if (is_front_page()) {
	
		if (function_exists('dynamic_sidebar') && dynamic_sidebar('home_page_widgets')) : else : ?>

			<!-- If no dynamic sidebar exists, use the content below -->
			Error loading sidebar.
	
		<?php endif;
	} else {
		if (function_exists('dynamic_sidebar') && dynamic_sidebar(get_post($post->post_parent)->post_name .'_page_sidebar')) : else : ?>

			<!-- If no dynamic sidebar exists, use the content below -->
			Error loading <?php echo $post->post_name; ?> sidebar.
	
		<?php endif;		
	}
?>