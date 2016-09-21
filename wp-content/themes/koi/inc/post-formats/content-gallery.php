<?php
/**
 * The template for displaying posts in the Gallery post format.
 *
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 
//POST META
$orderby = get_post_meta($post->ID, '_bean_post_randomize', true);
$orderby = ( $orderby == 'off' ) ? 'post__in' : 'rand';
?>
 
<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	        
	
	<div class="entry-content-media">
		<div class="post-thumb">
			<?php bean_gallery($post->ID, 'post-feat', 'slider' , $orderby , true); ?>
		</div><!-- END .post-thumb -->
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