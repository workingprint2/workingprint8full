<?php
/**
 * The Header template for our theme.
 *
 * Displays all of the <head> section that is pulled on every page.
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 ?>
<!DOCTYPE html>
<!-- BEGIN html -->
<html <?php language_attributes(); ?>>
<!-- DESIGN & CODE BY THEMEBEANS OF WWW.THEMEBEANS.COM -->
<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php bean_meta_head(); ?>
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--[if !IE]><!--><script>if (/*@cc_on!@*/false) { document.documentElement.className+=' lt-ie10'; }</script><!--<![endif]--> 
	
	<?php echo get_theme_mod( 'google_analytics', '' ); ?>
	
	<?php bean_head(); wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
	<?php bean_body_start(); ?>
	
	<div id="theme-wrapper">
		
		<?php if ( !is_page_template('page-comingsoon.php') && !is_page_template('page-underconstruction.php')) { ?>
			
			<?php bean_header_start(); ?>
			
			<header>
				<nav id="mobile-nav" class="show-for-small">
					<?php if ( function_exists('wp_nav_menu') ) {
						wp_nav_menu( array(
							'theme_location' => 'mobile-menu'
						));
					} ?>
					
					<?php if( is_singular('post') || is_singular('portfolio') ) { // IF SINGLE ?>
					
						<div class="menu-pagination">
							<?php if ( is_singular('portfolio') ) { ?>
								<span class="anchor-header-nav portfolio">
									<a href="<?php echo get_page_link($portfolio_page); ?>" rel="home"></a>
								</span><!-- END .page-portfolio -->
							<?php } ?>
							<?php if ( is_singular('post') ) { ?>
								<span class="anchor-header-nav post">
									<a href="<?php if( get_option( 'show_on_front' ) == 'page' ) echo get_permalink( get_option('page_for_posts' ) ); else echo home_url();?>" rel="home"></a>
								</span><!-- END .page-portfolio -->
							<?php } ?>
							<span class="anchor-header-nav prev">
								<?php previous_post_link('%link', ''); ?>
							</span><!-- END .page-previous -->	
							<span class="anchor-header-nav next">
								<?php next_post_link('%link', ''); ?>
							</span><!-- END .page-next -->
						</div>
					
					<?php }?>
				</nav><!-- END #mobile-nav --> 	
				
				<div id="mobile-header" class="show-for-small">
					<div class="row">
						<?php get_template_part( 'content', 'logo' ); //PULL CONTENT-LOGO.PHP ?>
						
						<div class="site-description">
							<?php echo get_bloginfo ( 'description' ); ?>
						</div><!-- END .site-description -->
					</div><!-- END .row -->	
				</div><!-- END #mobile-header.show-for-small -->
				
				<?php 
				//CLASSES BASED ON IMAGE LOGO OR NOT
				if( get_theme_mod( 'img-upload-logo' ) OR get_theme_mod( 'letter_logo' ) == true ) { 
					$logo_class = 'uploaded-image'; 
				} else {
					$logo_class = 'text-logo'; 
				} ?>
		
				<div class="branding-wrap <?php echo $logo_class; ?> hide-for-small">
					<?php get_template_part( 'content', 'logo' ); //PULL CONTENT-LOGO.PHP ?>
					<div class="site-description">
						<?php echo get_bloginfo ( 'description' ); ?>
					</div><!-- END .site-description -->	
				</div><!-- END .branding-wrap.hide-for-small -->
					
				<div id="header-container" class="hide-for-small">
					<span class="menu-icon"></span>
				</div><!-- END #header-container.hide-for-small -->	
			</header>
			
			<?php bean_header_end(); ?>
			
		<?php } // END !is_page_template  ?>	
		
		<?php bean_content_start(); ?>