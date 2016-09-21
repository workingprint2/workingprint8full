<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

get_header(); ?>

<div class="pagination animated BeanSlideInRight hide-for-small">	
	<span class="page-previous">
	    <?php next_posts_link(''); ?>
	</span><!-- END .nav-previous -->
	<span class="page-next">
	    <?php previous_posts_link(''); ?>
	</span><!-- END .nav-next --> 
</div><!-- END .pagination.hide-for-small -->

<div id="primary-container">
	
	<div class="row">
		<div class="eight columns centered mobile-four">
	
			<form id="searchform" class="searchform" method="get" action="<?php echo get_home_url(); ?>">
			    <div class="clearfix default_searchform results">
			        <input type="text" name="s" class="s" onblur="if (this.value == '') {this.value = '<?php _e('To search, type & hit enter... ','bean'); ?>';}" onfocus="if (this.value == '<?php _e('To search, type & hit enter... ','bean'); ?>') {this.value = '';}" value="<?php _e('To search, type & hit enter... ','bean'); ?>" />
			        <button type="submit" class="button"></button>
			    </div><!-- END .clearfix defaul_searchform -->
			</form><!-- END #searchform -->
	
		</div><!-- END .eight.columns.centered.mobile-four -->	
	</div><!-- END .row -->

	<?php global $query_string; query_posts( $query_string . '&posts_per_page='. get_option('posts_per_page') .'' ); ?>

	<?php 
	// IF SEARCH RESULTS 
	if ( have_posts() ) 
	{	
		// THE LOOP
		if (have_posts()) : while (have_posts()) : the_post(); 
			$format = get_post_format(); 
			if( false === $format ) { $format = 'standard'; }
			if( $format == 'aside' || $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote' || $format == 'video') { }	
			get_template_part( 'inc/post-formats/content' ); 	
		endwhile; endif; 
	
	} 
	// IF NO SEARCH RESULTS
	else 
	{ ?>
	
	<div class="row">
		<div class="eight columns centered mobile-four">
			<h1 class="entry-title"><?php printf( __('Nothing Found.', 'bean'), get_search_query()); ?></h1>
			<p><?php printf( __('Sorry, we couldn&#39;t find anything for "%s".','bean'), get_search_query() ); ?></p>
		</div><!-- END .eight.columns.centered.mobile-four -->	
	</div><!-- END .row -->		
			
	<?php 
	} // END else ?>

	<div class="pagination index-mobile show-for-small">	
		<span class="page-previous">
		    <?php next_posts_link(''); ?>
		</span><!-- END .nav-previous -->
		<span class="page-next">
		    <?php previous_posts_link(''); ?>
		</span><!-- END .nav-next --> 
	</div><!-- END .pagination.hide-for-small -->

</div><!-- END #primary-container -->	
		
<?php get_footer(); ?>