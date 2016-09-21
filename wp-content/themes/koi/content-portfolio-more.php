<?php
/**
 * The file for displaying the portfolio loop below the portfolio single.
 * It is called via the single-portfolio.php.
 *
 * 
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 ?>
 
<div id="portfolio-more">
	<div class="row">
		<div class="more-title">
			<h1><?php echo get_theme_mod( 'single_portfolio_loop_title', 'More Projects' ); ?></h1>
		</div><!-- END .related-title -->
		
		<div id="isotope-container" class="animated BeanFadeIn">
			<?php
			$currentID = get_the_ID();
			$my_query = new WP_Query( array('post_type' => 'portfolio', 'orderby' => 'rand', 'showposts' => '-1', 'post__not_in' => array($currentID)));
			while ( $my_query->have_posts() ) : $my_query->the_post();
			
				get_template_part( 'loop-portfolio' );
			
			endwhile; wp_reset_postdata(); 
			?>
		</div><!-- END #isotope-container -->
		
	</div><!-- END .row -->
</div><!-- END #portfolio-more -->