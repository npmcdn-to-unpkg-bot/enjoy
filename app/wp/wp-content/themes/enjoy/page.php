<?php get_header();?>
<?php
if (have_posts()) : 
	while (have_posts()) : the_post(); ?>
<div class="title-page">
		<div class="row">
			<div class="columns latge-12">
				<div class="row">
					<div class="columns latge-12">
						<?php if(get_post_meta($post->ID, 'page_title_1', true)!='' || get_post_meta($post->ID, 'page_title_2', true)!='' || get_post_meta($post->ID, 'page_title_3', true)!=''){ ?>						
							<h1><span><?php echo get_post_meta($post->ID, 'page_title_1', true)?></span><?php echo get_post_meta($post->ID, 'page_title_2', true)?><span><?php echo get_post_meta($post->ID, 'page_title_3', true)?></span></h1>
						<?php } else {?>
							<h1><?php the_title();?></h1>
						<?php }?>
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
					<div class="text-wrapper">
						<?php the_content();?>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<?php
	endwhile;
endif;?>
<?php get_footer();?>