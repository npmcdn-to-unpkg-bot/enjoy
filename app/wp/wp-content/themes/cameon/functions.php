<?php

/* Підключення налаштувань, типів постів, додаткових полів */
//require_once(TEMPLATEPATH . '/functions/options.php');
//require_once(TEMPLATEPATH . '/functions/post-type.php');
require_once(TEMPLATEPATH . '/functions/extra-fields.php');
/* Відключення оновлень */
remove_action( 'load-update-core.php', 'wp_update_plugins' );
add_filter( 'pre_site_transient_update_plugins', create_function( '$a', "return null;" ) );
add_filter('pre_site_transient_update_core',create_function('$a', "return null;"));
wp_clear_scheduled_hook('wp_version_check');

/* змінюємо стандартний мейл від wordpres */ 
add_filter('wp_mail_from', 'new_mail_from');
add_filter('wp_mail_from_name', 'new_mail_from_name'); 
function new_mail_from($old) {
 return 'no-replay@google.com';
}
function new_mail_from_name($old) {
 return 'Comeon';
}
/* Підключаємо свої стилі в адмінку */
function Comeon_add_editor_styles() {
	add_editor_style( 'editor_styles.css' );
}
add_action( 'current_screen', 'Comeon_add_editor_styles' );
/* Ховаємо меню в адмінці */
function remove_menus(){
  remove_menu_page( 'edit.php' );                   //Записи
  remove_menu_page( 'edit-comments.php' );          //Коментарі
}
add_action( 'admin_menu', 'remove_menus' );
function remove_editor_init() {
 if ( is_admin() ) {  
    remove_post_type_support('page', 'editor');
 }
}
add_action('init', 'remove_editor_init');
?>