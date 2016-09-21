<?php
/**
 * The file is for displaying the blog post meta.
 * This has it's own content file because we call it among various post formats.
 * If you edit this file, its output will be edited on all post formats.
 *  
 *   
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */
 
 //READING TIME CALCULATIONS	
 $mycontent = $post->post_content; 
 $words = str_word_count(strip_tags($mycontent));
 $reading_time = floor($words / 100);
 
 //IF LESS THAN A MINUTE - DISPLAY 1 MINUTE
 if ($reading_time == 0 )  { $reading_time = '1'; } 
 ?>

<div class="entry-meta">
	<ul>
		<li><span><?php _e( 'By: ', 'bean' ); ?></span> <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></li>
		<li><span><?php _e( 'Posted: ', 'bean' ); ?></span> <?php the_time(get_option('date_format')); ?></li>			
		<li><span><?php _e( 'In: ', 'bean' ); ?></span> <?php the_category(', ');  ?></li>
		<?php 
		// DISPLAY TAGS			
		if( get_theme_mod( 'show_tags' ) == true && has_tag() && is_singular() ) 
		{
			_e( '<span>Tags: </span>', 'bean' );
			echo '<li class="tags">' . the_tags('', ', ', '') . '</li>';
		} ?>
		
		<li><span><?php _e( 'Time: ', 'bean' ); ?></span> <?php echo $reading_time; _e( ' Minute Read', 'bean' ); ?></li>
		
	</ul>
</div><!-- END .entry-meta -->
