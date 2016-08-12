<?php
function additional_mime_types( $mimes ) {
	$mimes['rar'] = 'application/x-rar-compressed';
	$mimes['swf'] = 'application/x-shockwave-flash';

	return $mimes;
}
add_filter( 'upload_mimes', 'additional_mime_types' );
// Створити користувацьке меню
add_action('admin_menu', 'omr_create_menu');
function omr_create_menu() {
//Створити нове меню верхнього рівня
add_menu_page('Main options', 'Theme options', 'administrator', 
__FILE__, 'omr_settings_page', ''.get_bloginfo('stylesheet_directory').'/functions/ico.png');

//виклик функції register settings
add_action( 'admin_init', 'register_mysettings' );
}

function mytheme_add_init() {
    if ( is_admin() ) {
        wp_enqueue_style("functions", "".get_bloginfo('stylesheet_directory')."/functions/functions.css", false, "1.0", "all");
        wp_enqueue_script("rm_script", "".get_bloginfo('stylesheet_directory')."/functions/script.js", false, "1.0");
    }
}
add_action( 'admin_print_styles', 'mytheme_add_init' );

function register_mysettings() {
//реєструємо наші налаштування
register_setting( 'omr-settings-group', 'ok_ga_code' );
register_setting( 'omr-settings-group', 'ok_body_class' );
register_setting( 'omr-settings-group', 'ok_login_link' );
register_setting( 'omr-settings-group', 'ok_header_background' );
register_setting( 'omr-settings-group', 'ok_header_text' );
register_setting( 'omr-settings-group', 'ok_header_link' );
register_setting( 'omr-settings-group', 'ok_header_img' );
register_setting( 'omr-settings-group', 'ok_first_step_title' );
register_setting( 'omr-settings-group', 'ok_first_step_text' );
register_setting( 'omr-settings-group', 'ok_second_step_title' );
register_setting( 'omr-settings-group', 'ok_second_step_text' );
register_setting( 'omr-settings-group', 'ok_third_step_title' );
register_setting( 'omr-settings-group', 'ok_third_step_text' );
register_setting( 'omr-settings-group', 'ok_second_background' );
register_setting( 'omr-settings-group', 'ok_second_title' );
register_setting( 'omr-settings-group', 'ok_second_description' );
register_setting( 'omr-settings-group', 'ok_second_appstore' );
register_setting( 'omr-settings-group', 'ok_second_googleplay' );
register_setting( 'omr-settings-group', 'ok_display_second' );
register_setting( 'omr-settings-group', 'ok_display_third' );
register_setting( 'omr-settings-group', 'ok_third_left_background' );
register_setting( 'omr-settings-group', 'ok_third_left_title' );
register_setting( 'omr-settings-group', 'ok_third_left_description' );
register_setting( 'omr-settings-group', 'ok_third_left_findmore' );
register_setting( 'omr-settings-group', 'ok_third_right_background' );
register_setting( 'omr-settings-group', 'ok_third_right_title' );
register_setting( 'omr-settings-group', 'ok_third_right_description' );
register_setting( 'omr-settings-group', 'ok_third_right_facebook' );
register_setting( 'omr-settings-group', 'ok_third_right_twitter' );
register_setting( 'omr-settings-group', 'ok_third_right_blogger' );
register_setting( 'omr-settings-group', 'ok_prefooter' );
register_setting( 'omr-settings-group', 'ok_footer' );
}
function omr_settings_page() {
?>
<div class="wrap">
<h1>General Settings</h1>
<form method="post" action="options.php">
<?php settings_fields('omr-settings-group'); ?>
<div class="rm_section">
	<div class="rm_title">
		<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/functions/3.gif" class="inactive" alt=""/>
		Header block</h3>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options">
		<div class="rm_input rm_text">
			<p>	
				<label for="ok_header_background">Background:</label>
				<input id="upload_image" type="text" size="90" name="ok_header_background" value="<?php echo get_option('ok_header_background'); ?>" />
				<input class="upload_image_button" type="button" value="Upload" />		
			</p>
			<p>	
				<label for="ok_header_text" style="display:block;">Text block</label>
				<textarea name="ok_header_text" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_header_text'); ?></textarea>
			</p>
			<p>	
				<label for="ok_header_link">Join link:</label>
				<input id="ok_header_link" type="text" size="90" name="ok_header_link" value="<?php echo get_option('ok_header_link'); ?>" />
			</p>
			<p>	
				<label for="ok_header_img">Image:</label>
				<input id="upload_image" type="text" size="90" name="ok_header_img" value="<?php echo get_option('ok_header_img'); ?>" />
				<input class="upload_image_button" type="button" value="Upload" />		
			</p>
			<div style="padding:20px; margin-bottom:10px; border:1px solid #ccc;">
				<h3>First step</h3>
				<p>	
					<label for="ok_first_step_title">Title:</label>
					<input id="ok_first_step_title" type="text" size="90" name="ok_first_step_title" value="<?php echo get_option('ok_first_step_title'); ?>" />
				</p>
				<p>	
					<label for="ok_first_step_text" style="display:block;">Text</label>
					<textarea name="ok_first_step_text" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_first_step_text'); ?></textarea>
				</p>
			</div>
			<div style="padding:20px; margin-bottom:10px; border:1px solid #ccc;">
				<h3>Second step</h3>
				<p>	
					<label for="ok_second_step_title">Title:</label>
					<input id="ok_second_step_title" type="text" size="90" name="ok_second_step_title" value="<?php echo get_option('ok_second_step_title'); ?>" />
				</p>
				<p>	
					<label for="ok_second_step_text" style="display:block;">Text</label>
					<textarea name="ok_second_step_text" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_second_step_text'); ?></textarea>
				</p>
			</div>
			<div style="padding:20px; margin-bottom:10px; border:1px solid #ccc;">
				<h3>Third step</h3>
				<p>	
					<label for="ok_third_step_title">Title:</label>
					<input id="ok_third_step_title" type="text" size="90" name="ok_third_step_title" value="<?php echo get_option('ok_third_step_title'); ?>" />
				</p>
				<p>	
					<label for="ok_third_step_text" style="display:block;">Text</label>
					<textarea name="ok_third_step_text" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_third_step_text'); ?></textarea>
				</p>
			</div>
		<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="rm_section">
	<div class="rm_title">
		<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/functions/3.gif" class="inactive" alt=""/>
		Second block</h3>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options">
		<div class="rm_input rm_text">
			<p>
			<label for="ok_display_second">Select category:</label>
				<select name="ok_display_second" />
						<?php $sel_v = get_option('ok_display_second'); ?>						
						<option value="">No</option>						
						<option value="1" <?php selected( $sel_v, 1 )?> >Yes</option>
				</select>
			</p>
			<p>	
				<label for="ok_second_background">Background:</label>
				<input id="upload_image" type="text" size="90" name="ok_second_background" value="<?php echo get_option('ok_second_background'); ?>" />
				<input class="upload_image_button" type="button" value="Upload" />		
			</p>
			<p>	
				<label for="ok_second_title">Title:</label>
				<input id="ok_second_title" type="text" size="90" name="ok_second_title" value="<?php echo get_option('ok_second_title'); ?>" />
			</p>
			<p>	
				<label for="ok_second_description">Description:</label>
				<textarea name="ok_second_description" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_second_description'); ?></textarea>
			</p>			
			<p>	
				<label for="ok_second_appstore">App Store url:</label>
				<input id="ok_second_appstore" type="text" size="90" name="ok_second_appstore" value="<?php echo get_option('ok_second_appstore'); ?>" />
			</p>			
			<p>	
				<label for="ok_second_googleplay">Google Play url:</label>
				<input id="ok_second_googleplay" type="text" size="90" name="ok_second_googleplay" value="<?php echo get_option('ok_second_googleplay'); ?>" />
			</p>
		<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="rm_section">
	<div class="rm_title">
		<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/functions/3.gif" class="inactive" alt=""/>
		Third block</h3>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options">
		<div class="rm_input rm_text">
			<p>
			<label for="ok_display_third">Select category:</label>
				<select name="ok_display_third" />
						<?php $sel_v = get_option('ok_display_third'); ?>						
						<option value="">No</option>						
						<option value="1" <?php selected( $sel_v, 1 )?> >Yes</option>
				</select>
			</p>
			<div style="padding:20px; margin-bottom:20px; border:1px solid #ccc;">
				<h3>Left block</h3>
				<p>	
					<label for="ok_third_left_background">Background:</label>
					<input id="upload_image" type="text" size="90" name="ok_third_left_background" value="<?php echo get_option('ok_third_left_background'); ?>" />
					<input class="upload_image_button" type="button" value="Upload" />		
				</p>
				<p>	
					<label for="ok_third_left_title">Title:</label>
					<input id="ok_third_left_title" type="text" size="90" name="ok_third_left_title" value="<?php echo get_option('ok_third_left_title'); ?>" />
				</p>
				<p>	
					<label for="ok_third_left_description">Description:</label>
					<textarea name="ok_third_left_description" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_third_left_description'); ?></textarea>
				</p>			
				<p>	
					<label for="ok_third_left_findmore">Find more url:</label>
					<input id="ok_third_left_findmore" type="text" size="90" name="ok_third_left_findmore" value="<?php echo get_option('ok_third_left_findmore'); ?>" />
				</p>
			</div>
			<div style="padding:20px; margin-bottom:0px; border:1px solid #ccc;">
				<h3>Right block</h3>
				<p>	
					<label for="ok_third_right_background">Background:</label>
					<input id="upload_image" type="text" size="90" name="ok_third_right_background" value="<?php echo get_option('ok_third_right_background'); ?>" />
					<input class="upload_image_button" type="button" value="Upload" />		
				</p>
				<p>	
					<label for="ok_third_right_title">Title:</label>
					<input id="ok_third_right_title" type="text" size="90" name="ok_third_right_title" value="<?php echo get_option('ok_third_right_title'); ?>" />
				</p>
				<p>	
					<label for="ok_third_right_description">Description:</label>
					<textarea name="ok_third_right_description" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_third_right_description'); ?></textarea>
				</p>			
				<p>	
					<label for="ok_third_right_facebook">Facebook url:</label>
					<input id="ok_third_right_facebook" type="text" size="90" name="ok_third_right_facebook" value="<?php echo get_option('ok_third_right_facebook'); ?>" />
				</p>		
				<p>	
					<label for="ok_third_right_twitter">Twitter url:</label>
					<input id="ok_third_right_twitter" type="text" size="90" name="ok_third_right_twitter" value="<?php echo get_option('ok_third_right_twitter'); ?>" />
				</p>		
				<p>	
					<label for="ok_third_right_blogger">Blogger url:</label>
					<input id="ok_third_right_blogger" type="text" size="90" name="ok_third_right_blogger" value="<?php echo get_option('ok_third_right_blogger'); ?>" />
				</p>
			</div>
		<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="rm_section">
	<div class="rm_title">
		<h3><img src="<?php bloginfo('stylesheet_directory'); ?>/functions/3.gif" class="inactive" alt=""/>
		Other options</h3>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options">
		<div class="rm_input rm_text">
			<p>	
				<label for="ok_login_link">Login link:</label>
				<input id="ok_login_link" type="text" size="90" name="ok_login_link" value="<?php echo get_option('ok_login_link'); ?>" />
			</p>
			<p>	
				<label for="ok_body_class">Body class:</label>
				<input id="ok_body_class" type="text" size="90" name="ok_body_class" value="<?php echo get_option('ok_body_class'); ?>" placeholder="sports" />
			</p>
			<p>	
				<label for="ok_prefooter" style="display:block;">Prefooter text</label>
				<textarea name="ok_prefooter" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_prefooter'); ?></textarea>
			</p>
			<p>	
				<label for="ok_footer" style="display:block;">Footer text</label>
				<textarea name="ok_footer" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_footer'); ?></textarea>
			</p>
			<p>	
				<label for="ok_ga_code" style="display:block;">Google Analytics</label>
				<textarea name="ok_ga_code" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_ga_code'); ?></textarea>
				<small><?php if(get_locale() == 'uk') { echo'введіть код Google Analytics або інший';} elseif(get_locale() == 'en_US') {echo'enter google analytics code, or other';} ?>enter google analytics code, or other</small>
			</p>
		<div class="clearfix"></div>
		</div>
	</div>
</div>
<div class="clearfix"></div>
<p class="submit">
<input style="width:350px;" type="submit" class="button-primary" value="Save" 
/>
</p>
</form>
</div>
<?php } ?>