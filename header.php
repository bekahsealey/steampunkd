<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
 
<head>
<title><?php wp_title( '|' ); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" type="text/css" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper" class="grid">
		<div id="wrapper-top"></div>
		<header class="grid">
			<?php if (get_header_image() != '') { ?>
			<a href="<?php bloginfo('url'); ?>">
				<img id="custom-header" src="<?php header_image(); ?>" 
				height="<?php echo get_custom_header()->height; ?>" 
				width="<?php echo get_custom_header()->width; ?>" 
				alt="<?php bloginfo('name' ); ?>">
			</a>
			<?php } ?>
			<div class="col-2-3" >
				<h1><a style="color:#<?php header_textcolor(); ?>" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 style="color:#<?php header_textcolor(); ?>"><?php bloginfo( 'description' ); ?></h2>
			</div>
			<?php get_sidebar( 'header' ); ?>
		</header>
		
		<?php
		$main_nav_menu = array(
			'menu' => 'main-nav',
			'container' => 'nav',
			'menu_id'         => 'main',
			'container_class' => 'main-menu',
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth' => 1
		);
		?>
		<?php wp_nav_menu( $main_nav_menu ); ?>
		
		<?php 
			$template = basename( get_page_template() );
			if(!is_home() && $template != 'template-front-page.php'){the_breadcrumb();} 
		?>
		
		<?php if (is_page_template( 'template-front-page.php' ) ) { ?>
		<div class="full slider-wrapper theme-default">
			<div id="slider" class="nivoSlider">
				<?php $steampunkd_slider_param = array ( 'category_name' => 'featured', 'posts_per_page' => 6, );
					$the_query_slider = new WP_Query( $steampunkd_slider_param );
					if ( $the_query_slider->have_posts() ) : while ( $the_query_slider->have_posts() ) : $the_query_slider->the_post(); ?>
						<a href="<?php if (get_post_custom_values( 'steampunkd_slider_url' ) != "" ) {
								$steampunkd_slider_url = get_post_custom_values( 'steampunkd_slider_url' ); 
								echo $steampunkd_slider_url[0];
							} else {
								the_permalink();
							}?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'slider' ); ?>
						</a>
					<?php endwhile; endif; ?>
				<?php wp_reset_postdata(); ?>
			</div><!-- slider -->
		</div><!-- slider-wrapper -->
		<?php } ?>
		<main class="grid">