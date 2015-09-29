<?php get_header(); ?>		
				<header> 
					<h3><?php _e ( 'You are searching for "' . get_search_query() . '"' ); ?></h3>
				</header>
				<?php get_search_form(); ?>		
				<?php get_template_part( 'content', 'archive' ); ?>
<?php get_footer(); ?>