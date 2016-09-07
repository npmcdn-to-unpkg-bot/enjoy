<?php /*
Template Name: Contact
*/ ?>
<?php get_header();?>
<?php
if (have_posts()) : 
	while (have_posts()) : the_post(); ?>
	<div class="title-page">
		<div class="row">
			<div class="columns latge-12">
				<div class="row">
					<div class="columns latge-12">
						<h1><span></span><?php the_title();?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="content-wrapper">
	<div class="row">
		<div class="columns large-12">
			<div class="row">
				<div class="columns large-12">
					<div class="text-wrapper clearfix">
						<div class="text">
							<?php echo get_option('ok_adresa'); ?>
							<?php if(get_option('ok_email')!=''){ ?>
							<a href="mailto:<?php echo get_option('ok_email'); ?>"><?php echo get_option('ok_email'); ?></a>
							<?php }?>
						</div>
						<div class="form-wrapper">
							<?php echo do_shortcode( '[contact-form-7 id="4" title="Контактна форма 1"]' ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="map-wrapper">
		<div id="map"></div>
	</div>
</div>
<?php
	endwhile;
endif;?>
<?php get_footer();?>