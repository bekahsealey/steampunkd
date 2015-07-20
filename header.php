<!DOCTYPE html>
<html <?php language_attributes(); ?>>
 
<head>
<title><?php wp_title( '|' ); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<link href="<?php bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400,400italic%7cAbril+Fatface' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body <?php body_class( $class ); ?>>
	<div id="wrapper">
	<div id="wrapper-top"></div>
		
    	
		<header>
		<a href="<?php bloginfo('url'); ?>">
			<img id="custom-header" src="<?php header_image(); ?>" 
			height="<?php echo get_custom_header()->height; ?>" 
			width="<?php echo get_custom_header()->width; ?>" 
			alt="<?php bloginfo('name' ); ?>">
		</a>
			<h1><a style="color:#<?php header_textcolor(); ?>" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 style="color:#<?php header_textcolor(); ?>"><?php bloginfo( 'description' ); ?></h2>
			<div style="color:#<?php header_textcolor(); ?>">
				<?php
				get_sidebar( 'header' );
				?>
			</div>
		</header>
		
		<?php
		$main_nav_menu = array(
			'theme_location' => 'main-nav',
			'container' => 'nav',
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