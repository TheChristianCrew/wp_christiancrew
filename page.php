<?php get_header() ?>

<div class="page-wrap">

	<h1 class="page-title"><?php the_title(); ?></h1>

	<div class="page-container">

		<?php get_template_part('partials/page', 'loop') ?>

	</div>

</div>

<?php get_footer(); ?>
