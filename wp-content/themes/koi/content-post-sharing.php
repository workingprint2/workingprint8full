<?php
/**
 * The file is for displaying the post & portfolio sharing feature.
 *
 *  
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 
 //FEATURED IMAGE FOR PINTEREST SHARE
 $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
 
 //META
 $twitter_profile = get_theme_mod( 'twitter_profile' )
 ?>
 
 <span class="page-share">
 	<a href="#" class="social_popover" id="example1" data-placement="bottom" rel="popover"></a>
 </span><!-- END .page-portfolio -->
 
 <div id="popover_content_wrapper" style="display: none">
 	<ul>
 		<li><a href="http://twitter.com/share?text=<?php the_title(); ?> <?php if ($twitter_profile !=''){ echo 'via @'. $twitter_profile.' - '; } ?>" target="_blank" class="twitter"></a></li>
 		<li><a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); ?>&amp;p[summary]=&amp;p[url]=<?php the_permalink(); ?>&amp;&amp;p[images][0]=','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)" class="facebook"></a></li>
 		<li><a href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $feat_image; ?>&url=<?php the_permalink(); ?>&is_video=false&description=<?php the_title(); ?>" class="pinterest"></a></li>
 		<li><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="google"></a></li>
 	</ul>
 </div><!-- END #popover_content_wrapper -->