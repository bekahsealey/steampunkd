<?php /* Template Name: Front Page */ ?>
<?php get_header(); ?>
			<?php $catid = get_cat_id('featured'); $steampunkd_recent_param = array ( 'cat' => -$catid, 'posts_per_page' => 3 );
				$recent_query = new WP_Query( $steampunkd_recent_param );
				if ( $recent_query->have_posts() ) : while ( $recent_query->have_posts() ) : $recent_query->the_post(); ?>
				<?php if( is_sticky() ) { ?><section id="post-<?php the_ID(); ?>" <?php post_class( 'sticky' ); ?>><?php } 
				else { ?><section id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php } ?>
					<?php the_post_thumbnail('post-thumb'); ?>
					<header><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title( '<h2>', '</h2>'); ?></a></header>
					<small class="meta">Posted by <?php the_author() ?> on <time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
					<small class="meta">Filed Under: <?php the_category( ', ' ); ?></small>
					<small class="comments"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'steampunkd' ) . '</span>', __( 'One comment so far', 'steampunkd' ), __( 'View all % comments', 'steampunkd' ) ); ?></small>
					<?php the_excerpt(); ?>
					<p><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read: <?php the_title(); ?></a></p>
					<footer>
					</footer>
				</section>
				
			<?php endwhile; endif; ?>
			<?php wp_reset_postdata(); ?>
			<div class="grid">
			<?php 
				$count = 0;
				$steampunkd_older_param = array ( 'cat' => -$catid, 'posts_per_page' => 6, 'offset' => 3 );
				$older_query = new WP_Query( $steampunkd_older_param );
				if ( $older_query->have_posts() ) : while ( $older_query->have_posts() ) : $older_query->the_post(); ?>
					<section id="post-<?php the_ID(); ?>" <?php ++$count%2 ? post_class( 'col-1-2' ) : post_class( 'col-1-2 reverse' ); ?>>
						<?php the_post_thumbnail( 'sm-post-thumb' ); ?>
						<header><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title( '<h2>', '</h2>'); ?></a></header>
						<small class="meta">Posted by <?php the_author() ?></small>
						<small class="meta"><time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time></small>
						<small class="comments"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'steampunkd' ) . '</span>', __( 'One comment so far', 'steampunkd' ), __( 'View all % comments', 'steampunkd' ) ); ?></small>
						<?php if( !get_the_post_thumbnail() ) the_excerpt(); ?>
					</section>
				<?php endwhile; endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
<?php get_footer(); ?>