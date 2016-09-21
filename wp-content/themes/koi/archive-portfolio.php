<?php
/**
 * The template for displaying portfolio category & tag pages
 *
 * Used to display archive-type pages for portfolio posts.
 * If you'd like to further customize these taxonomy views, you may create a
 * new template file for each specific one. This file has taxonomy-portfolio_category.php
 * and taxonomy-portfolio_tag.php pointing to it.
 * 
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

get_header();

// LOOP QUERY 
global $query_string; query_posts("{$query_string}&posts_per_page=-1");

//PORTFOLIO PAGE SELECT FROM CUSTOMIZER
if( get_theme_mod( 'portfolio_pagination' ) == true ) { $portfolio_page = get_theme_mod('portfolio_page_selector'); ?>
	<div class="pagination animated BeanSlideInRight hide-for-small">
		<span class="page-portfolio">
			<a href="<?php echo get_page_link($portfolio_page); ?>" rel="home"></a>
		</span><!-- END .page-portfolio -->
	</div><!-- END .pagination.hide-for-small -->
			
<?php } //END IF PORTFOLIO PAGINATION ?>

<div id="primary-container" class="animated BeanFadeIn">
	
	<div id="content-container">
		
		<div class="row">	

			<div class="nine columns centered mobile-four">
				
				<div class="entry-content">
					
					<h1 class="entry-title">
						<?php 
						// PRINT TITLE FOR DIFFERENT TYPES OF PORTFOLIO ARCHIVES
					    if(get_the_terms($post->ID, 'portfolio_tag') ) { //TAGS
							printf( __( 'Tagged: %s', 'bean' ), single_tag_title( '', false ) . '' );
						
						} elseif (get_the_terms($post->ID, 'portfolio_category')) { //CATEGORIES
						  printf( __( 'Type: ', 'bean' ));  single_cat_title(); 
						
						} else { // CATCH ALL
							printf(  __( 'Archives', 'bean' ) ); 
						} ?>
					</h1>

					<p><?php echo category_description(); ?></p>
		
				</div><!-- END .entry-content-->
			
			</div><!-- END .nine.columns.centered.mobile-four -->	

		</div><!-- END .row -->	
	
	</div><!-- END #content-container -->	
		
	<div id="isotope-container" class="animated BeanFadeIn">
	
		<?php if (have_posts()) : while (have_posts()) : the_post();
		  			                 
			get_template_part( 'loop-portfolio' );
	
		endwhile; endif; wp_reset_postdata(); ?>
	
	</div><!-- END #isotope-container -->

</div><!-- END #primary-container -->	

<?php get_footer(); ?>