<div class="<?php echo ( steampunkd_layout() ) ? 'sidebar' : 'sidebar-search reverse col-1-3' // check if page is a full width page and set class ?>">
	<?php get_search_form(); ?>
	<?php dynamic_sidebar( 'Right' ); ?>
</div>
