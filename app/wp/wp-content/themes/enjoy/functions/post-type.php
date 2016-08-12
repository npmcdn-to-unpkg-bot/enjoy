<?
/*====================== Post Type videos =======================*/
 add_action( 'init', 'my_custom_post_videos' );
function my_custom_post_videos() {
   $labels = array(
     'name'               => _x( 'videos', 'post type general name' ),
     'singular_name'      => _x( 'videos', 'post type singular name' ),
     'add_new'            => _x( 'Add', 'videos' ),
     'add_new_item'       => __( 'Add new' ),
     'edit_item'          => __( 'Edit' ),
     'new_item'           => __( 'New' ),
     'all_items'          => __( 'All videos' ),
     'view_item'          => __( 'View' ),
     'search_items'       => __( 'Search' ),
     'not_found'          => __( 'Not found' ),
     'not_found_in_trash' => __( 'Not found' ), 
     'parent_item_colon'  => '',
     'menu_name'          => 'videos'
   );
   $args = array(
     'labels'        => $labels,
     'description'   => 'videos',
     'public'        => true,
     'menu_position' => 5,
	 'rewrite' 		 => array( 'slug' => 'videos', 'with_front' => true ),
     'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'videos_category'),
     'has_archive'   => true,
   );
   register_post_type( 'videos', $args );
   flush_rewrite_rules(false);
}
/* category for videos */
function my_taxonomies_videos() {
   $labels = array(
     'name'              => _x( 'videos category', 'taxonomy general name' ),
     'singular_name'     => _x( 'videos category', 'taxonomy singular name' ),
     'search_items'      => __( 'Search' ),
     'all_items'         => __( 'All categories' ),
     'parent_item'       => __( 'Parent category' ),
     'parent_item_colon' => __( 'Parent category' ),
     'edit_item'         => __( 'Edit category' ), 
     'update_item'       => __( 'Update category' ),
     'add_new_item'      => __( 'Add category' ),
     'new_item_name'     => __( 'New category' ),
     'menu_name'         => __( 'videos category' ),
   );
   $args = array(
     'labels' => $labels,
     'hierarchical' => true,
   );
   register_taxonomy( 'videos_category', 'videos', $args );
}
 add_action( 'init', 'my_taxonomies_videos', 0 );
?>