<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="cc-site-header">
		<div class="cc-inner-wrap">
			<?php if ( is_front_page() && is_home() ) : ?>
				<h1 class="cc-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
					<p class="cc-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php endif; ?>
			<nav class="cc-site-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'site_nav' ) ); ?>
			</nav>
			<ul class="cc-connect-links">
				<li><a href="#tsviewer" id="ts_btn"></a></li>
			</ul>
			<div id="tsviewer" class="white-popup mfp-hide">
				<div id="ts3viewer_901891" style="width:; background-color:;"> </div>
				<script type="text/javascript">
				<!--
				var ts3v_url_1 = "https://www.tsviewer.com/ts3viewer.php?ID=901891&text=000000&text_size=12&text_family=1&js=1&text_s_weight=bold&text_s_style=normal&text_s_variant=normal&text_s_decoration=none&text_s_color_h=525284&text_s_weight_h=bold&text_s_style_h=normal&text_s_variant_h=normal&text_s_decoration_h=underline&text_i_weight=normal&text_i_style=normal&text_i_variant=normal&text_i_decoration=none&text_i_color_h=525284&text_i_weight_h=normal&text_i_style_h=normal&text_i_variant_h=normal&text_i_decoration_h=underline&text_c_weight=normal&text_c_style=normal&text_c_variant=normal&text_c_decoration=none&text_c_color_h=525284&text_c_weight_h=normal&text_c_style_h=normal&text_c_variant_h=normal&text_c_decoration_h=underline&text_u_weight=bold&text_u_style=normal&text_u_variant=normal&text_u_decoration=none&text_u_color_h=525284&text_u_weight_h=bold&text_u_style_h=normal&text_u_variant_h=normal&text_u_decoration_h=none";
				ts3v_display.init(ts3v_url_1, 901891, 100);
				-->
				</script>
			</div>
		</div>
	</header>
