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
/* include theme settings */
require_once(TEMPLATEPATH . '/functions/options.php');
/* include post types */
//require_once(TEMPLATEPATH . '/functions/post-type.php');
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
?>