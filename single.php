<?php get_header(); ?>		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<section>
			<?php
				// Do a switch for post template
				$format = get_post_format();
				
				switch ($format) {
					case 'gallery':
						get_template_part( 'content-full' );
						break;
					case 'aside':
						echo "i equals 1";
						break;
					case 'link':
						echo "i equals 2";
						break;
					case 'image':
						echo "i equals 2";
						break;
					case 'quote':
						echo "i equals 2";
						break;
					case 'status':
						echo "i equals 2";
						break;
					case 'video':
						echo "i equals 2";
						break;
					case 'audio':
						echo "i equals 2";
						break;
					case 'chat':
						echo "i equals 2";
						break;
					default:
						get_template_part( 'content' );
				} ?>
				<nav id="pagi" class="clearfix">
					<ul>
						<?php previous_post_link( '<li>%link</li>', 'Previous Post' ); ?>
						<?php next_post_link( '<li>%link</li>', 'Next Post' ); ?>
					</ul>
				</nav><!-- .pagination -->
				<?php get_sidebar( 'post' ); ?>
				<div class="comments">
					<?php comments_template( '', true ); ?>
				</div><!-- comments-->
			</section>
		<?php endwhile; else: ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
<?php get_footer(); ?>