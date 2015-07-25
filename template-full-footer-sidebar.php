<?php /* Template Name: Full Width, Upper Footer sidebar */ ?>
<?php get_header(); ?>		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<section>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_post_thumbnail('fullwidth-featured-image'); ?>
					<header><h1><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></header>
					<small class="meta">Posted by <?php the_author() ?> on <time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
					<small class="comments"><?php comments_number( 'Be the first to comment', '1 comment', '% comments' ); ?></small>
					<?php if ( ! has_excerpt() ) { echo ''; } else { ?>
						<aside class="post-excerpt">
							<hr>
							<?php the_excerpt(); ?>
							<hr>
						</aside>
					<?php } ?>
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
					<footer>
					</footer>
				</article>
			</section>
			<?php endwhile; else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
<?php get_footer(); ?>