<?php
/**
 * This is the theme's functions.php file. 
 * This file loads the theme's constants.
 * Please be cautious when editing this file, errors here cause big problems.
 *
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 *
 *
 * CONTENTS:  
 * 1. THEME FEATURES FILTER	
 * 2. LOAD FRAMEWORK
 * 3. GENERAL THEME SETUP
 * 4. ADD OUR SCRIPTS
 * 5. ADD OUR META SCRIPTS 
 * 6. THEME SPECIFIC FUNCTIONS
 */
 
/*===================================================================*/
/* 1. THEME FEATURES FILTER	
/*===================================================================*/
do_action( 'bean_pre' );

//FEATURE SETUP
function bean_feature_setup() 
{
	$args = array(
		'primary' => array(
			'adminstyles'		=> true, 
			'customizer'		=> true, 
			'meta'				=> true,
			'menu'				=> true,
			'responsive' 		=> true,
			'seo'		 		=> true,		 
			'widgets'			=> true, 
			'widgetareas'		=> true, 
			),
		'plugins' => array(
			'notice'			=> true,
			'portfolio'			=> true,
			'shortcodes'		=> true,
			'twitter'			=> true,
			'instagram'			=> true,
			'social'			=> true,
			'pricingtables'	    => true,
			'utilities'	  		=> false, //NOT RELEASED
			'modals'	  		=> false, //NOT RELEASED
			),	
		'comments' => array(
			'pages'				=> false,
			'posts'				=> true,
			),
		'debug' => array(
			'footer'			=> false,
			'queries'			=> false,
			),	
	);
	
	return apply_filters( 'bean_theme_config_args', $args );
}

add_action('bean_init', 'bean_feature_setup');
 
//FEATURE SETUP RETURN
function bean_theme_supports( $group, $feature ) 
{
	$setup = bean_feature_setup();
	if( isset( $setup[$group][$feature] ) && $setup[$group][$feature] )
		return true;
	else
		return false;
}




/*===================================================================*/
/* 2. LOAD FRAMEWORK
/*===================================================================*/
function bean_load_framework() 
{
	do_action( 'bean_pre_framework' );
	
	// FRAMEWORK FUNCTIONS
	$tempdir = get_template_directory();
	require_once($tempdir .'/framework/functions/bean-admin-init.php');
	require_once($tempdir .'/inc/functions/init.php');
	
	// THEME CUSTOMIZER
	if( bean_theme_supports( 'primary', 'customizer' )) 
	{
		require( BEAN_CUSTOMIZER_DIR . '/customizer.php' );
		require( BEAN_CUSTOMIZER_DIR . '/customizer-css.php' );
	}  
		
} //END function bean_load_framework()   

add_action( 'bean_init', 'bean_load_framework' );

/* RUN THE BEAN_INIT HOOK */
do_action( 'bean_init' );

/* RUN THE BEAN_SETUP HOOK */
do_action( 'bean_setup' );




/*===================================================================*/
/* 3. GENERAL THEME SETUP							   			          							
/*===================================================================*/
if ( !function_exists( 'bean_theme_setup' ) ) 
{
	function bean_theme_setup() 
	{
		// MENUS 
		register_nav_menus( array(
			'primary-menu' => __( 'Primary Navigation', 'bean' ),
			'mobile-menu'  => __( 'Mobile Navigation', 'bean' )
		));
		
		// TRANSLATION
		load_theme_textdomain( 'bean', get_template_directory() . '/inc/languages' );
	
		// THUMBNAILS
		add_theme_support('post-thumbnails');
		set_post_thumbnail_size( 140, 140 );
		add_image_size( 'post-feat', 9999, 9999 );
		add_image_size( 'portfolio-feat', 800, 600, true );
		add_image_size( 'portfolio-mini-thumb', 20, 20, true );
		
		// FEED LINKS
		add_theme_support( 'automatic-feed-links' );
		
		// POST FORMATS
		add_theme_support('post-formats', array('audio', 'gallery', 'link', 'quote', 'video'));
		
		// CONTENT WIDTH
		if ( ! isset( $content_width ) ) $content_width = 1280;
	}	 
}
add_action('after_setup_theme', 'bean_theme_setup');




