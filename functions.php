<?php
add_action('after_setup_theme', 'steampunkd_setup');
function steampunkd_setup(){
    load_theme_textdomain('steampunkd', get_template_directory() . '/languages');
}

function steampunkd_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'steampunkd' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'steampunkd_wp_title', 10, 2 );


if ( ! isset( $content_width ) ) { $content_width = 800; }

add_post_type_support( 'page', 'excerpt' );
add_post_type_support( 'post', 'excerpt' );
$custom_header_args = array(
	'default-image'          => false,
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
add_theme_support( 'title-tag' );
add_theme_support( 'custom-background' );
add_theme_support(  'automatic-feed-links'  );
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
add_theme_support( 'post-thumbnails' );
add_image_size( 'slider', 910, 350, true );
add_image_size( 'post-thumb', 555, 125, true );
add_image_size( 'sm-post-thumb', 190, 120, true );
add_image_size( 'post-featured-image', 555, 220, true );
add_image_size( 'fullwidth-featured-image', 858, 260, true );

register_nav_menu( 'main-nav' , 'Main Nav' );

function steampunkd_scripts() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
	wp_enqueue_style( 'steampunkd_fonts', '//fonts.googleapis.com/css?family=Sorts+Mill+Goudy:400,400italic%7cAbril+Fatface' );
	wp_enqueue_script( 'steampunkd_modernizr', '//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', array( 'jquery' ), '2.8.3', false );
	wp_enqueue_script( 'steampunkd_slicknavjs', get_stylesheet_directory_uri() . '/js/jquery.slicknav.js', array( 'jquery' ), '1.0.4', false );
	wp_enqueue_style( 'steampunkd_slicknavcss', '//cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.4/slicknav.css' );
	wp_enqueue_script( 'steampunkd_global', get_stylesheet_directory_uri() . '/js/global.js', array( 'jquery' ), '1.0.0', true );
	if ( !is_archive() ) {
		$template = basename( get_page_template() );
		if( $template == 'template-front-page.php' ) {
			wp_enqueue_script( 'steampunkd_nivoslider', get_stylesheet_directory_uri() . '/js/jquery.nivo.slider.js', array( 'jquery' ), '', false );
			wp_enqueue_style( 'steampunkd_nivoslider_css', get_stylesheet_directory_uri() . '/css/nivo/nivo-slider.css' );
			wp_enqueue_style( 'steampunkd_nivoslider_css_theme_default', get_stylesheet_directory_uri() . '/css/nivo/default.css' );   
			wp_enqueue_script( 'steampunkd_theme', get_stylesheet_directory_uri() . '/js/theme.js', array( 'jquery' ), '1.0.0', true );
    	} 
    }
}
add_action( 'wp_enqueue_scripts', 'steampunkd_scripts' );

add_action( 'widgets_init', 'steampunkd_widgets_init' );
function steampunkd_widgets_init() {
	$steampunkd_header_sidebar = array(
		'name' => 'Header',
		'id' => 'header-sidebar',
		'description' => 'Widgets placed here will display in the right header area -- max size 200px by 160px',
		'before_widget' => '<aside class="header widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
	);
	register_sidebar( $steampunkd_header_sidebar );

	$steampunkd_rt_sidebar = array(
		'name' => 'Right',
		'id' => 'rt-sidebar',
		'description' => 'Widgets placed here will display in the main right sidebar',
		'before_widget' => '<aside class="frame widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	);
	register_sidebar( $steampunkd_rt_sidebar );

	$steampunkd_single_post_sidebar = array(
		'name' => 'Single',
		'id' => 'single-post',
		'description' => 'Widgets placed here will display under the post on a single post page',
		'before_widget' => '<aside class="flex widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h5 class="widgettitle">',
		'after_title' => '</h5>',
	);
	register_sidebar( $steampunkd_single_post_sidebar );

	$steampunkd_footer_sidebar = array(
		'name' => 'Footer',
		'id' => 'footer-sidebar',
		'description' => 'Widgets placed here will display in the footer area',
		'before_widget' => '<aside class="flex widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h6 class="widgettitle">',
		'after_title' => '</h6>',
	);
	register_sidebar( $steampunkd_footer_sidebar );
}

function the_breadcrumb() {
    global $post;
    if ( is_front_page() ) { return; } else {
    echo '<ul id="breadcrumbs">';
    	if ( !is_home() || !is_front_page() ) {
    		echo '<li><a href="';
    		$url = home_url( '/' );
			echo $url;
    		echo '">';
    		echo 'Home';
    		echo '</a></li><li>&nbsp;&gt;&nbsp;</li>';
        	if (is_category() || is_single() || ( is_home() && !is_front_page() ) ) {
            	echo '<li>';
            	if( is_category() ) {
            		$cat = get_query_var('cat');
        			echo get_category_parents( $cat, true, '</li><li>&nbsp;&gt;&nbsp;</li>' );
        		}
        		elseif ( ( is_home() && !is_front_page() ) ) {
          	  		echo ucwords(basename($_SERVER['REQUEST_URI']));
          	  		echo' </li>';
            	}
            	if ( is_single() ) {
                	the_title();
                	echo '</li>';
            	}
    			elseif ( !have_posts() ) { echo single_cat_title( '', false ); }
			
        	} elseif ( is_page() ) {
            	if($post->post_parent){
                	$ancestors = get_post_ancestors( $post->ID );
                	foreach ( array_reverse($ancestors) as $ancestor ) {
						$title = get_the_title();
                    	$output .= '<li><a href="x" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li> <li>&nbsp;&gt;&nbsp;</li>';
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
			echo '</ul>'; return;
		}
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
        'prev_text' => __( '&laquo;', 'steampunkd' ),
        'next_text' => __( '&raquo;', 'steampunkd' ),
        'type' => 'list'
    );
    echo paginate_links( $args );
}

//control tag display
function my_tag_cloud_args($in){
    return 'smallest=11&largest=18&number=8&orderby=name&unit=px';
}
add_filter( 'widget_tag_cloud_args', 'my_tag_cloud_args' );


// set length of default excerpt
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function theme_credits() {
	$copy = _e("<small>Copyright &copy;", 'steampunkd');
	$date = date( 'Y' );
	$name = _e( get_bloginfo( 'name' ) );
	$designed = _e("<span>&#x7c;</span> Steampunk'd Theme Designed by <a href=\"http://nmomedia.com\">Rebekah Sealey</a><span>&#x7c;</span> Powered by <a href=\"http://wordpress.org\">Wordpress</a>.</small>", "steampunkd");
	$output  = $copy;
	$output .= $date;
	$output .= $name;
	$output .= $designed;
	return $output;
}
	
function steampunkd_layout() {
	// check if page layout should be full width and set class
	if ( is_archive() ) { return TRUE; }
	elseif ( is_search() ) { return TRUE; }
	elseif ( is_page_template( 'template-full-width.php' ) ) { return TRUE; }
	elseif ( is_404() ) { return TRUE; }
	elseif ( has_post_format( array( 'gallery', 'image', 'video' ) ) ) { return TRUE; }
	else { return FALSE; }
}
