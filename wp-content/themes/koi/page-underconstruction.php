<?php
/**
 * Template Name: Under Construction 
 * The template for displaying the under construction page template.
 *
 * 
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 
get_header(); ?>

<div id="cogs">
    <div class="cog-large"></div>
    <div class="cog-small"></div>
</div><!-- END #cogs -->	

<div id="primary-container" class="animated BeanFadeIn">

	<div class="row">
			
		<div class="seven columns centered mobile-four">	
		
			<?php //IF PAGE TITLE OPTION IN META IS CHECKED
			$page_title = get_post_meta($post->ID, '_bean_page_title', true); 
			if ( $page_title == 'on' ) { ?><h1 class="entry-title"><?php the_title(); ?></h1>
			<?php }?>

				<div class="entry-content">
				
					<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>
					
				</div><!-- END .entry-content -->
		
		</div><!-- END .seven.columns.centered.mobile-four -->
			
	</div><!-- END .row -->	
	
</div><!-- END #primary-container -->	

<?php get_footer(); ?>