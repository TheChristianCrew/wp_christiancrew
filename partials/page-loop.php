<div class="entry">
	<?php
		while ( have_posts() ) : the_post();
			the_content();
		endwhile;
	?>
</div>
