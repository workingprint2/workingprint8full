<?php 
/**
 * This file contains the database query counter module.
 *
 *
 * @package WordPress
 * @subpackage Bean Framework
 * @author ThemeBeans
 * @since Bean Framework 2.0
 */
 
//IF USER IS LOGGED IN, DISPLAY THE DEBUG BAR 
if ( is_user_logged_in() ) { ?>

<div id="bean-debug-queries">
	<?php echo ''. BEAN_THEME_NAME .' ran '. $wpdb->num_queries .' queries in '. timer_stop(0, 2) .' seconds.'; ?>
</div><!-- END #bean-debug-queries --> 
 
<?php } //END if ( is_user_logged_in() ) ?>