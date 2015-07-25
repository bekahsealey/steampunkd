	</main>	
	<?php if ( !is_archive() && !is_page_template( 'template-full-footer-sidebar.php' ) && !is_page_template( 'template-full-no-comments.php' ) && !is_page_template( 'template-full-width.php' ) && !is_404() ) { get_sidebar(); } // check if page is a full width page and remove sidebar ?>
	<?php if ( is_archive() || is_page_template( 'template-full-footer-sidebar.php' ) ) {  get_sidebar( 'upper-footer' ); } ?>
	<?php get_sidebar( 'footer' ); ?>
	</div>
	<footer id="credits">
		<?php theme_credits(); ?>
		<a href="http://jigsaw.w3.org/css-validator/check/referer/?">CSS</a>
		<a href="http://validator.w3.org/check?uri=referer">HTML</a>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
