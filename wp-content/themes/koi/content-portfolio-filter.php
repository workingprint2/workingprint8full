<?php
/**
 * The file is for displaying the portfolio filter.
 * This file is called via content-portfolio.php and in use on the page-portfolio-filter.php.
 *
 *  
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 
$terms = get_terms( 'portfolio_category' );

if( !empty($terms) ) 
{
	echo '<ul id="filter" class="animated BeanSlideInRight hide-for-small" data-filter="isotope-item">';
		echo '<li>Filter</li>';
		echo '<li><a href="#all" class="active" data-filter="isotope-item">' . __('All', 'bean') . '</a></li>';
		
		foreach( $terms as $term ) 
		{
			echo '<li><a href="' . get_term_link($term) .'" data-filter="' . $term->slug .'">' . $term->name . '</a></li>';
		}
	echo '</ul>';
}
?>