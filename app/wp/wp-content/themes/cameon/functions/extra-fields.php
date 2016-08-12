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
function page_extra_fields_box_func($post){?>		
<div class="wrap">

<!-- GENERAL SETTINGS -->
<div class="rm_section">
	<div class="rm_title">
		<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/functions/3.gif" class="inactive" alt=""/>
		General settings</h3>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options">
		<div class="rm_input rm_text">
		<br>
			<p>
				<label for="ok_show_pattern">Show pattern:</label>
				<select name="extra[ok_show_pattern]" />
						<?php $sel_v = get_post_meta($post->ID, 'ok_show_pattern', 1); ?>
						<option value="">No</option>						
						<option value="1" <?php selected( $sel_v, 1 )?> >Yes</option>
				</select>
			</p>
			<p>	
				<label for="ok_header_background">Background image:</label>
				<input type="text" size="75" id="ok_header_background" name="extra[ok_header_background]" value="<?php echo get_post_meta($post->ID, 'ok_header_background', true); ?>" class="large-text" />
				<input type="button" class="media-button button" name="custom_image_btn" value="Choose Image" />
			</p>
			<p>	
				<label for="ok_login_link">Login link:</label>
				<input id="ok_login_link" type="text" size="90" name="extra[ok_login_link]" value="<?php echo get_post_meta($post->ID, 'ok_login_link', true); ?>" />
			</p>
			<!--<p>
				<label for="ok_body_class">Page type:</label>
				<select name="extra[ok_body_class]" />
						<?php $sel_v = get_post_meta($post->ID, 'ok_body_class', 1); ?>
						<option value="">----</option>						
						<option value="sports" <?php selected( $sel_v, 'logo-sports' )?> >sports</option>
						<option value="casino" <?php selected( $sel_v, 'logo-casino' )?> >casino</option>
						<option value="games" <?php selected( $sel_v, 'logo-games' )?> >games</option>
				</select>
				<span class="note">* (sports / casino / games)</span>
			</p>-->			
			<p>	
				<label for="ok_losung">Losung:</label>
				<input id="ok_losung" type="text" size="90" name="extra[ok_losung]" value="<?php echo get_post_meta($post->ID, 'ok_losung', true); ?>" />
			</p>
			<p>	
				<label for="ok_join_url">Join url:</label>
				<input id="ok_join_url" type="text" size="90" name="extra[ok_join_url]" value="<?php echo get_post_meta($post->ID, 'ok_join_url', true); ?>" />
			</p>
			<p>	
				<label for="ok_join_name">Join name:</label>
				<input id="ok_join_name" type="text" size="90" name="extra[ok_join_name]" value="<?php echo get_post_meta($post->ID, 'ok_join_name', true); ?>" />
			</p>
		</div>
	</div>
</div>

<!-- STEPS -->
<div class="rm_section">
	<div class="rm_title">
		<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/functions/3.gif" class="inactive" alt=""/>
		STEPS</h3>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options">
		<div class="rm_input rm_text">
			<div style="margin-bottom: 10px;">
				<br>
				<h3 style="padding: 0;">Step 1</h3>
				<p>	
					<label for="ok_first_step_title">Title:</label>
					<input id="ok_first_step_title" type="text" size="90" name="extra[ok_first_step_title]" value="<?php echo get_post_meta($post->ID, 'ok_first_step_title', true); ?>" />
				</p>
				<p>	
					<label for="ok_first_step_text" style="display:block;">Text:</label>
					<textarea name="extra[ok_first_step_text]" style="width:320px;height:150px;" type="textarea" ><?php echo get_post_meta($post->ID, 'ok_first_step_text', true); ?></textarea>
				</p>
			</div>
			<div style="margin-bottom: 10px;border-top: 1px solid #ccc;">
				<br>
				<h3 style="padding: 0;">Step 2</h3>
				<p>	
					<label for="ok_second_step_title">Title:</label>
					<input id="ok_second_step_title" type="text" size="90" name="extra[ok_second_step_title]" value="<?php echo get_post_meta($post->ID, 'ok_second_step_title', true); ?>" />
				</p>
				<p>	
					<label for="ok_second_step_text" style="display:block;">Text:</label>
					<textarea name="extra[ok_second_step_text]" style="width:320px;height:150px;" type="textarea" ><?php echo get_post_meta($post->ID, 'ok_second_step_text', true); ?></textarea>
				</p>
			</div>
			<div style="margin-bottom: 10px;border-top: 1px solid #ccc;">
				<br>
				<h3 style="padding: 0;">Step 3</h3>
				<p>	
					<label for="ok_third_step_title">Title:</label>
					<input id="ok_third_step_title" type="text" size="90" name="extra[ok_third_step_title]" value="<?php echo get_post_meta($post->ID, 'ok_third_step_title', true); ?>" />
				</p>
				<p>	
					<label for="ok_third_step_text" style="display:block;">Text:</label>
					<textarea name="extra[ok_third_step_text]" style="width:320px;height:150px;" type="textarea" ><?php echo get_post_meta($post->ID, 'ok_third_step_text', true); ?></textarea>
				</p>
			</div>
		<div class="clearfix"></div>
		</div>
	</div>
</div>

</div>
<!--<?php	
		$meta_box_id = WYSIWYG_META_BOX_ID;
        $editor_id = WYSIWYG_EDITOR_ID;        
        //Add CSS & jQuery goodness to make this work like the original WYSIWYG
        echo "
                <style type='text/css'>
                        #$meta_box_id #edButtonHTML, #$meta_box_id #edButtonPreview {background-color: #F1F1F1; border-color: #DFDFDF #DFDFDF #CCC; color: #999;}
                        #$editor_id{width:100%;}
                        #$meta_box_id #editorcontainer{background:#fff !important;}
                        #$meta_box_id #$editor_id_fullscreen{display:none;}
                </style>            
                <script type='text/javascript'>
                        jQuery(function($){
                                $('#$meta_box_id #editor-toolbar > a').click(function(){
                                        $('#$meta_box_id #editor-toolbar > a').removeClass('active');
                                        $(this).addClass('active');
                                });
                                
                                if($('#$meta_box_id #edButtonPreview').hasClass('active')){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                }
                                
                                $('#$meta_box_id #edButtonPreview').click(function(){
                                        $('#$meta_box_id #ed_toolbar').hide();
                                });
                                
                                $('#$meta_box_id #edButtonHTML').click(function(){
                                        $('#$meta_box_id #ed_toolbar').show();
                                });
				//Tell the uploader to insert content into the correct WYSIWYG editor
				$('#media-buttons a').bind('click', function(){
					var customEditor = $(this).parents('#$meta_box_id');
					if(customEditor.length > 0){
						edCanvas = document.getElementById('$editor_id');
					}
					else{
						edCanvas = document.getElementById('content');
					}
				});
                        });
                </script>
        ";        
        //Create The Editor
        $content = get_post_meta($post->ID, WYSIWYG_META_KEY, true);
        the_editor($content, $editor_id); ?>-->		
<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?}
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