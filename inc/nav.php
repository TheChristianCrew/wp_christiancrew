<?php 

if (function_exists('wp_pagenavi')) {
	wp_pagenavi();
}
else {
	echo '<div class="message_box error">
		Missing plugin: WP-PageNavi.
	</div>';
}

?>