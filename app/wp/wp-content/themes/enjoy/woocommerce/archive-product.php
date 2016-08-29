<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

//get_header( 'shop' ); ?>

	<!-- interactive -->
	<div class="interactive">
<div class="image" style="background:url('<?php bloginfo('template_directory'); ?>/pictures/interactive/image-2.jpg') no-repeat center;"></div>	</div>

<!-- gallery -->
<div class="row max-none collapse offer-items">
	<div class="columns large-12">
		<div class="items-wrapper">
			<div>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); global $post, $product; ?>
				<?php 				
				$cat_img = get_post_meta( $post->ID, 'cat_img', true ); 
				foreach((array)$cat_img as $cat_img){ 
					if($cat_img['розміщення']=='left'){
						$image_attributes = wp_get_attachment_image_src( $attachment_id = $cat_img['image'], $size = 'full' );
						if($image_attributes[0]){?>				
									<div class="item <?php echo $cat_img['тип-картинки']?>">
										<div class="wrapper">
											<div>
												<div class="image" style="background:url('<?php echo $image_attributes[0];?>') no-repeat center"></div>
												<h3 class="name"><span></span></h3>
												<a href="#" class="order"></a>
												<span class="price"><span></span> </span>
											</div>
										</div>
									</div>			
						<?php
						}
					}
				 }			
				?>				
				<div class="item standard">
					<div class="wrapper">
						<div>
<?php
		if ( has_post_thumbnail() ) {
			$image_caption = get_post( get_post_thumbnail_id() )->post_excerpt;
			$image_link    = wp_get_attachment_url( get_post_thumbnail_id() );
			$image         = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title'	=> get_the_title( get_post_thumbnail_id() )
			) );

			echo '<div class="image" style="background:url('.$image_link.') no-repeat center"></div>';

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<div class="image" style="background:url(%s) no-repeat center"></div>', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $post->ID );

		}
	?>
							
							<h3 class="name"><?php $terms = get_the_term_list( $_product->id, 'product_cat'); echo strip_tags($terms);?><span><?php the_title();?></span></h3>
							<?php 
							echo apply_filters( 'woocommerce_loop_add_to_cart_link',
								sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s order">%s</a>',
									esc_url( $product->add_to_cart_url() ),
									esc_attr( isset( $quantity ) ? $quantity : 1 ),
									esc_attr( $product->id ),
									esc_attr( $product->get_sku() ),
									esc_attr( isset( $class ) ? $class : 'button' ),
									esc_html( $product->add_to_cart_text() )
								),
							$product );?>
							<span class="price"><span><?php echo $product->get_price_html();?></span> грн</span>
						</div>
					</div>
				</div>
				<?php 				
				$cat_img = get_post_meta( $post->ID, 'cat_img', true ); 
				foreach((array)$cat_img as $cat_img){ 
					if($cat_img['розміщення']=='right'){
						$image_attributes = wp_get_attachment_image_src( $attachment_id = $cat_img['image'], $size = 'full' );
						if($image_attributes[0]){?>				
									<div class="item <?php echo $cat_img['тип-картинки']?>">
										<div class="wrapper">
											<div>
												<div class="image" style="background:url('<?php echo $image_attributes[0];?>') no-repeat center"></div>
												<h3 class="name"><span></span></h3>
												<a href="#" class="order"></a>
												<span class="price"><span></span> </span>
											</div>
										</div>
									</div>			
						<?php
						}
					}
				 }			
				?>
<?php endwhile; // end of the loop. ?>
<?php endif; ?>
				<!--<div class="item small-image">
					<div class="wrapper">
						<div>
							<div class="image" style="background:url('pictures/img9.jpg') no-repeat center"></div>
							<h3 class="name">крісло-груша<span>Quardro</span></h3>
							<a href="#" class="order">Замовити</a>
							<span class="price"><span>1254</span> грн</span>
						</div>
					</div>
				</div>
				<div class="item big-image">
					<div class="wrapper">
						<div>
							<div class="image" style="background:url('pictures/img2.jpg') no-repeat center"></div>
							<h3 class="name">крісло-груша<span>Quardro</span></h3>
							<a href="#" class="order">Замовити</a>
							<span class="price"><span>1254</span> грн</span>
						</div>
					</div>
				</div>-->
			</div>
		</div>
	</div>
</div>

<?php get_footer( 'shop' ); ?>
