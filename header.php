<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
 
<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" type="text/css" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="wrapper" class="grid">
		<div id="wrapper-top"></div>
		<?php if (get_header_image() != '') { ?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img id="custom-header" src="<?php header_image(); ?>" 
			height="<?php echo get_custom_header()->height; ?>" 
			width="<?php echo get_custom_header()->width; ?>" 
			alt="<?php bloginfo('name' ); ?>">
		</a>
		<header class="grid" style="border: none;position: absolute;top: 130px;padding: 25px;height: 190px;overflow: hidden;">
		<?php } else { ?>
		<header class="grid">
		<?php } ?>
			<div class="col-2-3" >
				<h1><a style="color:#<?php header_textcolor(); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
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
		<?php the_breadcrumb(); ?>
		
	<?php if ( is_front_page() && is_page_template( 'template-front-page.php' ) ) { ?>
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
	<?php if ( is_archive() ) { ?>
		<header> 
			<h3>
			<?php
				if( is_day() ) _e( 'Daily archives for ' . get_the_date(), 'steampunkd' );
				elseif ( is_month() ) _e( 'Monthly archives for ' . get_the_date( 'F Y' ), 'steampunkd' );
				elseif ( is_year() ) _e( 'Yearly archives for ' . get_the_date( 'Y' ), 'steampunkd' );
				elseif ( is_author() ) _e( get_the_author_meta('nickname') . "'s archives", 'steampunkd' );
				else _e( 'Browsing category: "'. single_cat_title( '', false ) . '"', 'steampunkd' );
			?>
			</h3>
		</header>
	<?php } ?>
		<main class="<?php echo ( steampunkd_layout() ) ? 'full' : 'col-2-3' // check if page is a full width page and set class ?>">