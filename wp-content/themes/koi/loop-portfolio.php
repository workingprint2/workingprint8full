<?php
/**
 * The template for displaying the portfolio template/grid loop.
 *
 * 
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 
//GET THE LOOP ORDERBY & META_KAY VARIABLES VIA THEME CUSTOMIZER
$orderby = get_theme_mod( 'portfolio_loop_orderby' );

// GENERATE TERMS FOR FILTER
$terms =  get_the_terms( $post->ID, 'portfolio_category' ); 
$term_list = null;
if( is_array($terms) ) { foreach( $terms as $term ) { $term_list .= $term->slug; $term_list .= ' '; }}

//ON/OFF FEATURE FOR HOVERDIV
if( get_theme_mod( 'portfolio_hoverdiv' ) == false) {
	$hoverdiv_class = 'hover-off';
} else {
	$hoverdiv_class = 'hover-on';
}
?>

<li id="post-<?php the_ID(); ?>" <?php post_class("$term_list isotope-item"); ?>>
	<span class="overlay-meta-wrapper <?php echo $hoverdiv_class; ?>">
		<ul>
			<?php 
			//IF LIGHTBOX FEATURE IS SELECTED VIA THEME CUSTOMIZER, DISPLAY LIGHTBOX
			if( get_theme_mod( 'portfolio_lightbox' ) == true) {
				
				bean_gallery($post->ID, 'post-feat', 'lightbox' , true);
				
			} //END if get_theme_mod( 'portfolio_lightbox' ) 
			
			//IF PORTFOLIO LIKES FEATURE IS SELECTED VIA THEME CUSTOMIZER, DISPLAY LIKES ICON
			if( get_theme_mod( 'portfolio_likes' ) == true) { ?>
				<li class="likes animated BeanBounceIn"><?php Bean_PrintLikes($post->ID); ?></li>
			<?php } //END if get_theme_mod( 'portfolio_likes' ) ?>
		</ul>
	</span><!-- END .overlay-meta-wrapper -->
	
	<a href="<?php the_permalink(); ?>" class="<?php echo $hoverdiv_class; ?>">
		
		<div class="hoverdiv-feat hide-for-small">
			<?php the_post_thumbnail('portfolio-feat'); ?>
		</div>
		
		<div class="overlay <?php echo $hoverdiv_class; ?>">
			<h4>
				<?php echo get_the_title(); ?>
				
				<?php 
				//IF PORTFOLIO OVERLAY META IS ENABLED
				if( get_theme_mod( 'portfolio_overlay_meta' ) == true) { ?>	
				
					<span>
					
						<?php if ( $orderby == 'view_count') { ?>
						
							<?php echo the_time('M j Y'); ?>&nbsp;&nbsp;/&nbsp;&nbsp;<?php echo getPostViews(get_the_ID()); ?> <?php _e( ' Views', 'bean' ); ?>
							
				 		<?php } else { // END $orderby == 'view_count' ?>
				 		
					 		<?php 
					 		//DISPLAY PORTFOLIO CATEGORIES
					 		$terms = get_the_terms($post->ID, 'portfolio_category');
					 		$count = count($terms); $i=0;
					 	
					 		//IF NO CATEGORY - DONT GET TEMPLATE PART
					 		if( !empty( $terms ) )
					 		{
					 			$term_list = '';
					 			if ($count > 0) 
					 			{
					 				foreach ($terms as $term) 
					 				{
					 					$i++;
					 					$term_list .=  $term->name;
					 					if ($count != $i) $term_list .= '&nbsp;&nbsp;/&nbsp;&nbsp;'; 
					 				}
					 				echo $term_list;
					 			}
					 		} // END if( !empty( $terms ) ) ?>
				 		
				 		<?php } // END else ?>
			 		
					</span>
				
				<?php } // END if( get_theme_mod( 'portfolio_overlay_meta' ) == true) ?>
				
			</h4>
		</div><!-- END .overlay -->
		
		<div class="no-hoverdiv-feat show-for-small">
			<?php the_post_thumbnail('portfolio-feat'); ?>
		</div>
	</a>
	
</li><!-- END .isotope-item -->