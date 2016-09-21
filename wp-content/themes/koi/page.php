<?php
/**
 *  The template for displaying all pages
 *
 *  This is the template that displays all pages by default.
 *  Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 *  @package WordPress
 *  @subpackage Koi
 *  @author ThemeBeans
 *  @since Koi 1.0
 */

get_header(); ?>

<div id="primary-container" class="page-template">

	<div class="row">
			
		<div class="eight columns centered mobile-four">	
			
			<?php //IF PAGE TITLE OPTION IN META IS CHECKED
			$page_title = get_post_meta($post->ID, '_bean_page_title', true); 
			if ( $page_title == 'on' ) { ?><h1 class="entry-title"><?php the_title(''); ?></h1>
			<?php }?>

			<div class="entry-content">
		
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>
				
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bean' ) . '</span>', 'after' => '</div>' ) ); ?>
				
			</div><!-- END .entry-content -->
		
		</div><!-- END .eight.columns.centered.mobile-four -->

	</div><!-- END .row -->
	
</div><!-- END #primary-container -->

<?php get_footer(); ?>