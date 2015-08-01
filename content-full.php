				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_post_thumbnail('fullwidth-featured-image'); ?>
					<header><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title( '<h2>', '</h2>'); ?></a></header>
										<small class="meta">Posted by <?php the_author() ?> on <a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time></a><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
					<?php if ( comments_open() ) { ?>
					<small class="comments">
						<a href="<?php the_permalink(); ?>#comments" title="<?php the_title_attribute() ?> Comments"><?php printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'steampunkd' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' ); ?></a>
					</small>
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
					<footer>
					</footer>
				</article>