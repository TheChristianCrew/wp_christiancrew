<?php get_header() ?>

	<?php
		// Get page ancestors
		// Have to store in variable for PHP < 5.4
		$ancestors = get_post_ancestors($post);
	?>

	<section id="cc-page-title">
		<div class="cc-inner-wrap">
			<h1><?php the_title(); ?></h1>
		</div>
	</section>

	<div class="cc-container">

		<div class="cc-inner-wrap grid">

			<?php if (is_active_sidebar(get_post($ancestors[0])->post_name .'_page_sidebar') || is_active_sidebar(get_post($ancestors[1])->post_name .'_page_sidebar')) : ?>

				<div class="col-4">

					<?php get_sidebar(); ?>

				</div>

				<div class="col-8 has-sidebar">

					<?php if (has_nav_menu(get_post($ancestors[0])->post_name .'_page_nav')) : ?>
						<nav id="cc-page-nav">
							<?php wp_nav_menu(array('theme_location' => get_post($ancestors[0])->post_name .'_page_nav')); ?>
						</nav>
					<?php elseif (has_nav_menu(get_post($ancestors[1])->post_name .'_page_nav')) : ?>
						<nav id="cc-page-nav">
							<?php wp_nav_menu(array('theme_location' => get_post($ancestors[1])->post_name .'_page_nav')); ?>
						</nav>
					<?php endif; ?>

					<?php get_page_loop(); ?>

				</div>

			<?php else : ?>

				<div class="col-12">

					<?php get_page_loop(); ?>

				</div>

			<?php endif; ?>

		</div>

	</div>

<?php get_footer(); ?>
