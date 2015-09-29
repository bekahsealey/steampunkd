<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
 
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">	
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
		<header class="grid octagon custom">
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
			'theme_location' => 'main-nav',
			'container' => 'nav',
			'menu_id'         => 'main',
			'container_class' => 'main-menu',
			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth' => 1
		);
		?>
		<?php wp_nav_menu( $main_nav_menu ); ?>
		<?php steampunkd_the_breadcrumb(); ?>
		
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
					if ( is_day() ) :
						printf( __( 'Daily Archive for %s', 'steampunkd' ), get_the_date() );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archive for %s', 'steampunkd' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'steampunkd' ) ) );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archive for %s', 'steampunkd' ), get_the_date( _x( 'Y', 'yearly archives date format', 'steampunkd' ) ) );
					elseif ( is_author() ) : printf( __(  '%s\'s archive', 'steampunkd' ),  get_the_author_meta('nickname') ) ;
					else : printf( __( 'Browsing category: %s', 'steampunkd' ), single_cat_title( '', false ) );
					endif;
			?>
			</h3>
		</header>
	<?php } ?>
		<main class="<?php echo ( steampunkd_layout() ) ? 'full' : 'col-2-3' // check if page is a full width page and set class ?>">