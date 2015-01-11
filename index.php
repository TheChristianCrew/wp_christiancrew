<?php get_header(); ?>

	<section id="cc-page-title" class="cc-home-intro">

		<div class="cc-inner-wrap grid">

			<div class="col-8">
				<h1>Welcome to The Christian Crew</h1>

				<p>We are The Christian Crew, a Christian gaming community founded in 2003. Our mission is to provide a gaming community with a clean environment, of fellowship, and exciting gameplay.</p>

				<p>We are committed to the ministry and growth of our community for the Kingdom of God, presenting the Gospel of Jesus Christ as the fundamental truth of God. We believe that we are Christians first, and fellow gamers second.</p>

				<p>Welcome to our community!</p>
			</div>

		</div>

	</section>

	<div class="cc-container">

		<div class="cc-inner-wrap grid">

			<div class="col-8">

				<section id="mission-statement">

					<h2>Our Mission Statement</h2>

					<p>We, the members of “The Christian Crew”, stand united in our effort to provide the online gaming community with a clean environment, of fellowship and exciting game play.</p>

					<p>Our members will conduct themselves with integrity and decency, reflecting true Christian Character, in order that our Lord and Savior Jesus Christ might be honored and glorified.</p>

					<p>We are committed to the ministry and growth of our community for the Kingdom of God, presenting the Gospel of Jesus Christ as the fundamental truth of God. Finally, we pledge to never forget that we are Christians first, and fellow gamers second.</p>

				</section>

				<section id="announcements">

					<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('announcements')) : else : ?>
						<!-- If no dynamic sidebar exists, use the content below -->
						Failed to load announcements.
					<?php endif; ?>

					<a href="https://forums.ccgaming.com/viewforum.php?f=82">View More</a>

				</section>

			</div>

			<div class="col-4">

				<div class="cc-home-sidebar">

					<div class="widget">

						<h3>Get Involved</h3>

						<ul class="cc-intro-links">
							<li class="join"><a href="<?php bloginfo('url') ?>/join"><i class="fa fa-pencil"></i> Become A Member <span>Apply for CC Membership</span></a></li>
							<li class="play"><a href="<?php bloginfo('url') ?>/divisions"><i class="fa fa-gamepad"></i> Play <span>Find a game and play with us</span></a></li>
							<li class="chat"><a href="http://forums.ccgaming.com"><i class="fa fa-comment"></i> Chat <span>Join the discussion on the forums</span></a></li>
							<li class="donate"><a href="http://ccgaming.com/donate"><i class="fa fa-dollar"></i> Donate <span>Help us keep our servers online</span></a></li>
							<li class="more"><a href="#"><i class="fa fa-arrow-right"></i> More <span>Find more ways to get involved!</span></a></li>
						</ul>

					</div>

					<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('home_sidebar_widgets')) : else : ?>
						<!-- If no dynamic sidebar exists, use the content below -->
						Failed to load home sidebar.
					<?php endif; ?>

				</div>

			</div>

		</div>

	</div>

<?php get_footer(); ?>
