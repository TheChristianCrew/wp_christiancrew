<?php get_header(); ?>

		<section id="introduction">
			<div class="introduction_column_left">
				<h1>Welcome to The Christian Crew</h1>
				
				<p>We are The Christian Crew, a Christian gaming community founded in 2003. Our mission is to provide a gaming community with a clean environment, of fellowship, and exciting gameplay.</p>
				
				<p>We are committed to the ministry and growth of our community for the Kingdom of God, presenting the Gospel of Jesus Christ as the fundamental truth of God. We believe that we are Christians first, and fellow gamers second.</p>
				
				<p>Welcome to our community!</p>
			</div>
			<div class="introduction_column_right">
			
			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('introduction_widgets')) : else : ?>
	
				<!-- If no dynamic sidebar exists, use the content below -->
				Failed to load introduction widgets.
		
			<?php endif; ?>
			
			</div>
		</section>
		
		<section id="get_involved">
			<h1>Get Involved</h1>
			
			<nav>
				<ul>
					<li class="play left"><a href="<?php bloginfo('url') ?>/gaming">Play <span>Join us in our servers for a good time of fun and fellowship!</span></a></li>
					<li class="chat"><a href="http://forums.ccgaming.com">Chat <span>Come to the forums and join in on the conversation!</span></a></li>
					<li class="join left"><a href="<?php bloginfo('url') ?>/join">Join <span>Ready to become a member of the Christian Crew? Join now!</span></a></li>
					<li class="donate last"><a href="<?php bloginfo('url') ?>/donate">Donate <span>Help support us and keep our servers online!</span></a></li>
				</ul>
			</nav>
		</section><!-- /get_involved -->
		
		<section id="quickupdates">
		
			<h1>Quick Updates</h1>
			
			<section id="banner_rotator">
			
				<?php if ( function_exists( 'soliloquy_slider' ) ) soliloquy_slider( '1047' ); ?>
			
			</section><!-- /banner_rotator -->
		
			<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('quickupdates_widgets')) : else : ?>
	
				<!-- If no dynamic sidebar exists, use the content below -->
				Failed to load quick updates widgets.
		
			<?php endif; ?>
			
		</section>

<?php get_footer(); ?>