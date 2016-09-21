<?php
/**
 * The file for displaying the portfolio template's primary content.
 * It is pulled by the portfolio template files and is setup to reflect both templates.
 *
 * 
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

//PULL PAGINATION FROM READING SETTINGS
$paged = 1; 
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');

//PULL PAGINATION FROM CUSTOMIZATION
$portfolio_posts_count = get_theme_mod( 'portfolio_posts_count');

//GET THE LOOP ORDERBY & META_KAY VARIABLES VIA THEME CUSTOMIZER
$orderby = get_theme_mod( 'portfolio_loop_orderby' );

//LOOP ORDERBY VARIABLE
if( $orderby != '' ) {
    switch ( $orderby ) {
        case 'date': 
        	$order = 'DSC';
        	$orderby = 'date';
        	$meta_key = ''; 
        	break;
        case 'rand': 
        	$order = 'DSC';
        	$orderby = 'rand';
        	$meta_key = ''; 
       		break;
       	case 'menu_order': 
       		$order = 'ASC';
       		$orderby = 'menu_order';
       		$meta_key = ''; 
       		break;	
		case 'view_count':
			$order = 'DSC';
			$orderby = 'meta_value_num'; 
			$meta_key = 'post_views_count'; 
			break;
	}
}
?>

<div id="primary-container" class="portfolio-template">

	<?php 
	//GET THE FILTER IF FILTERED PORTFOLIO TEMPLATE
	if( is_page_template('page-portfolio-filter.php') ) {
		get_template_part( 'content', 'portfolio-filter' ); //PULL CONTENT-PORTFOLIO-FILTER.PHP
	} ?>
	
	<div id="isotope-container" class="animated BeanFadeIn">
	
		<?php
		//LOAD PORTFOLIO QUERY - NEED BEAN PORTFOLIO POST TYPE PLUGIN
		$args = array(
		'post_type' 		=> 'portfolio',
		'order' 			=> $order,
		'orderby' 			=> $orderby,
		'paged' 			=> $paged,
		'meta_key' 			=> $meta_key,
		'posts_per_page' 	=> $portfolio_posts_count,
		); 
		
		query_posts($args); if (have_posts()) : while (have_posts()) : the_post(); 
		
		get_template_part( 'loop-portfolio' ); //PULL LOOP-PORTFOLIO.PHP
		
		endwhile; endif; ?>		

	</div><!-- END #isotope-container -->
			
</div><!-- END #primary-container -->