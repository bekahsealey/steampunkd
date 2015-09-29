<?php get_header(); ?>	
		<section>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<img class="aligncenter" src="<?php $link = get_template_directory_uri(); echo $link;?>/images/flying-machine.png" alt="Fantastic Flying Machine"/>
				<header><h2><?php _e( 'It seems we\'ve caught a foul wind and drifted off course.', 'steampunkd' ); ?></h2></header>
				<p><?php _e( 'Pour a cuppa tea, try a search or choose a category to browse. Or we can just return ', 'steampunkd' ); ?><a href="<?php echo esc_url( home_url('/')); ?>"><?php _e( 'Home', 'steampunkd' ); ?></a>.</p>
				<?php get_search_form(); ?>
			</article>
		</section>
<?php get_footer(); ?>