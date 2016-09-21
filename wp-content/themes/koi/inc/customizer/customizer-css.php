<?php
/*===================================================================*/                						
/*  THEME CUSTOMIZER STYLES	                							
/*===================================================================*/
if ( !function_exists('Bean_Customize_Variables') ) {
	function Bean_Customize_Variables() {
	
	//VARIABLES
	$wrapper_background_color = get_theme_mod('wrapper_background_color', '#F7F7F7');
	$body_text_color = get_theme_mod('body_text_color', '#202125');
	$theme_accent_color = get_theme_mod('theme_accent_color', '#FF584C');
	$overlay_color = get_theme_mod('overlay_color', '#202125');
	$overlay_text_color = get_theme_mod('overlay_text_color', '#FFF');
	$sidebar_trigger_color = get_theme_mod('sidebar_trigger_color', '');
	$sidebar_trigger_text_color = get_theme_mod('sidebar_trigger_text_color', '');
	?>		
		
		
<style>
body, 
#theme-wrapper { background-color: <?php echo $wrapper_background_color; ?>;}

p,
body,  
a:hover,
.theme-tagline p a:hover { color: <?php echo $body_text_color; ?>; }

.bean-tabs .bean-tab,
.bean-toggle .target { color: <?php echo $body_text_color; ?>!important;}

a,
.cats,
blockquote,
.author-tag,
.entry-title a:hover,
.comment-meta a:hover,
.comment-author a:hover,
.entry-meta a:hover  { color:<?php echo $theme_accent_color; ?>; }

.logo h1:hover, #respond input[type="submit"], li.submit .button, .widget_bean_tweets .follow-link:hover { color: <?php echo $theme_accent_color; ?>!important; }

.btn, 
.button, 
.new-tag,
.tagcloud a,
button.button,
.letter-logo a,
div.jp-play-bar,
.btn[type="submit"],
input[type="button"], 
input[type="reset"], 
input[type="submit"],
.button[type="submit"],
div.jp-volume-bar-value,
.isotope-item .hover-off { background-color: <?php echo $theme_accent_color ?>; }

.bean-quote,
.featurearea_icon .icon { background-color: <?php echo $theme_accent_color; ?>!important; }

#isotope-container li a div.overlay h4,
#isotope-container li a div.overlay h4 span { color: <?php echo $overlay_text_color; ?>; }
#isotope-container li a div.overlay { background-color: <?php echo $overlay_color; ?>; }

<?php
//IF POST THUMB HOVER
if( get_theme_mod( 'post_thumb_hover' ) == true) { ?>
.post .entry-content-media .post-thumb { background-color: <?php echo $theme_accent_color ?>; }
a.hover-off:hover img,
.post .entry-content-media .post-thumb a:hover img { opacity: .2; }
<?php } 

//IF PORTFOLIO CSS FILTERS
$css_filter_style = get_theme_mod( 'portfolio_css_filter' );
if( $css_filter_style != '' ) {
    switch ( $css_filter_style ) {
        case 'none':
            // DO NOTHING
            break;
        case 'grayscale':
            echo '.isotope-item img{ -webkit-filter: grayscale(100%); }';
            break;
        case 'sepia':
        	echo '.isotope-item img { -webkit-filter: sepia(50%); }';
            break;
         case 'saturation':
         	echo '.isotope-item img { -webkit-filter: saturate(150%); }';
            break;      
    }
}

//CSS FOR CUSTOM CSS
echo get_theme_mod( 'custom_css', '' ); 

// STYLES FOR THE BEAN PRICING TABLE PLUGIN, IF ACTIVATED
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); if (is_plugin_active('bean-pricingtables/bean-pricingtables.php')) { ?>
.bean-pricing-table .pricing-column li span { color:<?php echo $theme_accent_color; ?>!important; }
#powerTip, .bean-pricing-table .pricing-highlighted { background-color:<?php echo $theme_accent_color; ?>!important; }
#powerTip:after { border-color:<?php echo $theme_accent_color; ?> transparent !important; }
<?php } // END is_plugin_active ?>

</style>	

<?php } add_action( 'wp_head', 'Bean_Customize_Variables', 1 );
}