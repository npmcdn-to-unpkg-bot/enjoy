<?php /*
Template Name: About
*/ ?>
<?php get_header();?>
<!-- gallery -->
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
<div class="row max-none collapse gallery-items">
	<div class="columns large-12">
		<div class="items-wrapper">
			<div>
<?php $items = get_post_meta( $post->ID, 'items', true ); 
foreach( $items as $item){ 
	$image_attributes = wp_get_attachment_image_src( $attachment_id = $item['image'], $size = 'full' );?>
				<div class="item <?php echo $item['block-type']?>">
					<div class="wrapper">
						<div>
							<div class="image" style="background:url('<?php echo $image_attributes[0]; ?>') no-repeat center"></div>
							<div class="text-wrapper">
								<div>
									<h3><?php echo $item['title']?></h3>
									<?php echo $item['description']?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
<?php
 }
?>
			</div>
		</div>
	</div>
</div>

<!-- comments -->
<br>
<br>
<br>
<br>
<br>
<div class="comments">
	<div class="row">
		<div class="columns large-12">
			<p>comments here</p>
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>
<br>
<?php get_footer();?>