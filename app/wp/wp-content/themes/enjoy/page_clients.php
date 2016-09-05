<?php /*
Template Name: Clients
*/ ?>
<?php get_header();?>
<?php
if (have_posts()) : 
	while (have_posts()) : the_post(); ?>
<div class="title-page">
		<div class="row">
			<div class="columns latge-12">
				<div class="row">
					<div class="columns latge-12">
						<?php if(get_post_meta($post->ID, 'page_title_1', true)!='' || get_post_meta($post->ID, 'page_title_2', true)!='' || get_post_meta($post->ID, 'page_title_3', true)!=''){ ?>						
							<h1><span><?php echo get_post_meta($post->ID, 'page_title_1', true)?></span><?php echo get_post_meta($post->ID, 'page_title_2', true)?><span><?php echo get_post_meta($post->ID, 'page_title_3', true)?></span></h1>
						<?php } else {?>
							<h1><?php the_title();?></h1>
						<?php }?>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="color">
	<div class="row">
		<div class="columns large-12">
			<h2 class="title center">Меблі Enjoy</h2>
		</div>
	</div>
	<div class="row">
		<div class="columns large-12 items-wrapper small-item">
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico-3.png" alt="">
				<h4>Облаштування<br>інтер’єру</h4>
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico-3.png" alt="">
				<h4>Розробка індивідуального<br>дизайну меблів</h4>
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico-3.png" alt="">
				<h4>Нанесення фірмового<br>логотипу чи тексту УФ друком</h4>
			</div>
		</div>
	</div>
</div>

<div class="block">
	<div class="row">
		<div class="columns large-3 medium-6 large-centered medium-centered center">
			<p>Для того, щоб отримати електронний каталог, а також індивідуальну пропозицію на свій e-mail заповніть форму</p>
		</div>
		<div class="columns large-12 button-wrapper">
			<a href="#" class="order">Замовити консультацію</a>
		</div>
	</div>
</div>

<!-- gallery items -->
<div class="row max-none collapse gallery-items">
	<div class="columns large-12">
		<div class="items-wrapper">
			<div>
<?php $items = get_post_meta( $post->ID, 'items', true ); 
foreach( $items as $item){ 
	$image_attributes = wp_get_attachment_image_src( $attachment_id = $item['image'], $size = 'full' );?>
				<div class="item <?php echo $item['block-type']?>">
					<div class="wrapper">
						<div>
							<div class="image" style="background:url('<?php echo $image_attributes[0]; ?>') no-repeat center"></div>
							<div class="text-wrapper">
								<div>
									<h3><?php echo $item['title']?></h3>
									<?php echo $item['description']?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
<?php
 }
?>
			</div>
		</div>
	</div>
</div>

<!-- other -->
<div class="color">
	<div class="row">
		<div class="columns large-12">
			<h2 class="title center">Довгострокова співпраця</h2>
		</div>
	</div>
	<div class="row">
		<div class="columns large-12 items-wrapper small-item">
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico-3.png" alt="">
				<h4>Довічне післяпродажне<br>обслуговування</h4>
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico-3.png" alt="">
				<h4>Розробка індивідуального<br>дизайну меблів</h4>
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico-3.png" alt="">
				<h4>Нанесення фірмового<br>логотипу чи тексту УФ друком</h4>
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico-3.png" alt="">
				<h4>Гнучка цінова<br>політика</h4>
			</div>
		</div>
	</div>
</div>

<!-- consultation -->
<div class="consultation">
	<div class="row">
		<div class="columns large-12">
			<h2 class="center">Готові консультувати</h2>
		</div>
	</div>
	<div class="row">
		<div class="large-12 items-wrapper">
			<div class="item">
				<div class="image" style="background:url(<?php bloginfo('template_directory'); ?>/pictures/consultation/img-1.jpg) no-repeat center"></div>
				<div class="text">
					<p class="name">Андрій</p>
					<p class="tel">063 870 43 45</p>
					<p class="position">менеджер по роботі з ключовими клієнтами</p>
				</div>
			</div>
			<div class="item">
				<div class="image" style="background:url(<?php bloginfo('template_directory'); ?>/pictures/consultation/img-2.jpg) no-repeat center"></div>
				<div class="text">
					<p class="name">Роман</p>
					<p class="tel">063 870 43 45</p>
					<p class="position">менеджер по роботі з ключовими клієнтами</p>
				</div>
			</div>
			<div class="item">
				<div class="image" style="background:url(<?php bloginfo('template_directory'); ?>/pictures/consultation/img-3.jpg) no-repeat center"></div>
				<div class="text">
					<p class="name">Тарас</p>
					<p class="tel">063 870 43 45</p>
					<p class="position">менеджер по роботі з ключовими клієнтами</p>
				</div>
			</div>
		</div>
		<div class="large-12 button-wrapper">
			<a href="#" class="order">Замовити консультацію</a>
		</div>
	</div>
</div>

<!-- partners -->
<div class="partners">
	<div class="row">
		<div class="columns large-12">
			<h2 class="center">Нам довіряють</h2>
		</div>
	</div>
	<div class="row">
		<div class="large-8 large-centered items-wrapper">
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/pictures/partners/logo-1.png" alt="">
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/pictures/partners/logo-2.png" alt="">
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/pictures/partners/logo-3.png" alt="">
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/pictures/partners/logo-7.png" alt="">
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/pictures/partners/logo-5.png" alt="">
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/pictures/partners/logo-6.png" alt="">
			</div>
			<div class="item">
				<img src="<?php bloginfo('template_directory'); ?>/pictures/partners/logo-4.png" alt="">
			</div>
		</div>
	</div>
</div>

<!-- clients -->
<div class="block clients">
	<div class="row">
		<div class="columns large-12">
			<h2 class="center">Наші клієнти</h2>
		</div>
	</div>
	<div class="row">
		<div class="columns large-8 large-centered list">
			<p><span>#</span>Дитячі та розважальні центри</p>
			<p><span>#</span>Хостели та готелі</p>
			<p><span>#</span>Приватні комплекси</p>
			<p><span>#</span>Офіси та салони</p>
			<p><span>#</span>Коворкінги та кафе</p>
			<p><span>#</span>Бази відпочинку</p>
		</div>
	</div>
</div>
<?php
	endwhile;
endif;?>
<?php get_footer();?>