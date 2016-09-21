<?php
/**
 * The file for displaying the uploaded branding.
 * Utilize the theme customizer for displaying either the text logo or uploaded logo.
 * By design the page-comingsoon.php and page-underconstruction.php templates do not display the home_url.
 *
 *  
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 ?>
 
<div class="logo">
	
	<?php 

	//WITH LOGO IMAGE AND NO LETTER
	if( get_theme_mod( 'img-upload-logo' ) AND get_theme_mod( 'letter_logo' ) == false ) { // CUSTOMIZER LOGO ?>  
	  	<a href="<?php echo home_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'img-upload-logo' )?>" class="logo-uploaded" alt="logo"/></a>
	<?php }
	
	//WITHOUT LOGO IMAGE AND NO LETTER
	elseif( !get_theme_mod( 'img-upload-logo' ) AND get_theme_mod( 'letter_logo' ) == false ) { // CUSTOMIZER LOGO ?>  
	  	<a href="<?php echo home_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>" rel="home"><h1 class="logo_text"><?php bloginfo( $name ); ?></h1></a>
	<?php }
	
	//LETTER
	else { ?>
		<div class="letter-logo">
			<a href="<?php echo home_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>" rel="home"><?php echo get_theme_mod( 'letter_logo_text' ); ?></a>
		</div>
	<?php } ?>

</div><!-- END .logo -->