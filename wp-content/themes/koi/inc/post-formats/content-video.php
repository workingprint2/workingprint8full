<?php
/**
 *The template for displaying posts in the Video post format.
 *
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 
//META 
$embed = get_post_meta($post->ID, '_bean_video_embed', true);
?>
 
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>        
	
	<div class="entry-content-media">
		<?php 
		if( !empty($embed) ) {
		echo "<div class='video-frame animated BeanFadeIn'>";
		    echo stripslashes(htmlspecialchars_decode($embed));
		echo "</div>";
		} else {
		bean_video($post->ID);
		} ?>
	 </div><!-- END .entry-content-media -->
	
	<div class="row">
		<div class="eight columns centered mobile-four">
				
			<h1 class="entry-title">
				<?php
				if( is_singular() ) { the_title(); } else { // IF SINGLE ?>
					<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bean' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>				
				<?php } ?>
			</h1><!-- END .entry-title -->
			
			<?php if( is_singular() ) { get_template_part( 'content', 'post-meta' ); } // IF SINGLE ?>
							
			<article class="entry-content">		
				<?php if( is_singular() ) { the_content(); } else { the_excerpt(); } // DISPLAY EXCERPT ON BLOGROLL & FULL CONTENT ON SINGLE POST ?>
			</article><!-- END .entry-content -->
	
			<?php if( !is_singular() ) { get_template_part( 'content', 'post-meta' ); } // IF NOT SINGLE ?>
	
	 	</div><!-- END .eight.columns.centered.mobile-four -->	    
	</div><!-- END .row -->								
	
</section><!-- END #post-<?php the_ID(); ?> -->