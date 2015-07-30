<?php /* Template Name: Full Width Page */ ?>
<?php get_header(); ?>		
		 <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<section>
				<?php get_template_part( 'content-full' ); ?>
				<div class="comments">
					<?php comments_template( '', true ); ?>
				</div><!-- comments-->
			</section>
		<?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'steampunkd' ); ?></p>
        <?php endif; ?>
<?php get_footer(); ?>