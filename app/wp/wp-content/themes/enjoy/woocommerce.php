<?php get_header();?>
	<?php 	
	if ( is_singular( 'product' ) ) {
		 woocommerce_content();
	  }else{
		woocommerce_get_template( 'archive-product.php' );
	  }	?>
<?php get_footer();?>