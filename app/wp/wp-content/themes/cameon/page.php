<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php wp_title('', true, 'right'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head();?>
</head>
<body class="logo-sports <?php if(get_post_meta($post->ID, 'ok_show_pattern', true) == "1"){?>show-pattern<?php }?>">

<header>
	<div>
		<div class="row">
			<div class="columns small-6 large-6">
				<div class="logo-wrapper">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo-sports.png" alt="" class="sports">
					<img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo-casino.png" alt="" class="casino">
				</div>
			</div>
			<div class="columns small-6 large-6">
				<div class="login-wrapper">
					<p>Already a customer? <a href="<?php echo get_post_meta($post->ID, 'ok_login_link', true);?>" class="button">Login</a></p>
				</div>
			</div>
		</div>
	</div>
</header><div class="bg-image">
	<div class="image" style="background:url('<?php echo get_post_meta($post->ID, 'ok_header_background', true);?>') no-repeat center bottom"></div>
	<span class="pattern"></span>
</div>	<div class="content">
<div class="top-text">
	<div class="row">
		<div class="columns large-4 medium-6 large-centered medium-centered">
			<h1><?php echo get_post_meta($post->ID, 'ok_losung', true); ?></h1>
		</div>
	</div>
</div><div class="row offers">
	<div class="columns large-12">
		<div class="items-wrapper">
<?php $offers = get_post_meta( $post->ID, 'offers', true ); 
foreach( $offers as $offer){ 
	$image_attributes = wp_get_attachment_image_src( $attachment_id = $offer['team'], $size = 'full' );?>
			<div class="item">
				<div>
					<div class="image" style="background:url('<?php echo $image_attributes[0]; ?>') no-repeat"></div>
					<div class="text">
						<div class="top">
							<div class="top-left">
								<p><?php echo $offer['old-offer-1']?></p>
								<p class="cleave">/</p>
								<p><?php echo $offer['old-offer-2']?></p>
							</div>
							<div class="top-right">
								<p><?php echo $offer['new-offer-1']?></p>
								<p class="cleave">/</p>
								<p><?php echo $offer['new-offer-2']?></p>
							</div>
						</div>
						<div class="bottom">
							<p><?php echo $offer['description']?></p>
						</div>
					</div>
				</div>
			</div>
<?php
}
?>
		</div>
	</div>
</div><div class="button-wrapper">
	<a href="<?php echo get_post_meta($post->ID, 'ok_join_url', true); ?>" class="button"><?php if(get_post_meta($post->ID, 'ok_join_name', true)!=''){echo get_post_meta($post->ID, 'ok_join_name', true);}else{echo'Join Now';} ?></a>
</div>	</div>
<div class="step-wrapper">
	<div class="row">
		<div class="columns large-12">
			<div class="steps">
				<div class="step clearfix">
					<div class="number">
						<div>
							1
						</div>
					</div>
					<div class="text">
						<h2><?php echo get_post_meta($post->ID, 'ok_first_step_title', true);?></h2>
						<p><?php echo get_post_meta($post->ID, 'ok_first_step_text', true);?></p>
					</div>
				</div>
				<div class="step clearfix">
					<div class="number">
						<div>
							2
						</div>
					</div>
					<div class="text">
						<h2><?php echo get_post_meta($post->ID, 'ok_second_step_title', true);?></h2>
						<p><?php echo get_post_meta($post->ID, 'ok_second_step_text', true);?></p>
					</div>
				</div>
				<div class="step clearfix">
					<div class="number">
						<div>
							3
						</div>
					</div>
					<div class="text">
						<h2><?php echo get_post_meta($post->ID, 'ok_third_step_title', true);?></h2>
						<p><?php echo get_post_meta($post->ID, 'ok_third_step_text', true);?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
	<script src="<?php bloginfo('stylesheet_directory'); ?>/js/build/index.min.js"></script>
	<?php wp_footer();?>
</body>
</html>