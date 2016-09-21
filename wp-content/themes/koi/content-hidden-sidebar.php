<?php
/**
 * The file for displaying the theme hidden sidebar.
 * It is called via the footer.php file.
 *
 * 
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 ?>

<div class="hidden-sidebar">

	<div class="hidden-sidebar-inner">
	
		<span class="close-btn show-for-small"></span>
		
		<h6 class="menu_text"><?php echo get_theme_mod( 'menu_text', 'Menu.' ); ?></h6>
		
		<?php if( has_nav_menu( 'primary-menu' ) ) {
		    wp_nav_menu( array( 
		    	'theme_location' => 'primary-menu', 
		    	'container' => '', 
		    	'menu_id' => 'primary-menu',
		    	'menu_class' => 'main-menu',
		    	) ); 
		} ?>

		<?php 
		//WIDGET AREAS FOR THE PORTFOLIO PAGES/VIEWS
		if ( is_singular('portfolio') || is_page_template('page-portfolio.php') || is_page_template('page-portfolio-filter.php') || is_archive() ) {
			dynamic_sidebar( 'Portfolio Sidebar' );
		} else {
			dynamic_sidebar( 'Internal Sidebar' ); 
		} ?>
		
		<footer>
			<p class="copyright">
				<?php 
				if ( get_theme_mod( 'footer_copyright') ) {	
					echo get_theme_mod( 'footer_copyright'); 
				} else {
					echo '&copy; <a href="http://themebeans.com/theme/koi/?ref=koidemo">Koi</a> by <a href="http://themebeans.com/?ref=koidemo">ThemeBeans</a>';
				}?>
			</p>
		</footer><!-- END footer -->
		
	</div><!-- END .hidden-sidebar-inner -->	

</div><!-- END .hidden-sidebar -->