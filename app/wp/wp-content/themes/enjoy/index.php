<?php get_header();?>
<div class="content-wrapper">
	<div class="row">
		<div class="columns large-12">
			<div class="row">
				<div class="columns large-12">
<?php
if (have_posts()) : 
	while (have_posts()) : the_post(); ?>
					<div class="text-wrapper">
						<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
						<?php the_content();?>
					</div>
<?php
	endwhile;
endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer();?>