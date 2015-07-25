<?php get_header(); ?>	
		<section>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<img class="aligncenter" src="<?php $link = get_template_directory_uri(); echo $link;?>/images/flying-machine.png" alt="Fantastic Flying Machine"/>
				<header><h1>It seems we've caught a foul wind and drifted off course.</h1></header>
				<p>Pour a cuppa tea, try a search or choose a category to browse. Or we can just return <a href="<?php $home = get_home_url(); echo $home; ?>">Home.</a></p>
				<?php get_search_form(); ?>
				<footer>
				</footer>
			</article>
		</section>
<?php get_footer(); ?>