/*===================================================================*/
/* 4. ADD OUR SCRIPTS							   			          							
/*===================================================================*/
if ( !function_exists( 'bean_enqueue_scripts') ) 
{
	function bean_enqueue_scripts() 
	{	
		// STYLESHEETS
	 	wp_enqueue_style('framework', get_stylesheet_directory_uri(). '/assets/css/framework.css', false,'1.0','all');
	 	wp_enqueue_style('main', get_stylesheet_directory_uri(). '/style.css', false, '1.0', 'all'); 
		wp_enqueue_style('mobile', get_stylesheet_directory_uri(). '/assets/css/mobile.css',false,'1.0','all'); 
		wp_enqueue_style('roboto', 'http://fonts.googleapis.com/css?family=Roboto:400,500,700' );
		
		
		// REGISTER SCRIPTS
		wp_register_script('validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', 'jquery', '1.9', true);
		wp_register_script('fitvids', get_template_directory_uri() . '/assets/js/jquery.fitvids.js', 'jquery', '1.0', TRUE);
		wp_register_script('custom', get_template_directory_uri() . '/assets/js/custom.js', 'jquery', '1.0', TRUE);
		wp_register_script('custom-libraries', get_template_directory_uri() . '/assets/js/custom-libraries.js', 'jquery', '1.0', TRUE);
		wp_register_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.js', 'jquery', '1.0', TRUE);
		wp_register_script('retina', get_template_directory_uri() . '/assets/js/retina.js', 'jquery', '1.0', TRUE);
		wp_register_script('hoverdir', get_template_directory_uri() . '/assets/js/hoverdir.js', 'jquery', '1.0', TRUE);
		wp_register_script('magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', 'jquery', '1.0', TRUE);
		wp_register_script('isotope', get_template_directory_uri() . '/assets/js/isotope.js', 'jquery', '1.0', TRUE);
		wp_register_script('bean-soon', get_template_directory_uri() . '/assets/js/bean-soon.js', 'jquery', '1.0', TRUE);
		
		
		// ENQUEUE SCRIPTS
		wp_enqueue_script('jquery');
		wp_enqueue_script('fitvids');
		wp_enqueue_script('modernizr');
		wp_enqueue_script('custom');
		wp_enqueue_script('custom-libraries');
		

		// CONDITIONALLY LOADED ENQUEUE SCRIPTS
		if( get_theme_mod( 'retina_option' ) == true) { 
			wp_enqueue_script('retina'); 
		}
		
		if ( is_page_template('page-comingsoon.php') ) {
			wp_enqueue_script('bean-soon'); 
		}
		
		if ( is_page_template('page-contact.php') || is_singular('post') ) {
			wp_enqueue_script('validation');
		}
		
		if ( is_singular('post') && comments_open() && get_option( 'thread_comments' ) ) { 
			wp_enqueue_script( 'comment-reply' );
		}
		
		if ( is_singular('portfolio') || is_page_template('page-portfolio.php') || is_page_template('page-portfolio-filter.php') || is_archive() ) { 
			wp_enqueue_script('isotope');
			
			if( get_theme_mod( 'portfolio_hoverdiv' ) == true) {
				wp_enqueue_script('hoverdir');
			}
			if( get_theme_mod( 'portfolio_lightbox' ) == true) { 
				wp_enqueue_script('magnific-popup'); 
			}
		}
		
	} //END function bean_enqueue_scripts()
	
	add_action( 'wp_enqueue_scripts', 'bean_enqueue_scripts');
	
} //END if ( !function_exists( 'bean_enqueue_scripts') )








/*===================================================================*/
/*                    												  
/* THEME SPECIFIC FUNCTIONS	         		  
/*                    												  
/*===================================================================*/

/*===================================================================*/             							
/*  LOOP BY VIEWS - VIEW COUNT FUNCTION 								               							
/*===================================================================*/
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return '0';
    }
    return $count;
}

function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}




/*===================================================================*/             							
/*  ONLY SEARCH POSTS 								               							
/*===================================================================*/
function bean_search_filter($query) 
{
	if ( !$query->is_admin && $query->is_search) 
		{
			$query->set('post_type', array('post', 'page') );
		}
	return $query;
}
add_filter( 'pre_get_posts', 'bean_search_filter' );




