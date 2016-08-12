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