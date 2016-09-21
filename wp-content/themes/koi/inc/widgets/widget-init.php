<?php
/**
 * The init file initiates the widget areas to be used throughout the theme.
 * To create another widget area, add another in the $allWidgetizedAreas array
 *  
 *   
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

/*===================================================================*/
/*  REGISTER WIDGET AREAS	
/*===================================================================*/
if ( function_exists('register_sidebar') ) {
    $allWidgetizedAreas = 
        array(
        	   __( 'Internal Sidebar', 'bean' ),
        	   __( 'Portfolio Sidebar', 'bean' ),
            );
            
    foreach ($allWidgetizedAreas as $WidgetAreaName) {
        register_sidebar(array(
           'name'			=> $WidgetAreaName,
           'before_widget' 	=> '<div class="widget %2$s clearfix">',
           'after_widget' 	=> '</div>',
           'before_title' 	=> '<h6 class="widget-title">',
           'after_title' 	=> '</h6>',
        ));
    }
}	
?>