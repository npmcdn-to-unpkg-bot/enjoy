<?php /*
Template Name: Faq
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

<div class="issue">
	<div class="row">
		<div class="columns large-12">
			<div class="row">
				<div class="columns large-12">
					<div class="items-wrapper">
<?php
$args = array(
		'posts_per_page' => 9999,
		'post_type' => 'faq'	
	);
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
$i=1;		
		while ( $query->have_posts() ) {
		$query->the_post();?>
						<div class="item">
							<h3><?php the_title();?></h3>
							<div class="text"><?php the_content();?></div>
						</div>
<?php 
$i++;}
	}
	wp_reset_postdata();?>						
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