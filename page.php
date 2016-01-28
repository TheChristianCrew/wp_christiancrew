<?php get_header() ?>

<div class="page-wrap">

	<article>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="page-container">
			<?php get_template_part('partials/page', 'loop') ?>
		</div>

	</article>

</div>

<?php get_footer(); ?>
