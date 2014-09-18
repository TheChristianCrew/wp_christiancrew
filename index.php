<?php get_header(); ?>

	<div id="home-introduction" class="page-title">
	
		<div class="inner-wrap grid">
		
			<div class="col-8">
		
				<h2>Welcome to The Christian Crew</h2>
				
				<p>We are The Christian Crew - a Christian gaming community founded in 2003. Our mission is to provide a gaming community with a clean environment, of fellowship, and exciting gameplay. We are committed to the ministry and growth of our community for the Kingdom of God, presenting the Gospel of Jesus Christ as the fundamental truth of God. We believe that we are Christians first, and fellow gamers second.</p>
		
				<p>Welcome to our community!</p>
				
			</div>
			
			<div class="col-4">
			
				Call to action buttons.
			
			</div>
			
		</div>
	
	</div>

	<div class="container">
	
		<div class="inner-wrap grid">
		
			<div class="col-8">
			
				<h2>News &amp; Announcements</h2>
	
				<?php do_shortcode('[phpbb-list-topics include="2"]'); ?>
				
			</div>
			
			<div class="col-4">
			
				<?php get_sidebar(); ?>
			
			</div>
			
		</div>

	</div>
	
<?php get_footer(); ?>