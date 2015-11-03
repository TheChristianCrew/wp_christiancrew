<?php get_header() ?>

	<section id="cc-page-title">
		<div class="cc-inner-wrap">
			<h2><?php the_title(); ?></h2>
	</section>
	
	<div class="cc-container">
		
		<div class="cc-inner-wrap grid">
			
			<?php if (is_active_sidebar(get_post($post->post_parent)->post_name .'_page_sidebar')) { ?>
		
				<div class="col-4">
					
					<?php get_sidebar(); ?>
					
				</div>				
				
				<div class="col-8">
				
					<?php get_page_loop(); ?>
				
				</div>
			
			<?php } else { ?>
			
				<div class="col-12">
				
					<?php get_page_loop(); ?>
				
				</div>
				
			<?php } ?>			
			
		</div>
		
	</div>

<?php get_footer(); ?>