<?php
/**
 *The template for displaying posts in the Link post format.
 *
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

//BG
$custom_background  = get_post_meta( $post->ID, '_bean_custom_background', true );

// ADD CLASS IF NO FEATURED IMAGE
if (!has_post_thumbnail()) { 
  	$extra_class = 'no-feat'; 	
} else {
	$extra_class = ''; 	
}

// LINK URL VIA POST META
$link = get_post_meta($post->ID, '_bean_link_url', true);
?>

<section id="post-<?php the_ID(); ?>" <?php post_class($extra_class); ?>>	        
	
	<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
		<div class="entry-content-media">
			<div class="post-thumb">
				<?php
				if( is_singular() ) 
					{ the_post_thumbnail('post-feat'); }			
				else { ?><a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-feat'); ?></a>	
					<?php 
				} ?>
			</div><!-- END .post-thumb -->
		</div><!-- END .entry-content-media -->
	<?php } //END if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) ?>

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
			
				<p><?php _e( 'URL: ', 'bean' ); ?><a target="blank" href="<?php echo esc_url($link); ?>" target="_blank"><?php echo esc_url($link); ?> &rarr;</a><br /><br /></p>
				
				<?php if( is_singular() ) { the_content(); } else { the_excerpt(); } // DISPLAY EXCERPT ON BLOGROLL & FULL CONTENT ON SINGLE POST ?>
			</article><!-- END .entry-content -->

			<?php if( !is_singular() ) { get_template_part( 'content', 'post-meta' ); } // IF NOT SINGLE ?>

	 	</div><!-- END .eight.columns.centered.mobile-four -->	    
	</div><!-- END .row -->  	

</section><!-- END #post-<?php the_ID(); ?> -->