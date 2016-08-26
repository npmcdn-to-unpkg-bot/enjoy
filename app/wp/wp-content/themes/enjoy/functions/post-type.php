<?php
/*====================== Post Type faq =======================*/
 add_action( 'init', 'my_custom_post_faq' );
function my_custom_post_faq() {
   $labels = array(
     'name'               => _x( 'Faq', 'post type general name' ),
     'singular_name'      => _x( 'Faq', 'post type singular name' ),
     'add_new'            => _x( 'Add', 'faq' ),
     'add_new_item'       => __( 'Add new' ),
     'edit_item'          => __( 'Edit' ),
     'new_item'           => __( 'New' ),
     'all_items'          => __( 'All faq' ),
     'view_item'          => __( 'View' ),
     'search_items'       => __( 'Search' ),
     'not_found'          => __( 'Not found' ),
     'not_found_in_trash' => __( 'Not found' ), 
     'parent_item_colon'  => '',
     'menu_name'          => 'Faq'
   );
   $args = array(
     'labels'        => $labels,
     'description'   => 'faq',
     'public'        => true,
     'menu_position' => 5,
	 'rewrite' 		 => array( 'slug' => 'faqes', 'with_front' => true ),
     'supports'      => array( 'title', 'editor'),
     'has_archive'   => true,
   );
   register_post_type( 'faq', $args );
   flush_rewrite_rules(false);
}
?>