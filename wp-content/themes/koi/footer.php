<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #theme-wrapper and gets the hidden sidebar.
 *
 *
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 ?>
 	
</div><!-- END #theme-wrapper -->

<?php 

bean_content_end();

get_template_part( 'content', 'hidden-sidebar' ); //GET KOI/CONTENT-HIDDEN-SIDEBAR.PHP

bean_body_end(); //PULLS DEBUG INFO 

wp_footer(); ?>

<!--<?php echo ''. BEAN_THEME_NAME .' WordPress Theme (ThemeBeans.com) with '. $wpdb->num_queries .' queries in '. timer_stop(0, 2) .' seconds'; ?>-->

</body>
</html>