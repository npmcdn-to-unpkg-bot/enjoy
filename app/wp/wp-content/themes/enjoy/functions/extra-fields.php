<?php 
function mytheme_add_init() {
    if ( is_admin() ) {
        wp_enqueue_style("functions", "".get_bloginfo('stylesheet_directory')."/functions/functions.css", false, "1.0", "all");
        wp_enqueue_script("rm_script", "".get_bloginfo('stylesheet_directory')."/functions/script.js", false, "1.0");
    }
}
add_action( 'admin_print_styles', 'mytheme_add_init' );

/*========== page EXTRA FIELDS ========*/
add_action('admin_init', 'page_extra_fields', 1);
function page_extra_fields(){
add_meta_box('extra_fields', 'Options', 'page_extra_fields_box_func', 'page', 'normal', 'high');
}
function page_extra_fields_box_func($post){ ?>		

<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php
}
add_action('save_post', 'page_extra_fields_update', 0);
function page_extra_fields_update($post_id){
if (!wp_verify_nonce($_POST['extra_fields_nonce'], __FILE__))return false;
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return false;
if (!current_user_can('edit_post', $post_id)) return false;
if (!isset($_POST['extra'])) return false;
$_POST['extra'] = array_map('trim', $_POST['extra']);
foreach( $_POST['extra'] as $key=>$value ){
if(empty($value)){
delete_post_meta($post_id, $key);
continue;
}
update_post_meta($post_id, $key, $value);
}
		$editor_id = WYSIWYG_EDITOR_ID;
        $meta_key = WYSIWYG_META_KEY;	
        if(isset($_REQUEST[$editor_id]))
                update_post_meta($_REQUEST['post_ID'], WYSIWYG_META_KEY, $_REQUEST[$editor_id]);
return $post_id;
}
/*========== END page EXTRA FIELDS ========*/
function upload_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', get_bloginfo('template_directory').'/functions/custom_uploader.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
} 
function upload_styles() {
	wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'upload_scripts'); 
add_action('admin_print_styles', 'upload_styles');
?>