/*===================================================================*/
/*  PORTFOLIO LIGHTBOX			          							
/*===================================================================*/
if ( !function_exists('bean_portfolio_lightbox') ) 
{
    function bean_portfolio_lightbox() 
    {
	   	if( get_theme_mod( 'portfolio_lightbox' ) == true) {
		?>	
    	<script type="text/javascript">
    	jQuery(document).ready(function($) {
	    	$('.popup-gallery').each(function() {
	    	    $(this).magnificPopup({
	    	        delegate: 'a',
	    	        midClick: true,
	    	        removalDelay: 600,
	    	        showCloseBtn: false,
	    	        type: 'image',
	    	        gallery: {
	    				enabled: true,
	    				navigateByImgClick: true,
	    				preload: [0,1]
	    			},
	    			callbacks: {
	    			  beforeClose: function() { this.content.addClass('bounceOutUp'); this.content.addClass('animated'); }, 
	    			  close: function() { this.content.removeClass('bounceOutUp'); this.content.addClass('animated'); }
	    			},
	    	    });
	    	});
    	}); 
    	</script>
    	<?php
   		} //END if get_theme_mod( 'portfolio_lightbox' )    
    }
}
add_action('wp_footer', 'bean_portfolio_lightbox');




/*===================================================================*/
/*  PORTFOLIO HOVEDIV (SLIDING)			          							
/*===================================================================*/
if ( !function_exists('bean_portfolio_hoverdiv') ) 
{
    function bean_portfolio_hoverdiv() 
    {
	   	if( get_theme_mod( 'portfolio_hoverdiv' ) == true) {
	   	
		   	if ( is_singular('portfolio') || is_page_template('page-portfolio.php') || is_page_template('page-portfolio-filter.php') || is_archive() ) 
		   	{ ?>	
		    	<script type="text/javascript">
		    	
		    	jQuery(document).ready(function($) {
		    	
		    		//HOVERDIV ONLY NORMAL SCREENS
		    		(function($) {
		    		    var $window = $(window),
		    		        $html = $('body');
		    		    function resize() {
		    		        if ($window.width() > 768) {
		    		            return $html.addClass('hoverdiv-active');
		    		        }
		    		        $html.removeClass('hoverdiv-active');
		    		        $html.addClass('no-hoverdiv-active');
		    		    }
		    		    $window
		    		        .resize(resize)
		    		        .trigger('resize');
		    		})(jQuery);
		    		
		    		//HOVERDIV
		    		$(window).bind("load", function() {
		    		   $(' .hoverdiv-active #isotope-container > li ').each( function() { $(this).hoverdir(); } );
		    		});
		    	}); 
		    	</script>
	    	<?php
	   		} // END is_singular('portfolio') etc
	   
	   	} //END if get_theme_mod( 'portfolio_hoverdiv' )    
    }
}
add_action('wp_footer', 'bean_portfolio_hoverdiv');




/*===================================================================*/                							
/*  CUSTOM EXCERPT LENGTH					                							
/*===================================================================*/
function custom_excerpt_length( $length ) 
{
	// GET VALUE FROM CUSTOMIZER
	$excerpt_length = get_theme_mod( 'post_excerpt','25');
	
	return $excerpt_length;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more($more) 
{
	global $post;
	return '&nbsp;<a class="moretag" href="'. get_permalink($post->ID) . '">...</a>';
	//return '<a href="'. get_permalink($post->ID) . '"> Read More</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');




/*===================================================================*/
/*  POST CUSTOM BACKGROUND STYLES			          							
/*===================================================================*/
if ( !function_exists('bean_background_styles') ) 
{
    function bean_background_styles() 
    {
    //ONLY OUTPUT THE CSS WHERE ITS NEEDED
    if ( is_singular('post') OR is_home() OR is_search() OR is_archive() ) {
    ?>
		<style>
		   	<?php
		    $posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'post') );
			foreach( $posts as $post ) 
			{
			    $postid = $post->ID;
			    $custom_background  = get_post_meta( $postid, '_bean_custom_background', true );
				$featimage_opacity  = get_post_meta( $postid, '_bean_featimage_opacity', true );
				$post_backgroundcolor  = get_post_meta( $postid, '_bean_post_backgroundcolor', true );

				if ( $custom_background == 'on' ) {
if ( $featimage_opacity == 'on' ) { ?>
#post-<?php echo $postid ?> .entry-content-media img { opacity: .2; }
<?php }
if (!empty($post_backgroundcolor)) { ?>
#post-<?php echo $postid ?>.post .entry-content-media .post-thumb { background-color: <?php echo $post_backgroundcolor; ?>!important; }
<?php }  	
				} //END if ( $custom_background == 'on' )
			} //END foreach( $posts as $post ) ?>
		</style>
	
	    <?php
	    } //END if ( is_singular('post') OR is_home() )
	} //END bean_background_styles() 
} //END if ( !function_exists('bean_background_styles') ) 
add_action('wp_head', 'bean_background_styles');




