<?php /*
Template Name: Home
*/ ?>
<?php get_header();?>
	<!-- interactive -->
	<div class="interactive">
<div class="image" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/interactive/image-1.jpg') no-repeat center;"></div>	</div>

<!-- enjoy -->
<div class="enjoy">
	<div class="wrapper">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/img/big-logo.png" alt="" class="big-logo">
		<div class="content">
			<p class="item-1">преміум<br>матеріали</p>
			<p class="item-2">виробництво по<br>власних лекалах</p>
			<p class="item-3">вдосконалений<br>наповнювач</p>
		</div>
		<img src="<?php bloginfo('stylesheet_directory'); ?>/img/big-chair.png" alt="" class="big-chair">
	</div>
</div>

<!-- category -->
<div class="home-category">
	<div class="row max-none collapse">
		<div class="columns large-12 items-wrapper">
			
			<div class="item item-1">
				<a href="#" class="button"></a>
				<p class="name">#accwssories</p>
				<p class="text">Ми цінуємо твою індивідуальність.<br>Твій стиль набагато важливіший,<br>ніж мода</p>
				<div class="image"></div>
				<div class="number"></div>
			</div>
			<div class="item item-2">
				<a href="#" class="button"></a>
				<p class="name">#accwssories</p>
				<div class="image"></div>
				<div class="number"></div>
			</div>
			<div class="item item-3">
				<a href="#" class="button"></a>
				<p class="name">#accwssories</p>
				<div class="image"></div>
				<div class="number"></div>
			</div>
			<div class="item item-4">
				<a href="#" class="button"></a>
				<p class="name">#kids</p>
				<div class="image"></div>
				<div class="number"></div>
			</div>
			<div class="item item-5">
				<a href="#" class="button"></a>
				<p class="name">#for outdoor</p>
				<div class="image"></div>
				<div class="number"></div>
			</div>
			<div class="item item-6">
				<a href="#" class="button"></a>
				<p class="name">#for outdoor</p>
				<div class="image"></div>
				<div class="number"></div>
			</div>

		</div>
	</div>
</div>

<!-- materials -->
<div class="materials-home">
	<div class="row">
		<div class="columns large-12">
			<p>materials. something about materials</p>
		</div>
	</div>
</div>

<!-- gallery -->
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
<?php get_footer();?>