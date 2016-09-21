<?php
/**
 * The file is for creating the portfolio post type meta. 
 * Meta output is defined on the portfolio single editor.
 * Corresponding meta functions are located in framework/metaboxes.php
 *
 *  
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 
add_action('add_meta_boxes', 'bean_metabox_portfolio');
function bean_metabox_portfolio(){

$prefix = '_bean_';




/*===================================================================*/
/*  PORTFOLIO META SETTINGS							   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'portfolio-meta',
	'title' =>  __('Portfolio Meta Settings', 'bean'),
	'description' => __('', 'bean'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name' =>  __('Portfolio Type:', 'bean'),
			'desc' => __('Select the portfolio type for this post.','bean'),
			'id' => $prefix.'portfolio_type',
			'type' => 'select',
			'std' => 'gallery',
			'options' => array(
				'gallery' =>'Gallery Portfolio', 
				'video' =>'Video Portfolio', 
				'audio' =>'Audio Portfolio'
			)
		),		
		array(  
			'name' => __('Portfolio Client:','bean'),
			'desc' => __('Display the client meta.','bean'),
			'id' => $prefix.'portfolio_client',
			'type' => 'text',
			'std' => ''
			),	
		array(  
			'name' => __('Portfolio Location:','bean'),
			'desc' => __('Display the location meta.','bean'),
			'id' => $prefix.'portfolio_location',
			'type' => 'text',
			'std' => ''
			),		
		array(  
			'name' => __('Portfolio URL:','bean'),
			'desc' => __('Insert a URL to link your post to. <br/> ex: http://www.themebeans.com','bean'),
			'id' => $prefix.'portfolio_url',
			'type' => 'text',
			'std' => ''
			),
		array(
			'name'     => __('Display Date:', 'bean'),
			'id' => $prefix.'portfolio_date',
			'type' => 'checkbox',
			'desc' => __('Can be modified in your Dashboard General Settings.', 'bean'),
			'std' => false 
			),	
		array(
			'name'     => __('Display Categories:', 'bean'),
			'id' => $prefix.'portfolio_cats',
			'type' => 'checkbox',
			'desc' => __('Select to display the portfolio categories.', 'bean'),
			'std' => false 
			),	
		array(
			'name'     => __('Display Tags:', 'bean'),
			'id' => $prefix.'portfolio_tags',
			'type' => 'checkbox',
			'desc' => __('Select to display the portfolio tags.', 'bean'),
			'std' => false 
			),		
		array(
			'name'     => __('Display Views:', 'bean'),
			'id' => $prefix.'portfolio_views',
			'type' => 'checkbox',
			'desc' => __('Select to display the view counter.', 'bean'),
			'std' => false 
			),					
	)
);
bean_add_meta_box( $meta_box );




/*===================================================================*/	
/*  GALLERY POST FORMAT SETTINGS						   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'bean-meta-box-portfolio-images',
	'title' => __('Gallery Post Format Settings', 'bean'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' =>  __('Gallery Layout:', 'bean'),
			'desc' => __('Choose which layout to display for this portfolio post.', 'bean'),
			'id' => $prefix.'gallery_layout',
			'type' => 'select',
			'std' => 'stacked',
			'options' => array(
				'stacked' =>'Stacked Images', 
				'slider' =>'Slideshow', 
				)
			),
		array( 
			'name' => 'Gallery Images:',
			'desc' => 'Upload images here for your gallery post. Once uploaded, drag & drop to reorder.',
			'id' => $prefix .'portfolio_upload_images',
			'type' => 'images',
			'std' => __('Browse & Upload', 'bean')
			),
		array(
			'name'     => __('Randomize Gallery:', 'bean'),
			'id' => $prefix.'portfolio_randomize',
			'type' => 'checkbox',
			'desc' => __('Randomize the gallery on page load.', 'bean'),
			'std' => false 
			),			
    )
);
bean_add_meta_box( $meta_box ); 




/*===================================================================*/
/*  AUDIO POST FORMAT SETTINGS						   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'bean-meta-box-portfolio-audio',
	'title' =>  __('Audio Post Format Settings', 'bean'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( 
		    'name' => __('MP3 File URL:','bean'),
			'desc' => __('','bean'),
			'id' => $prefix.'audio_mp3',
			'type' => 'file',
			'std' => ''
			),
		array( 
			'name' => __('Poster Image:', 'bean'),
			'desc' => __('The preview image for this audio track', 'bean'),
			'id' => $prefix.'audio_poster_url',
			'type' => 'file',
			'std' => ''
			),
	)
);
bean_add_meta_box( $meta_box );
 
 
 
 
/*===================================================================*/
/*  VIDEO POST FORMAT SETTINGS						   			          							
/*===================================================================*/
$meta_box = array(
	'id' => 'bean-meta-box-portfolio-video',
	'title' => __('Video Post Format Settings', 'bean'),
	'page' => 'portfolio',
	'context' => 'normal',
	'priority' => 'high',	
	'fields' => array(	
		array( 
			'name' => __('M4V File URL:','bean'),
			'desc' => __('','bean'),
			'id' => $prefix . 'video_m4v',
			'type' => 'file',
			'std' => ''
			),
		array( 
			'name' => __('Poster Image:','bean'),
			'desc' => __('','bean'),
			'id' => $prefix . 'video_poster',
			'type' => 'file',
			'std' => ''
			),
		array(
			'name' => __('Embed Code:', 'bean'),
			'desc' => __('If you are not using self hosted video then you can include embeded code here.', 'bean'),
			'id' => $prefix . 'portfolio_embed_code',
			'type' => 'textarea',
			'std' => ''
			)
	),
	
);
bean_add_meta_box( $meta_box );
} // END function bean_metabox_portfolio()