<?php
/**
 * Template Name: Post Archives
 * The template for displaying the post archives template.
 *
 * 
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

get_header(); ?>

<div id="primary-container" class="page-template">

	<div class="row">
			
		<div class="eight columns centered mobile-four">
			
			<?php //IF PAGE TITLE OPTION IN META IS CHECKED
			$page_title = get_post_meta($post->ID, '_bean_page_title', true); 
			if ( $page_title == 'on' ) { ?><h1 class="entry-title"><?php the_title(); ?></h1>
			<?php }?>
			
			<div class="entry-content">
				
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>
				
				<div class="archives-list">
				
				   	<h5><?php _e( 'Last 30 Posts', 'bean' );?></h5>

					   	<ul>
							<?php $archive_30 = get_posts('numberposts=30');
							foreach($archive_30 as $post) : ?>
							<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
							<?php endforeach; ?>
						</ul>
			   			  
				   	<h5><?php _e( 'Monthly Archive', 'bean' );?></h5>

				   		<ul><?php wp_get_archives('type=monthly'); ?></ul>

				   	<h5><?php _e( 'Category Archive', 'bean' );?></h5>
				   	
				   		<ul><?php wp_list_categories( 'title_li=' ); ?></ul>
	
					<!--<h5><?php _e( 'Pages', 'bean' );?></h5>

						<ul><?php wp_list_pages('title_li='); ?></ul>-->
				 	
				</div><!-- END .archives-list --> 
			
			</div><!-- END .entry-content -->
	
		</div><!-- END .eight.columns.centered.mobile-four -->
			
	</div><!-- END .row -->
	
</div><!-- END #primary-container -->	

<?php get_footer(); ?>