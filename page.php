<?php

get_header();

// Get page ancestors
$ancestors = get_post_ancestors($post);

?>

<div class="page-wrap">

	<article>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="container">
			<div class="grid grid-pad">
				<?php if (is_active_sidebar(get_post($ancestors[0])->post_name .'_page_sidebar') || is_active_sidebar(get_post($ancestors[1])->post_name .'_page_sidebar')) : ?>
					<div class="col-3-12">
						<?php get_sidebar() ?>
					</div>
					<div class="col-9-12">
						<?php get_template_part('partials/page', 'loop') ?>
					</div>
				<?php else : ?>
					<div class="col-1-1">
						<?php get_template_part('partials/page', 'loop') ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

	</article>

</div>

<?php get_footer(); ?>
