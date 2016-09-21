<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
	
<div id="primary-container" class="index-fullwidth">  
		
	<?php // THE LOOP
	if (have_posts()) : while (have_posts()) : the_post(); 
		$format = get_post_format(); 
		if( false === $format ) { $format = 'standard'; }
		if( $format == 'aside' || $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote') { }
		get_template_part( 'inc/post-formats/content', $format ); 	
	endwhile; endif; 
	?>
	
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