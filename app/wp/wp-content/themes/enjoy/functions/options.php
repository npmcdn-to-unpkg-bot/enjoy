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
add_menu_page('Theme options', 'Theme options', 'administrator', 
__FILE__, 'omr_settings_page', ''.get_bloginfo('stylesheet_directory').'/functions/ico.png');

//виклик функції register settings
add_action( 'admin_init', 'register_mysettings' );
}

function enjoy_add_init() {
    if ( is_admin() ) {
        wp_enqueue_style("functions", "".get_bloginfo('stylesheet_directory')."/functions/functions.css", false, "1.0", "all");
        wp_enqueue_script("rm_script", "".get_bloginfo('stylesheet_directory')."/functions/script.js", false, "1.0");
    }
}
add_action( 'admin_print_styles', 'enjoy_add_init' );

function register_mysettings() {
//реєструємо наші налаштування
register_setting( 'omr-settings-group', 'ok_email' );
register_setting( 'omr-settings-group', 'ok_adresa' );
register_setting( 'omr-settings-group', 'ok_ga_code' );
register_setting( 'omr-settings-group', 'ok_facebook' );
register_setting( 'omr-settings-group', 'ok_instagram' );
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
		Other options</h3>
	<div class="clearfix"></div>
	</div>
	<div class="rm_options">
		<div class="rm_input rm_text">	
			<p>
				<label for="ok_email">Email:</label>
				<input id="ok_email" type="text" size="90" name="ok_email" value="<?php echo get_option('ok_email'); ?>" />
			</p>
			<p>
				<label for="ok_adresa" style="display:block;">Адреса</label>
				<textarea class="multilang" name="ok_adresa" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_adresa'); ?></textarea>
			</p>
			<p>
				<label for="ok_facebook">Facebook:</label>
				<input id="ok_facebook" type="text" size="90" name="ok_facebook" value="<?php echo get_option('ok_facebook'); ?>" />
			</p>
			<p>
				<label for="ok_instagram">Instagram:</label>
				<input id="ok_instagram" type="text" size="90" name="ok_instagram" value="<?php echo get_option('ok_instagram'); ?>" />
			</p>
			<p>
				<label for="ok_ga_code" style="display:block;">Google Analytics</label>
				<textarea class="multilang" name="ok_ga_code" style="width:320px;height:150px;" type="textarea" ><?php echo get_option('ok_ga_code'); ?></textarea>
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