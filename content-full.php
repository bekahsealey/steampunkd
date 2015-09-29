				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_post_thumbnail('fullwidth-featured-image'); ?>
					<header><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title( '<h2>', '</h2>'); ?></a></header>
										<small class="meta">Posted by <?php the_author() ?> on <a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time></a><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
					<?php if ( comments_open() ) { ?>
					<small class="comments"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'steampunkd' ) . '</span>', __( 'One comment so far', 'steampunkd' ), __( 'View all % comments', 'steampunkd' ) ); ?></small>
					<?php } ?>
					<?php if ( ! has_excerpt() ) { echo ''; } else { ?>
						<aside class="post-excerpt">
							<hr>
							<?php the_excerpt(); ?>
							<hr>
						</aside>
						<?php } ?>
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</article>