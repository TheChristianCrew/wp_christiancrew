<?php get_header(); ?>

	<div class="page-title">
	
		<div class="inner-wrap">
		
			<h2><?php the_title(); ?></h2>
			
		</div>
	
	</div>
	
	<div class="container">
	
		<div class="inner-wrap grid">
		
			<?php if (is_active_sidebar(get_post($post->post_parent)->post_name .'_page_sidebar')) { ?>
		
				<div class="col-8">
				
					<?php get_page_loop(); ?>
				
				</div>
				
				<div class="col-4">
					
					<?php get_sidebar(); ?>
					
				</div>
			
			<?php } else { ?>
			
				<div class="col-12">
				
					<?php get_page_loop(); ?>
				
				</div>
				
			<?php } ?>
		
		</div>
		
	</div>
	
<?php get_footer(); ?>