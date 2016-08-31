<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-item-data.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="variation">
	<span class="details" style="display:none">Опис товару:</span>
	<?php foreach ( $item_data as $data ) : ?>
		<div class="item">
			<div class="type variation-<?php echo sanitize_html_class( $data['key'] ); ?>"><?php echo wp_kses_post( $data['key'] ); ?>:</div>
			<div class="value variation-<?php echo sanitize_html_class( $data['key'] ); ?>"><?php echo wp_kses_post( wpautop( $data['display'] ) ); ?><span class="coma">, </span></div>
		</div>
	<?php endforeach; ?>
</div>
