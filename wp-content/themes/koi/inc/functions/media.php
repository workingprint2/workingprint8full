<?php
/**
 * This file contains the media functions for the theme (Gallery, Audio, Video).
 *
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */ 
 
/*===================================================================*/
/*  GALLERY FUNCTIONS		          							
/*===================================================================*/
if ( !function_exists( 'bean_gallery' ) ) 
{
	function bean_gallery($postid, $imagesize = '', $layout = '', $orderby = '', $single = false ) 
	{
		$thumb_ID = get_post_thumbnail_id( $postid ); 
	    $image_ids_raw = get_post_meta($postid, '_bean_image_ids', true);
	   
	    if( $image_ids_raw != '' ) 
	    {
	        $image_ids = explode(',', $image_ids_raw);
	        $post_parent = null;
	    } else {
	        $image_ids = '';
	        $post_parent = $postid;
	    }
	
	    // PULL THE IMAGE ATTACHMENTS
	    $args = array(
	    	'exclude' => $thumb_ID,
	        'include' => $image_ids,
	        'numberposts' => -1,
	        'orderby' => $orderby,
	        'order' => 'ASC',
	        'post_type' => 'attachment',
	        'post_parent' => $post_parent,
	        'post_mime_type' => 'image',
	        'post_status' => null
	    );
	    $attachments = get_posts($args); 
	    
	    //IF THE FUNCTION'S LAYOUT IS CALLING FOR THE SLIDER
	    if( $layout == 'slider' ) 
	    { 
		    //TRANSFER RANDO META FOR TRUE/FALSE SLIDE RANDOMIZE
		    if ( $orderby == 'rand') { 
		    	$orderby_slides = 'true'; 
		    } else { 
		    	$orderby_slides = 'false';
		    }
		    ?>
	  
			<script type="text/javascript">
				jQuery(document).ready(function($){
					jQuery('#slider-<?php echo esc_js($postid); ?>').flexslider({
						namespace: "bean-", 
						animation: "slide",
						slideshowSpeed: 5000, 
						slideshow: true, 
						animationLoop: true,
						animationSpeed: 750,
						randomize: <?php echo esc_js($orderby_slides); ?>, 
						directionNav: false,  
						smoothHeight: true, 
						controlNav: true,
						touch: true, 
						pauseOnHover: false,  
					 });
					 //jQuery('#slider-<?php echo $postid; ?>').css({ display : 'block' });
					 //jQuery('#slider-<?php echo $postid; ?>').addClass('loaded');		
				});
			</script>
			
			<div class="slider-wrapper">
				<div class="post-slider">
					<div id="slider-<?php echo $postid; ?>">
						<ul class="slides">
							<?php 
							if( !empty($attachments) ) 
							{
								$i = 0;
								foreach( $attachments as $attachment ) 
								{
									$src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
									$caption = $attachment->post_excerpt;
									$caption = ($caption) ? "<div class='bean-slide-caption'>$caption</div>" : '';
									$alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
									echo "<li>$caption<img height='$src[2]' src='$src[0]' alt='$alt'/></li>";
								}
							} // END if( !empty($attachments) )
							?>
						</ul><!-- END .slides -->
					</div><!-- END #slider-$postid -->
				</div><!-- END .post-slider -->
			</div><!-- END .slider-wrapper -->
		
		<?php } // END if( $layout == 'slider' ) 
		
		//IF THE FUNCTION'S LAYOUT IS CALLING FOR STACKED IMAGES
		if( $layout == 'stacked' ) 
		{ 
			if( !empty($attachments) ) 
			{
			    foreach( $attachments as $attachment ) 
			    {
			        $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
			        $caption = $attachment->post_excerpt;
			        $caption = ($caption) ? "<div class='bean-image-caption'>$caption</div>" : '';
			        $alt = ( !empty($attachment->post_content) ) ? $attachment->post_content : $attachment->post_title;
			        echo "<li class='stacked-image'>$caption<img height='$src[2]' width='$src[1]' src='$src[0]' alt='$alt' /></li>";
			    }
			} // END if( !empty($attachments) )
		
		} // END if( $layout == 'stacked' ) 
		
		if( $layout == 'lightbox' ) 
		{ 
			if( !empty($attachments) ) 
			{ ?>
				<li class="gallery-zoom animated BeanBounceIn">
					<ul class="popup-gallery">
					    <?php
					    foreach( $attachments as $attachment ) 
					    {
					        $src = wp_get_attachment_image_src( $attachment->ID, $imagesize );
					        echo "<li><a href='$src[0]' class='overlay-icon gallery-icon'></a></li>";
					    } ?>
			    	</ul><!-- END .popup-gallery -->
			    </li><!-- END .gallery-zoom -->
			<?php     
			} // END if( !empty($attachments) )
		
		} // END if( $layout == 'lightbox' ) 
		
	} // END function bean_gallery
	
} // END if ( !function_exists( 'bean_gallery' ) )	
    
  

  
/*===================================================================*/    							
/*  AUDIO POST FORMAT FUNCTION				      							
/*===================================================================*/
if ( !function_exists( 'bean_audio' ) ) 
{
	function bean_audio($postid)
	{
		//MP3 FROM POST/PORTFOLIO
		$mp3 = get_post_meta($postid, '_bean_audio_mp3', TRUE); ?>
		
		<script type="text/javascript">
			jQuery(document).ready(function(){
				if(jQuery().jPlayer) {
					jQuery('#jquery_jplayer_<?php echo $postid; ?>').jPlayer( { 
						ready : function () { 
								jQuery(this).jPlayer("setMedia", {
							    <?php if($mp3 != '') : ?>
								mp3: "<?php echo esc_js($mp3); ?>",
								<?php endif; ?>
								end: ""
							});
						},
						size: {
						    width: "100%",
						},
						swfPath: "<?php echo get_template_directory_uri(); ?>/assets/js",
						cssSelectorAncestor: "#jp_container_<?php echo $postid; ?>",
						supplied: "<?php if($mp3 != '') : ?>mp3, <?php endif; ?> all"
					});
				}
				jQuery("#jp_container_<?php echo $postid; ?> .jp-interface").css("display", "block");
			});
		</script>
			
		<div id="jp_container_<?php echo $postid; ?>" class="jp-audio fullwidth">
			<div id="jquery_jplayer_<?php echo $postid; ?>" class="jp-jplayer">
			</div><!-- END .jquery_jplayer_<?php echo $postid; ?> -->
			<div class="jp-interface" style="display: none;">
				<ul class="jp-controls">
					<li><a href="javascript:;" class="jp-play" tabindex="1" title="Play"><span><?php _e( 'Play', 'bean' ); ?></span></a></li>
					<li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause"><span><?php _e( 'Pause', 'bean' ); ?></span></a></li>
				</ul><!-- END .jp-controls -->
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar"></div>
					</div><!-- END .jp-seek-bar -->
				</div><!-- END .jp-progress -->
			</div><!-- END .jp-interface -->
		</div><!-- END #jp_container_<?php echo $postid; ?> -->
		
	<?php 
	} // END function bean_audio($postid)
	
} // END if ( !function_exists( 'bean_audio' ) ) 




