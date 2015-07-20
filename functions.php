<?php
function steampunkd_filter_wp_title( $currenttitle, $sep, $seplocal ) {
	//Grab the site name
	$site_name = get_bloginfo( 'name' );
	
	//Add the site name after the current page title
	$full_title = $site_name . $currenttitle;
	
	//If we are on the front_page or homepage append the description
	if ( is_front_page() || is_home() ) {
		
		//Grab the Site Description
		$site_desc = get_bloginfo( 'description' );
		
		//Append Site Description to title
		$full_title .= ' ' . $sep . ' ' . $site_desc;
	}
	
	//Return the modified title
	return $full_title;
}

//Hook into 'wp_title'
add_filter ( 'wp_title', 'steampunkd_filter_wp_title', 10, 3 );

$custom_header_args = array(
	'default-image'          => get_template_directory_uri() . '/images/header.gif',
	'random-default'         => false,
	'width'                  => 910,
	'height'                 => 190,
	'flex-height'            => false,
	'flex-width'             => false,
	'default-text-color'     => '2e2315',
	'header-text'            => true,
	'uploads'                => true
);
add_theme_support( 'custom-header', $custom_header_args );
add_theme_support( 'custom-background' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form' ) );
add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'post', 'excerpt' );
add_theme_support( 'post-thumbnails' );
add_image_size( 'slider', 910, 350, true );
add_image_size( 'post-thumb', 598, 125, true );
add_image_size( 'sm-post-thumb', 190, 120, true );
add_image_size( 'page-featured-image', 598, 220, true );
add_image_size( 'fullwidth-featured-image', 860, 200, true );
register_nav_menu( 'main-nav' , 'Main Nav' );

function steampunkd_scripts() {
	wp_enqueue_script( 'jquery' );
	$template = basename( get_page_template() );
	if($template == 'template-front-page.php') {
		wp_enqueue_script( 'steampunkd_nivoslider', get_stylesheet_directory_uri() . '/js/jquery.nivo.slider.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'steampunkd_functions', get_stylesheet_directory_uri() . '/js/theme.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'steampunkd_nivoslider_css', get_stylesheet_directory_uri() . '/css/nivo/nivo-slider.css' );
		wp_enqueue_style( 'steampunkd_nivoslider_css_theme_default', get_stylesheet_directory_uri() . '/css/nivo/default.css' );   
    } 
	$body_class = get_body_class();
	if ($template == 'template-full-footer-sidebar.php' || in_array( 'error404', $body_class)) { 
		wp_enqueue_script( 'flex-widgets', get_template_directory_uri() . '/js/flex-widgets.js', '', '1.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'steampunkd_scripts' );


$steampunkd_header_sidebar = array(
    'name' => 'Header',
    'id' => 'header-sidebar',
    'description' => 'Widgets placed here will display in the right header area -- max size 200px by 160px',
    'before_widget' => '<aside class="header">',
    'after_widget' => '</aside>',
    'before_title' => '<h5 class="widgettitle">',
    'after_title' => '</h5>',
);
register_sidebar( $steampunkd_header_sidebar );

$steampunkd_rt_sidebar = array(
    'name' => 'Right',
    'id' => 'rt-sidebar',
    'description' => 'Widgets placed here will display in the main right sidebar',
    'before_widget' => '<aside class="widget right">',
    'after_widget' => '</aside>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
);
register_sidebar( $steampunkd_rt_sidebar );

$steampunkd_single_post_sidebar = array(
    'name' => 'Single',
    'id' => 'single-post',
    'description' => 'Widgets placed here will display under the post on a single post page',
    'before_widget' => '<aside class="left">',
    'after_widget' => '</aside>',
    'before_title' => '<h5 class="widgettitle">',
    'after_title' => '</h5>',
);
register_sidebar( $steampunkd_single_post_sidebar );

$steampunkd_upper_footer_sidebar = array(
    'name' => 'Upper-Footer',
    'id' => 'upper-footer-sidebar',
    'description' => 'Widgets placed here will display in a full-width page footer',
    'before_widget' => '<aside class="widget left">',
    'after_widget' => '</aside>',
    'before_title' => '<h2 class="widgettitle">',
    'after_title' => '</h2>',
);
register_sidebar( $steampunkd_upper_footer_sidebar );

$steampunkd_footer_sidebar = array(
    'name' => 'Footer',
    'id' => 'footer-sidebar',
    'description' => 'Widgets placed here will display in the footer area',
    'before_widget' => '<aside class="left">',
    'after_widget' => '</aside>',
    'before_title' => '<h6 class="widgettitle">',
    'after_title' => '</h6>',
);
register_sidebar( $steampunkd_footer_sidebar );
function the_breadcrumb() {
    global $post;
    echo '<ul id="breadcrumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo '</a></li><li> > </li>';
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li> > </li><li> ');
            if (is_single()) {
                echo '</li><li> > </li><li>';
                the_title();
                echo '</li>';
            }
    		elseif ( !have_posts() ) { echo single_cat_title( '', false ); }
			
        } elseif (is_page()) {
            if($post->post_parent){
                $ancestors = get_post_ancestors( $post->ID );
                foreach ( array_reverse($ancestors) as $ancestor ) {
					$title = get_the_title();
                    $output .= '<li><a href="x" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li>></li>';
                }
                echo $output;
                echo '<li>' . $title . '</li>';
            } else {
                echo '<li>'; the_title(); echo '</li>';
            }
		}
    elseif (is_tag()) {echo'<li>Search Results for "'; single_tag_title(); echo'" Tag</li>';}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo'<li>Search Results for "' . get_search_query() . '"'; echo'</li>';}
	echo '</ul>';
	}
}
function steampunkd_paginate() {
    global $paged, $wp_query;
    $abignum = 999999999; //we need an unlikely integer
    $args = array(
        'base' => str_replace( $abignum, '%#%', esc_url( get_pagenum_link( $abignum ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var( 'paged' ) ),
        'total' => $wp_query->max_num_pages,
        'show_all' => False,
        'end_size' => 2,
        'mid_size' => 2,
        'prev_next' => True,
        'prev_text' => __( '&laquo;' ),
        'next_text' => __( '&raquo;' ),
        'type' => 'list'
    );
    echo paginate_links( $args );
}


// set length of default excerpt
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

?>