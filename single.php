<?php 
get_header();
?>		
		<main>
		
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<section class="clearfix">
				<article>
					<?php the_post_thumbnail('page-featured-image'); ?>
					<header><h1><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></header>
						<small class="meta">Posted by <?php the_author() ?> on <time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
						<small class="comments">
							<a href="<?php the_permalink(); ?>#comments" title="<?php the_title_attribute() ?> Comments">
								<?php comments_number( 'Be the first to comment', '1 comment', '% comments' ); ?>
							</a>
						</small>
					<?php if ( ! has_excerpt() ) {
							echo '';
						} else { ?>
						<aside class="post-excerpt">
							<hr>
							<?php
								the_excerpt();
							?>
							<hr>
						</aside>
						<?php
						}
					?>
					<?php the_content(); ?>
					<footer class="clearfix">
						<ul class="taxonomy clearfix">
							<li>Filed Under: <?php the_category( ', ' ); ?></li>
							<?php if ( get_the_tags() ) {?><li><?php the_tags(); ?></li><?php } ?>
						</ul>
						<div class="author clearfix">
							<h5>Written by: <?php the_author_posts_link(); ?></h5>
							<?php if( get_the_author_meta( 'user_url' ) ) { ?>
								<a href="<?php the_author_meta( 'user_url' ); ?>" title="<?php the_author_meta( 'first_name' ); ?>'s Website" target="_blank">
									<?php echo get_avatar( get_the_author_meta( 'email' ), '80', 'mm', 'Avatar of '.get_the_author_meta( 'first_name' ).' '.get_the_author_meta( 'last_name' ) ); ?>
								</a> 
							
							<?php if( get_the_author_meta( 'description' ) ) { ?>
								<p><?php the_author_meta( 'description' ); ?></p>
							<?php } ?>
							<?php } ?>
						</div><!-- author -->
					</footer>
				</article>
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
		</main>

<?php
get_sidebar();
?>
<?php
get_footer();
?>