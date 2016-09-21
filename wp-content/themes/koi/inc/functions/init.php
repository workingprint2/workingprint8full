<?php 
/**
 * Initiating file for core theme files.
 *
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 2.0
 */

/*===================================================================*/
/* LOAD FUNCTIONS
/*===================================================================*/
//MEDIA FUNCTIONS
require( BEAN_FUNCTIONS_DIR . '/media.php' );

// LOAD PORTFOLIO LIKES
if( get_theme_mod( 'portfolio_likes' ) == true) {
	include( BEAN_FUNCTIONS_DIR . '/bean-likes.php' );
}


// LOAD WIDGETS
if( bean_theme_supports( 'primary', 'widgets' ))
{
	include( BEAN_WIDGETS_DIR . '/widget-init.php' );
	include( BEAN_WIDGETS_DIR . '/widget-dribbble.php' );
	include( BEAN_WIDGETS_DIR . '/widget-flickr.php' );
	include( BEAN_WIDGETS_DIR . '/widget-portfolio.php' );
}


// THEME META
if( is_admin() ) {
	if( bean_theme_supports( 'primary', 'meta' )) 
	{
		require_once( BEAN_INC_DIR . '/meta/meta-page.php');
		require_once( BEAN_INC_DIR . '/meta/meta-post.php');
		require_once( BEAN_INC_DIR . '/meta/meta-portfolio.php');
	}  
}


// META SCRIPT
if( bean_theme_supports( 'primary', 'meta' )) 
{
	function bean_admin_meta_js() {
		wp_enqueue_script( 'admin-meta', BEAN_INC_URL . '/meta/js/meta.js', 'jquery', '1.0', true );
	}
	add_action( 'admin_enqueue_scripts', 'bean_admin_meta_js');
}