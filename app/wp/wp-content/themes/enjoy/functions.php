<?php
// main picture
	add_theme_support( 'post-thumbnails' );	
		// size thumbnail
	//add_image_size( 'plus_block', 360, 270, true ); 
	//add_image_size( 'pv_block', 260, 260, true ); 

	// register menus
	if(function_exists('register_nav_menus')) {
		register_nav_menus( array(
			'menu_head' => __('Header navigation'),
			'menu_footer' => __('Footer navigation'),
		));
	}
	function my_wp_nav_menu_args($args=''){  
    $args['container'] = '';  
    return $args;  
} // function  
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' ); 

if (function_exists('register_sidebar')) {
    
	register_sidebar(array(
      'id' => 'left',
      'name' => 'Left', 
      'description' => 'add', 
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<p class="title">',
      'after_title' => '</p>', 
    ));

	}


/* include theme settings */
require_once(TEMPLATEPATH . '/functions/options.php');
/* include post types */
require_once(TEMPLATEPATH . '/functions/post-type.php');
/* include extra fields */
require_once(TEMPLATEPATH . '/functions/extra-fields.php');
/* Відключення оновлень */
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');

/* standart mail fields */ 
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name'); 
function new_mail_from($old) {
 return 'no-replay@google.com';
}
function new_mail_from_name($old) {
 return 'Enjoy';
}
/* Enable custom styles into admin page */
function Enjoy_add_editor_styles() {
	add_editor_style( 'editor_styles.css' );
}
add_action( 'current_screen', 'Enjoy_add_editor_styles' );
/* Hide links from admin menu */
function remove_menus(){
  //remove_menu_page( 'edit.php' );                   //Записи
  //remove_menu_page( 'edit-comments.php' );          //Коментарі
}
add_action( 'admin_menu', 'remove_menus' );

// Remove all currency symbols
function sww_remove_wc_currency_symbols( $currency_symbol, $currency ) {
     $currency_symbol = '';
     return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'sww_remove_wc_currency_symbols', 10, 2);



add_filter( 'wc_additional_variation_images_main_images_class', 'variation_swap_main_image_class' );
function variation_swap_main_image_class() {
	return '.project .constructor .images-wrapper .home-image > div';
}

add_filter( 'wc_additional_variation_images_gallery_images_class', 'variation_swap_gallery_image_class' );

function variation_swap_gallery_image_class() {
	return '.project .constructor .images-wrapper .small-images';
}

add_filter( 'wc_additional_variation_images_custom_swap', '__return_true' );
add_filter( 'wc_additional_variation_images_custom_reset_swap', '__return_true' );
add_filter( 'wc_additional_variation_images_custom_original_swap', '__return_true' );
add_filter( 'wc_additional_variation_images_get_first_image', '__return_true' );
