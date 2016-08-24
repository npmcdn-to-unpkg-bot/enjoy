<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head();?>
</head>
<body <?php // body_class();?> class="<?php if(is_singular('product')){echo'project-page';}?>">
<header>
	<div class="header-wrapper">
		<div class="logo-wrapper">
			<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.png" alt="">
		</div>
		<div class="menu-wrapper">
			<?php
				if(function_exists('wp_nav_menu'))
				wp_nav_menu( array( 'menu_class' => 'menu', 'container' => 'none', 'theme_location' => 'menu_head') );
			?>
		</div>
		<div class="bucket-wrapper">
			<div class="bucket cart_totals">
				<span class="count "><?php echo WC()->cart->get_cart_contents_count(); ?></span>
				<a href="<?php echo get_option('home');?>/cart"></a>
			</div>
		</div>
		<div class="open-menu-button">
			<span></span><span></span><span></span>
		</div>
	</div>
</header>