<?php get_header() ?>

<div class="page-wrap">

	<article>

		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="container">
			<div class="grid grid-pad">
				<div class="col-1-1">
					<?php get_template_part('partials/page', 'loop') ?>
				</div>
			</div>
		</div>

	</article>

</div>

<?php get_footer(); ?>
