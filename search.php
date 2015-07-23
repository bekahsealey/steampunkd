<?php get_header(); ?>		
			<section>
				<?php get_search_form(); ?>
				<header> 
					<h3><?php _e ( 'You are searching for "' . get_search_query() . '"' ); ?></h3>
				</header>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" class="archive">
					<?php the_post_thumbnail( 'sm-post-thumb' ); ?><header><h1><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></header>
					<small class="meta">Posted by <?php the_author() ?></small>
					<small class="meta"><time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time></small>
					<small class="comments"><?php comments_number( 'Be the first to comment', '1 comment', '% comments' ); ?><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
					<?php if( !get_the_post_thumbnail() ) the_excerpt(); ?>
				</article>
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
			</section>
<?php get_footer(); ?>