<?php get_header(); ?>		
				<header> 
					<h3><?php printf( __( 'You are searching for "%s"', 'steampunkd' ), get_search_query(); ); ?></h3>
				</header>
				<?php get_search_form(); ?>		
				<?php get_template_part( 'content', 'archive' ); ?>
<?php get_footer(); ?>