<?php
/**
 * The template for displaying all single posts.
 *
 * 
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

get_header(); 

$twitter_profile = get_theme_mod( 'twitter_profile' );
?>

<div class="pagination animated BeanSlideInRight hide-for-small">	
	<?php 
	//DISPLAY PORTFOLIO PAGINATION FROM CUSTOMIZER
	if( get_theme_mod( 'show_pagination' ) == true ) { ?>	
		
		<span class="page-posts">
			<a href="<?php if( get_option( 'show_on_front' ) == 'page' ) echo get_permalink( get_option('page_for_posts' ) ); else echo home_url();?>" rel="home"></a>
		</span><!-- END .page-portfolio -->
		<span class="page-previous">
			<?php previous_post_link('%link', ''); ?>
		</span><!-- END .page-previous -->
		<span class="page-next">
			<?php next_post_link('%link', ''); ?>
		</span><!-- END .page-next -->
		
	<?php } //END if( get_theme_mod( 'portfolio_pagination' ) ?>

	<?php 
	//DISPLAY SOCIAL SHARING FROM CUSTOMIZER
	if( get_theme_mod( 'post_sharing' ) == true ) {
		get_template_part( 'content', 'post-sharing' ); //PULL CONTENT-POST-SHARING.PHP
	} //END if( get_theme_mod( 'portfolio_share' ) 
	?>
</div><!-- END .pagination.hide-for-small -->


<div id="primary-container" class="index-fullwidth"> 

	<?php 
	// THE LOOP
	if (have_posts()) : while (have_posts()) : the_post(); 
			
		$format = get_post_format(); 
		if( false === $format ) { $format = 'standard'; }
		if( $format == 'audio' || $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote' || $format == 'video') { }
		get_template_part( 'inc/post-formats/content', $format ); 	
		endwhile;
		?>
		
		<div class="row">
			<div class="eight columns centered mobile-four">
				<?php wp_link_pages(
				array(
					'before' => '<p><strong>'.__('Pages:', 'bean').'</strong> ', 
					'after' => '</p>', 
					'next_or_number' => 'number'));
				?>
			</div><!-- END .eight.columns.centered.mobile-four -->
		</div><!-- END .row -->	

		<?php
		if( bean_theme_supports( 'comments', 'posts' )) 
		{
			bean_comments_start();
			comments_template('', true);
			bean_comments_end();
		}
		
	endif; ?>
	
</div><!-- END #primary-container -->	

<script type="text/javascript">
	jQuery(window).load(function(){ 		
		if(jQuery().validate) { jQuery("#commentform").validate(); }		
		});
</script>
		
<?php get_footer(); ?>