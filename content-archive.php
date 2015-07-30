				<?php $count=0; ?>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<section id="post-<?php the_ID(); ?>" <?php ++$count%2 ? post_class( 'archive col-1-2' ) : post_class( 'archive col-1-2 reverse' ); ?>>
					<?php the_post_thumbnail( 'sm-post-thumb' ); ?><header><h1><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></header>
					<small class="meta">Posted by <?php the_author() ?></small>
					<small class="meta"><time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time></small>
					<small class="comments"><?php printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'steampunkd' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
					<?php if( !get_the_post_thumbnail() ) the_excerpt(); ?>
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