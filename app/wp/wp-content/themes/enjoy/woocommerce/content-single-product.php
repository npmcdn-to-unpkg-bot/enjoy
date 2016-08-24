<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $post, $product;
?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>


<!-- materials wrapper -->
<div class="elements-wrapper">
	<div>
		<div class="materials">
			<p class="title">Оберіть матеріал</p>
			<div class="wrapper owl-materials clearfix">
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="pictures/materials/1.jpg" data-item="item-1"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/2.jpg') no-repeat center" data-img="pictures/materials/2.jpg" data-item="item-2"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="pictures/materials/3.jpg" data-item="item-3"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/5.jpg') no-repeat center" data-img="pictures/materials/5.jpg" data-item="item-4"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/6.jpg') no-repeat center" data-img="pictures/materials/6.jpg" data-item="item-5"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/4.jpg') no-repeat center" data-img="pictures/materials/4.jpg" data-item="item-6"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/8.jpg') no-repeat center" data-img="pictures/materials/8.jpg" data-item="item-7"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/7.jpg') no-repeat center" data-img="pictures/materials/7.jpg" data-item="item-8"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="pictures/materials/1.jpg" data-item="item-9"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="pictures/materials/3.jpg" data-item="item-10"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="pictures/materials/1.jpg" data-item="item-11"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="pictures/materials/3.jpg" data-item="item-12"></span>
					<p>Тканина 1</p>
				</div>
			</div>
		</div>
		<div class="colors">
			<p class="title">Оберіть колір</p>
			<div class="wrapper owl-colors clearfix">
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="pictures/materials/1.jpg" data-item="item-1"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/2.jpg') no-repeat center" data-img="pictures/materials/2.jpg" data-item="item-2"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="pictures/materials/3.jpg" data-item="item-3"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/5.jpg') no-repeat center" data-img="pictures/materials/5.jpg" data-item="item-4"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/6.jpg') no-repeat center" data-img="pictures/materials/6.jpg" data-item="item-5"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/4.jpg') no-repeat center" data-img="pictures/materials/4.jpg" data-item="item-6"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/8.jpg') no-repeat center" data-img="pictures/materials/8.jpg" data-item="item-7"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/7.jpg') no-repeat center" data-img="pictures/materials/7.jpg" data-item="item-8"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="pictures/materials/1.jpg" data-item="item-9"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="pictures/materials/3.jpg" data-item="item-10"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="pictures/materials/1.jpg" data-item="item-11"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="pictures/materials/3.jpg" data-item="item-12"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/4.jpg') no-repeat center" data-img="pictures/materials/4.jpg" data-item="item-13"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/8.jpg') no-repeat center" data-img="pictures/materials/8.jpg" data-item="item-14"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/7.jpg') no-repeat center" data-img="pictures/materials/7.jpg" data-item="item-15"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="pictures/materials/1.jpg" data-item="item-16"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="pictures/materials/3.jpg" data-item="item-17"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="pictures/materials/1.jpg" data-item="item-18"></span>
					<p>Тканина 1</p>
				</div>
				<div>
					<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="pictures/materials/3.jpg" data-item="item-19"></span>
					<p>Тканина 1</p>
				</div>
			</div>
		</div>
		<span class="close">Застосувати</span>
	</div>
</div>



<!-- project container -->
	<div class="project">
		<!-- constructor -->
	<div class="constructor">
		<div class="row">
			<div class="columns large-12">
				<div class="row extended">
					<div class="columns large-12 clearfix">

						<!-- image -->
						<div class="images-wrapper clearfix">
							<?php
								/**
								 * woocommerce_before_single_product_summary hook.
								 *
								 * @hooked woocommerce_show_product_sale_flash - 10
								 * @hooked woocommerce_show_product_images - 20
								 */
								do_action( 'woocommerce_before_single_product_summary' );
							?>
						</div>

						<!-- property -->
						<div class="property">
							<h1 class="name" itemprop="name"><?php echo strip_tags($product->get_categories(''));?><span><?php the_title();?></span></h1>
							<div class="choice-wrapper clearfix">
								<div class="choice-material">
									<p class="title">Матеріал</p>
									<div class="wrapper">
										<div class="elect elect-materials" style=""></div>
										<div class="rainbow rainbow-materials">
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg" data-item="item-1"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/2.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/2.jpg" data-item="item-2"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg" data-item="item-3"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/5.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/5.jpg" data-item="item-4"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/6.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/6.jpg" data-item="item-5"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/4.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/4.jpg" data-item="item-6"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/8.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/8.jpg" data-item="item-7"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/7.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/7.jpg" data-item="item-8"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg" data-item="item-9"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg" data-item="item-10"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg" data-item="item-11"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg" data-item="item-12"></span>
												<p>Тканина 1</p>
											</div>
										</div>
									</div>
								</div>
								<div class="choice-color">
									<p class="title">Колір</p>
									<div class="wrapper">
										<div class="elect elect-colors" style=""></div>
										<div class="rainbow rainbow-colors">
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg" data-item="item-1"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/2.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/2.jpg" data-item="item-2"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg" data-item="item-3"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/5.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/5.jpg" data-item="item-4"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/6.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/6.jpg" data-item="item-5"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/4.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/4.jpg" data-item="item-6"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/8.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/8.jpg" data-item="item-7"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/7.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/7.jpg" data-item="item-8"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg" data-item="item-9"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg" data-item="item-10"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg" data-item="item-11"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg" data-item="item-12"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/4.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/4.jpg" data-item="item-13"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/8.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/8.jpg" data-item="item-14"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/7.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/7.jpg" data-item="item-15"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg" data-item="item-16"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg" data-item="item-17"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/1.jpg" data-item="item-18"></span>
												<p>Тканина 1</p>
											</div>
											<div>
												<span class="item" style="background:url('<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg') no-repeat center" data-img="<?php bloginfo('stylesheet_directory'); ?>/pictures/materials/3.jpg" data-item="item-19"></span>
												<p>Тканина 1</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="small-sizes">
								<div class="size-1">
									<span class="active">S</span>
									<span>M</span>
									<span>L</span>
								</div>
								<div class="size-2">
									<div class="height"><span>70</span> см</div>
									<div class="width"><span>70</span> см</div>
									<div class="diametr"><span>70</span> см</div>
								</div>
								<div class="price-wrapper">
									<div class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><span><?php echo $product->get_price_html(); ?></span> грн</div>
									<meta itemprop="price" content="<?php echo esc_attr( $product->get_price() ); ?>" />
									<meta itemprop="priceCurrency" content="<?php echo esc_attr( get_woocommerce_currency() ); ?>" />
									<link itemprop="availability" href="http://schema.org/<?php echo $product->is_in_stock() ? 'InStock' : 'OutOfStock'; ?>" />
									<a href="#" class="order">Замовити</a>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
<?php
				/**
				 * woocommerce_single_product_summary hook.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				do_action( 'woocommerce_single_product_summary' );
			?>
			

		<?php
			/**
			 * woocommerce_after_single_product_summary hook.
			 *
			 * @hooked woocommerce_output_product_data_tabs - 10
			 * @hooked woocommerce_upsell_display - 15
			 * @hooked woocommerce_output_related_products - 20
			 */
			do_action( 'woocommerce_after_single_product_summary' );
		?>

		<meta itemprop="url" content="<?php the_permalink(); ?>" />

	</div>
	<!-- gallery -->
	<div class="row max-none collapse gallery-items">
		<div class="columns large-12">
			<div class="items-wrapper">
				<div>
<?php $items = get_post_meta( $post->ID, 'product_items', true ); 
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
<!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