/*===================================================================*/             				
/*  CUSTOM COMMENT OUTPUT
/*===================================================================*/
if ( !function_exists( 'bean_comment' ) ) 
{
	function bean_comment($comment, $args, $depth) 
	{
	    $isByAuthor = false;
	
	    if($comment->comment_author_email == get_the_author_meta('email')) {
	        $isByAuthor = true;
	    }
	
	    $GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	
			<div id="comment-<?php comment_ID(); ?>">
				
				<div class="row">
					
					<div class="four columns mobile-four">
						<div class="comment-author vcard">
							<?php printf(__('<cite class="fn">%s</cite> ', 'bean'), get_comment_author_link()) ?> <?php if($isByAuthor) { ?><span class="author-tag"><?php _e('(Author)', 'bean') ?></span><?php } ?>
						</div><!-- END .comment-author.vcard --> 
					
						<div class="comment-meta commentmetadata">
							<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s', 'bean'), get_comment_date()) ?></a> &middot; <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
						</div><!-- END .comment-meta.commentmetadata -->
					</div><!-- END .four.columns -->  
					
					<div class="eight columns mobile-four">
						<div class="comment-body">
							<?php if ($comment->comment_approved == '0') : ?>
								<em class="moderation"><?php _e('Your comment is awaiting moderation.', 'bean') ?></em><br />
							<?php endif; ?>
						<?php comment_text() ?><?php edit_comment_link(__('[Edit]', 'bean'),'','') ?>
						</div><!-- END .comment-body --> 
					</div><!-- END .eight.columns -->
				
				</div><!-- END .row -->
			
			</div><!-- END #comment-<?php comment_ID(); ?> -->
	
	<?php
	} //END function bean_comment($comment, $args, $depth) 
} //END if ( !function_exists( 'bean_comment' ) )




/*===================================================================*/             				
/*  CUSTOM PING OUTPUT
/*===================================================================*/
if ( !function_exists( 'bean_ping' ) ) 
{
	function bean_ping($comment, $args, $depth) 
	{
	    $GLOBALS['comment'] = $comment; ?>
	    
		<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
		
		<?php 
	} //END //function bean_ping($comment, $args, $depth)
}//END if ( !function_exists( 'bean_ping' ) )




/*===================================================================*/
/*	COMMENTS FORM
/*===================================================================*/
function bean_custom_form_filters( $args = array(), $post_id = null ) 
{
	global $id;
	
	if ( null === $post_id )
		$post_id = $id;
	else
		$id = $post_id;

	$commenter = wp_get_current_commenter();
	$user = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$fields =  array(
		'author' => '
			<div class="comment-form-author clearfix">
			<label for="author">' . __( 'Name:', 'bean' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label> 
			<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' required/>
			</div>',
			
		'email'  => '
			<div class="comment-form-email clearfix">
			<label for="email">' . __( 'Email:', 'bean' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label>
			<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' required/>
			</div>',
			
		'url'    => '
			<div class="comment-form-url clearfix">
			<label for="url">' . __( 'Website:', 'bean') . '</label>
			<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30"/>
			
			</div>',			
	
	);
	 
	$defaults = array(
		'fields'               => apply_filters( 'comment_form_default_fields', $fields ),
		'comment_field'        => '<label for="comment">' . __( 'Comment:', 'bean' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required></textarea>','',
		'must_log_in'          => '<p class="must-log-in">' . sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'bean' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'logged_in_as'         => '<p class="logged-in-as">' . sprintf( __( 'Currently logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Logout</a>.', 'bean' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ) ) ) ) . '</p>',
		'comment_notes_before' => null,
		'comment_notes_after'  => null,
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'title_reply'          => sprintf( __( 'Leave a Comment.', 'bean' )), 
		'title_reply_to'       => __( 'Leave a Reply to %s', 'bean' ),
		'cancel_reply_link'    => __( 'Cancel', 'bean' ),
		'label_submit'         => __( 'Submit Comment', 'bean' ),
	);
		
	return $defaults;
}
add_filter( 'comment_form_defaults', 'bean_custom_form_filters' );