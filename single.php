<?php get_header(); ?>		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<section>
			<?php
				// Pick post template 
				( has_post_format( array( 'gallery', 'image', 'video' ) ) ) ? get_template_part( 'content', 'full' ) : get_template_part( 'content' ); ?>
				<nav id="pagi" class="clearfix">
					<ul>
						<?php previous_post_link( '<li>%link</li>', __( 'Previous Post', 'steampunkd') ); ?>
						<?php next_post_link( '<li>%link</li>', __( 'Next Post', 'steampunkd') ); ?>
					</ul>
				</nav><!-- .pagination -->
				<?php get_sidebar( 'post' ); ?>
				<div class="comments">
					<?php comments_template( '', true ); ?>
				</div><!-- comments-->
			</section>
		<?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'steampunkd' ); ?></p>
        <?php endif; ?>
<?php get_footer(); ?>