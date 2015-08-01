<?php get_header(); ?>		
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_post_thumbnail('post-thumb'); ?>
				<header><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title( '<h2>', '</h2>'); ?></a></header>
										<small class="meta">Posted by <?php the_author() ?> on <a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time></a><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
					<?php if ( comments_open() ) { ?>
					<small class="comments">
						<a href="<?php the_permalink(); ?>#comments" title="<?php the_title_attribute() ?> Comments"><?php printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'steampunkd' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></a>
					</small>
					<?php } ?>
				<?php the_excerpt(); ?>
				<p><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read more about: <?php the_title(); ?></a></p>
				<footer>
					<p>Filed Under: <?php the_category( ', ' ); ?></p>
				</footer>
			</section>
			<?php endwhile; else: ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'steampunkd' ); ?></p>
        <?php endif; ?>
		<div class="paginate">
		<?php if( $wp_query->max_num_pages > 1 ) { ?>
			<nav id="pagination">
				<?php steampunkd_paginate(); ?>
			</nav><!-- .pagination -->
		<?php } ?>
		</div>
<?php get_footer(); ?>