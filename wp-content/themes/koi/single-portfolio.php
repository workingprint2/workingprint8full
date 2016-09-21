<?php
/**
 * The template for displaying the portfolio singular page
 *
 * 
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

get_header();

//VIEW COUNTER
setPostViews(get_the_ID());

//SETTING UP META
$portfolio_type = get_post_meta($post->ID, '_bean_portfolio_type', true); 
$portfolio_date = get_post_meta($post->ID, '_bean_portfolio_date', true); 
$portfolio_url = get_post_meta($post->ID, '_bean_portfolio_url', true); 
$portfolio_views = get_post_meta($post->ID, '_bean_portfolio_views', true);
$portfolio_client = get_post_meta($post->ID, '_bean_portfolio_client', true); 
$portfolio_cats = get_post_meta($post->ID, '_bean_portfolio_cats', true); 
$portfolio_tags = get_post_meta($post->ID, '_bean_portfolio_tags', true); 
$portfolio_location = get_post_meta($post->ID, '_bean_portfolio_location', true); 
$gallery_layout = get_post_meta($post->ID, '_bean_gallery_layout', true);
?>

<div class="pagination animated BeanSlideInRight hide-for-small">	
	<?php 
	//DISPLAY PORTFOLIO PAGINATION FROM CUSTOMIZER
	if( get_theme_mod( 'portfolio_pagination' ) == true ) { 
		//PULL PORTFOLIO PAGE FROM CUSTOMIZER SELECT
		$portfolio_page = get_theme_mod('portfolio_page_selector'); 
		?>	
		
		<span class="page-portfolio">
			<a href="<?php echo get_page_link($portfolio_page); ?>" rel="home"></a>
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
	if( get_theme_mod( 'portfolio_sharing' ) == true ) {
		get_template_part( 'content', 'post-sharing' ); //PULL CONTENT-POST-SHARING.PHP
	} //END if( get_theme_mod( 'portfolio_share' ) 
	?>
	
</div><!-- END .pagination.hide-for-small -->

<div id="primary-container">
	
	<div id="content-container">
		
		<div class="row">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
				<div class="eight columns centered mobile-four">
					
					<div class="entry-content">
						
						<h1 class="entry-title"><?php the_title(''); ?></h1>
						
						<!--<?php //IF PORTFOLIO LIKES FEATURE IS SELECTED VIA THEME CUSTOMIZER, DISPLAY LIKES
						if( get_theme_mod( 'portfolio_likes' ) == true) { ?>
							<li><?php Bean_PrintLikes($post->ID); ?></li>
						<?php } //END if get_theme_mod( 'portfolio_likes' ) ?>-->
					
						<?php the_content(); // CONTENT  ?>
						
					</div><!-- END .entry-content-->	
					
					<?php if ( !post_password_required() ) { // START PASSWORD PROTECTED MEDIA ?>
					
					<div class="entry-meta">
						
						<ul class="portfolio-meta-list">
							
							<?php if ($portfolio_date == 'on') { ?> 
								<li><span><?php _e( 'Date: ', 'bean' ); ?></span> <?php the_time(get_option('date_format')); ?></li>
							<?php } ?>
							
							<?php if ($portfolio_client) { // DISPLAY CLIENT ?>
								<li>
									<span><?php _e( 'For:', 'bean' ); ?></span>
									<?php if ($portfolio_url) { // DISPLAY PORTFOLIO URL ?>
										<a href="<?php echo $portfolio_url; ?>" target="blank"><?php echo $portfolio_client;  ?></a>
									<?php } else { echo $portfolio_client; } // IF NO URL ?> 
								</li>
							<?php } ?>
							
							<?php if ($portfolio_location) { // DISPLAY LOCATION ?>
								<li><span><?php _e( 'Location: ', 'bean' ); ?></span> <?php echo $portfolio_location;  ?></li>
							<?php } ?>
							
							<?php if ($portfolio_views == 'on') { // DISPLAY VIEWS ?>	
								<li><span><?php _e( 'Views:&nbsp;', 'bean' ); ?></span><?php echo getPostViews(get_the_ID()); ?></li>
							<?php } ?>
							
							<?php if ($portfolio_cats == 'on') { // DISPLAY CATEGORY ?>	
								<li><span><?php _e( 'Type:&nbsp;', 'bean' ); ?></span><?php the_terms($post->ID, 'portfolio_category', '', ', ', ''); ?></li>
							<?php } ?>
							
							<?php if ($portfolio_tags== 'on') { // DISPLAY CATEGORY ?>	
								<li><span><?php _e( 'Tagged:&nbsp;', 'bean' ); ?></span><?php the_terms($post->ID, 'portfolio_tag', '', ', ', ''); ?></li>
							<?php } ?>
								
						</ul><!--END .portfolio-meta-list -->
				
					</div><!-- END .entry-meta-->
					
					<?php  } //END PASSWORD PROTECTED MEDIA ?>
					
					
				</div><!-- END .eight.columns.centered.mobile-four -->	
			
			<?php endwhile; endif; wp_reset_postdata(); ?>

		</div><!-- END .row -->	
		
	</div><!-- END #content-container -->	
	
	<div id="media-container">
	
		<div class="row">	
			
			<?php if ( !post_password_required() ) { // START PASSWORD PROTECTED MEDIA ?>
				<div class="twelve columns">			
					<div class="entry-content-media portfolio-<?php echo $portfolio_type; ?>">		
						<?php get_template_part( 'content', 'portfolio-media' ); //PULL CONTENT-PORTFOLIO-MEDIA.PHP ?>	
					</div><!-- END .entry-content-media -->
				</div><!-- END .twelve columns -->
			<?php  } //END PASSWORD PROTECTED MEDIA ?>	    
		
		</div><!-- END .row -->	
		
	</div><!-- END #media-container -->	
	
	<?php //END IF SHOW PORTFOLIO LOOP IN THEME CUSTOMIZER
		if( get_theme_mod( 'show_portfolio_loop_single' ) == true) {
			get_template_part( 'content', 'portfolio-more' ); //PULL CONTENT-PORTFOLIO-MORE.PHP
		}
	 ?>		

</div><!-- END #primary-container -->	

<?php get_footer(); ?>