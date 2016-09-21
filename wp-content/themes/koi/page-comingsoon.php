<?php
/**
 * Template Name: Coming Soon
 * The template for displaying the coming soon template.
 *
 * 
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

get_header();

// VARIABLES FROM THEME CUSTOMIZER
$years = get_theme_mod('comingsoon_year');
$months = get_theme_mod('comingsoon_month');
$days = get_theme_mod('comingsoon_day');

//VARIABLE DEFAULTS
if( !$years )   { $years = '2014'; }
if( !$months )  { $months = '01';  }
if( !$days ) 	{ $days = '01';    }
?>

<div id="primary-container" class="animated BeanFadeIn">

	<div class="row">
			
		<div class="eight columns centered mobile-four">	
		
			<?php //IF PAGE TITLE OPTION IN META IS CHECKED
			$page_title = get_post_meta($post->ID, '_bean_page_title', true); 
			if ( $page_title == 'on' ) { ?><h1 class="entry-title"><?php the_title(); ?></h1>
			<?php }?>
			
			<div class="entry-content">
			
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>
				
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bean' ) . '</span>', 'after' => '</div>' ) ); ?>
				
			</div><!-- END .entry-content -->
		
		</div><!-- END .eight.columns.centered.mobile-four -->
			
		<div class="bean-coming-soon" data-years="<?php echo $years ?>" data-months="<?php echo $months ?>" data-days="<?php echo $days ?>" data-hours="00" data-minutes="00" data-seconds="00">

			<div class="three columns mobile-two animated BeanFadeIn days">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text"><?php _e( 'Days', 'bean' ); ?></div></h6>
					</div><!-- END .animated BeanFadeIn -->
				</div><!-- END .count-inner -->	
			</div><!-- END .days -->

			<div class="three columns mobile-two animated BeanFadeIn hours">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text"><?php _e( 'Hours', 'bean' ); ?></div></h6>
					</div><!-- END .animated BeanFadeIn -->		
				</div><!-- END .count-inner -->		
			</div><!-- END .hours -->	

			<div class="three columns mobile-two animated BeanFadeIn minutes">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text"><?php _e( 'Minutes', 'bean' ); ?></div></h6>
					</div><!-- END .animated BeanFadeIn -->
				</div><!-- END .count-inner -->		
			</div><!-- END .minutes -->
				
			<div class="three columns mobile-two animated BeanFadeIn seconds">
				<div class="count-inner">
					<div class="animated BeanFadeIn">
						<div class="count"></div>
						<h6><div class="text"><?php _e( 'Seconds', 'bean' ); ?></div></h6>
					</div><!-- END .animated BeanFadeIn -->
				</div><!-- END .count-inner -->		
			</div><!-- END .seconds -->	
			
		</div><!-- END bean-coming-soon -->

	</div><!-- END .row -->	
	
</div><!-- END #primary-container -->	

<?php get_footer(); ?>