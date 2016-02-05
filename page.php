<?php get_header() ?>

<div class="page-wrap">

	<article>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="page-container grid">
			<div class="grid-4-4">
				<?php get_template_part('partials/page', 'loop') ?>
			</div>
		</div>

	</article>

</div>

<?php get_footer(); ?>
