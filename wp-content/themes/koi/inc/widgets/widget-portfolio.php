<?php
/**
 * Widget Name: Bean Portfolio Widget
 * Widget URI: http://themebeans.com
 * Description:  A widget that displays your portfolio menu.
 * Author: ThemeBeans
 * Author URI: http://themebeans.com
 *  
 *   
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_portfolio' );

// REGISTER WIDGET
function reg_bean_portfolio() {
	register_widget( 'Bean_Portfolio_Widget' );
}

// WIDGET CLASS
class Bean_Portfolio_Widget extends WP_Widget 
{



	
	/*===================================================================*/
	/*	WIDGET SETUP
	/*===================================================================*/
	public function __construct() 
	{
		parent::__construct(
	 		'bean_portfolio', // BASE ID
			'Portfolio Menu (ThemeBeans)', // NAME
			array( 'description' => __( 'A custom widget that displays your portfolio as a menu', 'bean' ), )
		);
	}
		
		
		
		
	/*===================================================================*/
	/*	DISPLAY WIDGET
	/*===================================================================*/
	function widget( $args, $instance ) 
	{
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );
	
		// WIDGET VARIABLES
		$postcount = $instance['postcount'];
		$loop = $instance['loop'];
		$display_thumbs = $instance['display_thumbs'];
		
		// BEFORE WIDGET
		echo $before_widget;
		?> 
			
		<?php if ( $title ) echo $before_title . $title . $after_title; ?>
		
		<ul>
		<?php
		//SELECT VARIABLE
		if( $loop != '' ) {
		    switch ( $loop ) {
		        case 'Most Recent': 
		        	$orderby = 'date';
		        	$meta_key = ''; 
		        	break;
		        case 'Random': 
		        	$orderby = 'rand';
		        	$meta_key = ''; 
		       		break;
				case 'Most Views':
					$orderby = 'meta_value_num'; 
					$meta_key = 'post_views_count'; 
					break;
			}
		}
			
		$args = array(
		'post_type' 	=> 'portfolio',
		'order' 		=> 'DSC',
		'orderby'       => $orderby,
		'meta_key'      => $meta_key,
		'posts_per_page'=> $postcount,
		); 
		query_posts($args); if ( have_posts() ) : while ( have_posts() ) : the_post();
		
		?>
		
			<li>
				<a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>">
					
					<?php if($display_thumbs != '') { ?>
						<span class="mini-thumb"><?php the_post_thumbnail('portfolio-mini-thumb'); ?></span>
					<?php } ?>
					
					<?php echo get_the_title(); ?>
				</a>
			</li>
			
			<?php endwhile; endif; ?>
			
		</ul>
		
		<?php
		// AFTER WIDGET
		echo $after_widget;
	}
	
	
	
	
	/*===================================================================*/
	/*	UPDATE WIDGET
	/*===================================================================*/
	function update( $new_instance, $old_instance ) 
	{
		$instance = $old_instance;
		
		// STRIP TAGS TO REMOVE HTML - IMPORTANT FOR TEXT IMPUTS
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['loop'] = $new_instance['loop'];
		$instance['postcount'] = $new_instance['postcount'];
		$instance['display_thumbs'] = strip_tags( $new_instance['display_thumbs'] );
	
		return $instance;
	}
		
	
	
		
	/*===================================================================*/
	/*	WIDGET SETTINGS (FRONT END PANEL)
	/*===================================================================*/ 
	function form( $instance ) 
	{
		// WIDGET DEFAULTS
		$defaults = array(
			'title' => 'Work.',
			'postcount' => '-1',
			'loop' => 'Most Recent',
			'display_thumbs' => true
			);
			
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
		<?php
		//WIDGET NOTIFICATION WHEN PLUGIN IS NOT INSTALLED 
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if (!is_plugin_active('bean-portfolios/bean-portfolios.php')) { ?>
			<div class="bean-widget-notification">
				<p><?php _e('Please download and install the <b>Bean Portfolios Plugin</b> (free) to display this widget.', 'bean') ?><br /><br />
				<a href="<?php echo BEAN_PORTFOLIO_PLUGIN_URL; ?>" target="_blank" ><?php _e('Free Download &rarr;', 'bean') ?></a></p>
			</div>
		<?php } // END is_plugin_active ?>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Number of Posts: (-1 for Infinite)', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
		</p>
		
		
		<p>
		<?php if ($instance['display_thumbs']){ ?>
		<input type="checkbox" id="<?php echo $this->get_field_id( 'display_thumbs' ); ?>" name="<?php echo $this->get_field_name( 'display_thumbs' ); ?>" checked="checked" />
		<?php } else { ?>
		<input type="checkbox" id="<?php echo $this->get_field_id( 'display_thumbs' ); ?>" name="<?php echo $this->get_field_name( 'display_thumbs' ); ?>"  />
		<?php } ?>
		
		<label for="<?php echo $this->get_field_id( 'display_thumbs' ); ?>"><?php _e('&nbsp;Display Mini Thumbs', 'bean') ?></label>
		</p>
		
		<p>
		<label for="<?php echo $this->get_field_id( 'loop' ); ?>"><?php _e('Portfolio Loop:', 'bean') ?></label>
		<select id="<?php echo $this->get_field_id( 'loop' ); ?>" name="<?php echo $this->get_field_name( 'loop' ); ?>" class="widefat">
			<option <?php if ( 'Most Recent' == $instance['loop'] ) echo 'selected="selected"'; ?>>Most Recent</option>
			<option <?php if ( 'Most Views' == $instance['loop'] ) echo 'selected="selected"'; ?>>Most Views</option>
			<option <?php if ( 'Random' == $instance['loop'] ) echo 'selected="selected"'; ?>>Random</option>	
		</select>
		</p>
	

	<?php
	} // END FORM

} // END CLASS
?>