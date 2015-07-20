<?php 
/*
Template Name: Front Page */
?>
<?php 
get_header();
?>		
			<div class="full slider-wrapper theme-default">
				<div id="slider" class="nivoSlider">
				
				<?php $steampunkd_slider_param = array (
					'category_name' => 'featured',
					'posts_per_page' => 6,
					);
					$the_query_slider = new WP_Query( $steampunkd_slider_param );
					if ( $the_query_slider->have_posts() ) : while ( $the_query_slider->have_posts() ) : $the_query_slider->the_post(); ?>
					
						<a href="<?php 
						if (get_post_custom_values( 'steampunkd_slider_url' ) != "" )
							{
								$steampunkd_slider_url = get_post_custom_values( 'steampunkd_slider_url' ); 
								echo $steampunkd_slider_url[0];
							} else {
								the_permalink();
							}?>" title="<?php the_title(); ?>">
							<?php the_post_thumbnail( 'slider' ); ?>
						</a>
				<?php endwhile; endif;
				wp_reset_postdata(); ?>
			</div><!-- slider -->
		</div><!-- slider-wrapper -->
		<main>
			<section>
			<?php
			$catid = get_cat_id('featured'); 
			$steampunkd_recent_param = array (
				'cat' => -$catid,
				'posts_per_page' => 3,
				);
				$recent_query = new WP_Query( $steampunkd_recent_param );
				if ( $recent_query->have_posts() ) : while ( $recent_query->have_posts() ) : $recent_query->the_post(); ?>
				<article>
				<?php the_post_thumbnail('post-thumb'); ?>
				<header><h1><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></header>
					<small class="meta">Posted by <?php the_author() ?> on <time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
					<small class="meta">Filed Under: <?php the_category( ', ' ); ?></small>
					<small class="comments"><?php comments_number( 'Be the first to comment', '1 comment', '% comments' ); ?></small>
				<?php the_excerpt(); ?>
				<p><a class="more" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Read: <?php the_title(); ?></a></p>
				<footer>
				</footer>
				</article>
				
			<?php endwhile; endif;
			wp_reset_postdata(); ?><?php $steampunkd_older_param = array (
				'cat' => -$catid,
				'posts_per_page' => 6,
				'offset' => 3,
				);
				$older_query = new WP_Query( $steampunkd_older_param );
				if ( $older_query->have_posts() ) : while ( $older_query->have_posts() ) : $older_query->the_post(); ?>
				<article id="post-<?php the_ID(); ?>" class="archive">
							<?php the_post_thumbnail( 'sm-post-thumb' ); ?><header><h1><a href="<?php the_permalink(); ?>" title="For More Info on <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1></header>
								<small class="meta">Posted by <?php the_author() ?></small>
								<small class="meta"><time datetime="<?php the_time( 'Y-m-d' ); ?>" ><?php the_time( 'D, M jS, Y' ) ?></time></small>
								<small class="comments"><?php comments_number( 'Be the first to comment', '1 comment', '% comments' ); ?><?php edit_post_link( 'Edit', ' | ', '' ); ?></small>
							<?php if( !get_the_post_thumbnail() ) the_excerpt(); ?>
					</article>
				
			<?php endwhile; endif;
			wp_reset_postdata(); ?>
				</section>
			</main>

<?php
get_sidebar();
?>
<?php
get_footer();
?>