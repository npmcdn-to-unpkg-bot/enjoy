<footer>
	<div class="row">
		<div class="columns large-6 large-centered">
			<div class="menu-wrapper">
				<?php
					if(function_exists('wp_nav_menu'))
						wp_nav_menu( array( 'menu_class' => 'menu', 'container' => 'none', 'theme_location' => 'menu_footer') );
					else
						wp_page_menu('show_home=1&menu_class=menu&title_li=&depth=1&sort_column=menu_order');
				?>
			</div>
			<div class="social-wrapper">			
				<a href="<?php echo get_option('ok_facebook'); ?>" class="face"></a>
				<a href="<?php echo get_option('ok_instagram'); ?>" class="insta"></a>
			</div>
			<div class="copyring">
				<p>© Enjoy</p>
			</div>
			<div class="developer">
				<a href="http://bambukstudio.com" target="_blank">Designed & Developed by Bambuk</a>
			</div>
		</div>
	</div>
</footer>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/build/index.min.js"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/main.js"></script>
	<?php echo get_option('ok_ga_code'); ?>
	<?php wp_footer();?>
</body>
</html>