<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

//PLACEHOLDER IMAGE
$placeholder = BEAN_IMAGES_URL.'/placeholder.jpg';
$custom_background  = get_post_meta( $post->ID, '_bean_custom_background', true );

if ( $custom_background == 'on' && !has_post_thumbnail()) {
	$background_class = 'no-placeholder';
} else {
	$background_class = 'placeholder';	
}
 
//POST META
$quote = get_post_meta($post->ID, '_bean_quote', true);
$quote_source = get_post_meta($post->ID, '_bean_quote_source', true);
?>
 
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	        
	
	<div class="entry-content-media">
		<div class="post-thumb">
			<?php 
			if( is_singular() ) {
				// IF FEATURED IMAGE
				if (( function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { the_post_thumbnail('post-feat'); } 
				else { echo '<img src=" '. $placeholder.' "/>'; } ?>			
			<?php } else { // END is_singluar ?>	
				<a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
					<?php if (( function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { the_post_thumbnail('post-feat'); } 
					else { echo '<img src=" '. $placeholder.' "/>'; } ?>
				</a>	
			<?php } ?>
		</div><!-- END .post-thumb -->
		<blockquote>
			<?php echo stripslashes( esc_html($quote) ); ?>
			<div class="quote-source"><?php echo stripslashes( esc_html($quote_source) ); ?></div>
		</blockquote>
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