/*===================================================================*/    							
/*  VIDEO POST FORMAT FUNCTION				      							
/*===================================================================*/
if ( !function_exists( 'bean_video' ) ) 
{
	function bean_video($postid) 
	{
		$m4v = get_post_meta($postid, '_bean_video_m4v', true);
		$poster = get_post_meta($postid, '_bean_video_poster', true);
		?>
	 
	 	<script type="text/javascript"> 
			jQuery(document).ready(function () { 
				jQuery('#jquery_jplayer_<?php echo $postid; ?>').jPlayer( { ready : function () { 
					jQuery(this).jPlayer(
						'setMedia', { 
								<?php if($m4v != '') : ?>
									m4v: "<?php echo $m4v; ?>",
								<?php endif; ?>
								<?php if ($poster != '') : ?>
									poster: "<?php echo $poster; ?>"
								<?php endif; ?>
								} 
							); 
						}, 
						preload: 'auto',
						cssSelectorAncestor : '#jp_container_<?php echo $postid; ?>', 
						swfPath: "<?php echo get_template_directory_uri(); ?>/assets/js",
						supplied: "<?php if($m4v != '') : ?>m4v, <?php endif; ?> all",
						size : { 
							width : '100%', 
							height: "100%"
						},
						wmode : 'window' 
					} 
				);
				jQuery("#jp_container_<?php echo $postid; ?> .jp-interface").css("display", "block");
			});	
		</script>
				
		<div id="jp_container_<?php echo $postid; ?>" class="jp-video fullwidth">
			<div class="jp-type-single">
				<div id="jquery_jplayer_<?php echo $postid; ?>" class="jp-jplayer">
				</div><!-- END .jquery_jplayer_<?php echo $postid; ?> -->
				<div class="jp-interface" style="display: none;">
					<ul class="jp-controls">
						<li><a href="javascript:;" class="jp-play" tabindex="1" title="Play"><span><?php _e( 'Play', 'bean' ); ?></span></a></li>
						<li><a href="javascript:;" class="jp-pause" tabindex="1" title="Pause"><span><?php _e( 'Pause', 'bean' ); ?></span></a></li>
					</ul><!-- END .jp-controls -->
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div><!-- END .jp-seek-bar -->
					</div><!-- END .jp-progress -->
				</div><!-- END .jp-interface -->
			</div><!-- END .jp-type-single -->
		</div><!-- END #jp_container_<?php echo $postid; ?> -->
			
	<?php 
	} //END function bean_video($postid) 
	
} //END if ( !function_exists( 'bean_video' ) ) 	