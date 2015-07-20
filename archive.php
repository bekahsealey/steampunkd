<?php 
get_header();
?>		
				<header class="full"> 
					<h3>
						<?php
							if( is_day() ) _e( 'Daily archives for ' . get_the_date() );
							elseif ( is_month() ) _e( 'Monthly archives for ' . get_the_date( 'F Y' ) );
							elseif ( is_year() ) _e( 'Yearly archives for ' . get_the_date( 'Y' ) ); 
							elseif ( is_author() ) _e( get_the_author_meta('nickname') . "'s archives" ); 
							else _e( 'Browsing category: "'. single_cat_title( '', false ) . '"' );
						?>
					</h3>
				</header>
			<main>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<section>
					<article id="post-<?php the_ID(); ?>">
						<?php the_post_thumbnail('post-thumb'); ?>
						<header><h1><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></header>
						<small class="meta">Posted by <?php the_author() ?> on <time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
						<small class="comments"><?php comments_number( 'Be the first to comment', '1 comment', '% comments' ); ?></small>
						<?php the_excerpt(); ?>
						<p><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read more about: <?php the_title(); ?></a></p>
						<footer>
							<p>Filed Under: <?php the_category( ', ' ); ?></p>
						</footer>
					</article>
				</section>
					<?php endwhile; else: ?>
					<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php endif; ?>
					<div class="paginate">
						<?php if( $wp_query->max_num_pages > 1 ) { ?>
								<nav id="pagination">
									<?php steampunkd_paginate(); ?>
								</nav><!-- .pagination -->
						<?php } ?>
				</div>
		</main>

<?php
get_sidebar();
?>
<?php
get_footer();
?>