<?php
/**
 * Template Name: Contact
 * The template for displaying the contact template.
 *
 * 
 * @package WordPress
 * @subpackage Koi
 * @author ThemeBeans
 * @since Koi 1.0
 */

if(isset($_POST['submitted'])) {
		if(trim($_POST['contactName']) === '') {
			$hasError = true;
		} else {
			$name = trim($_POST['contactName']);
		}
		
		if(trim($_POST['mailSubject']) === '') {
			$hasError = true;
		} else {
			$sub = trim($_POST['mailSubject']);
		}
		
		if(trim($_POST['email']) === '')  {
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$hasError = true;
		} else {
			$email = trim($_POST['email']);
		}
			
		if(trim($_POST['comments']) === '') {
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['comments']));
			} else {
				$comments = trim($_POST['comments']);
			}
		}
			
		if(!isset($hasError)) {
		 	
		 	$site_name = get_bloginfo('name');
			$contactEmail = get_theme_mod( 'admin_custom_email');
			
			if (!isset($contactEmail) || ($contactEmail == '') ){
				$contactEmail = get_option('admin_email');
			}
			
			$subject = '['.$site_name.' Contact Form] '.$sub;
			$body = "Name: $name \n\nEmail: $email \n\nSubject: $sub \n\nMessage: $comments";
			$headers = 'From: '.$name.' <'.$email.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($contactEmail, $subject, $body, $headers);
			$emailSent = true;
		}
	
} 

get_header(); ?>

<div id="primary-container" class="page-template"> 

	<div class="row">
			
		<div class="eight columns centered mobile-four">
			
			<?php //IF PAGE TITLE OPTION IN META IS CHECKED
			$page_title = get_post_meta($post->ID, '_bean_page_title', true); 
			if ( $page_title == 'on' ) { ?><h1 class="entry-title"><?php the_title(); ?></h1>
			<?php }?>

			<div class="entry-content">
				
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>	
				
					<script type="text/javascript">
						jQuery(document).ready(function(){ jQuery("#BeanForm").validate({ errors: { contactName: '', email: { required: '', email: '' }, comments: '' } }); });
					</script>
					
					<?php if(isset($emailSent) && $emailSent == true ) { ?>
						
						<div class="contact-alert success">
						
							<?php _e('Awesome! Your message has been sent!', 'bean') ?>
							
						</div><!-- END .alert alert-success -->
				
					<?php } // END SUCCESS ALERT ?>
			
					<?php if(isset($hasError) || isset($captchaError)) { ?>
					
						<div class="contact-alert fail">
						
							<?php _e('Well now... an error occured. Please try again.', 'bean') ?>
						
						</div><!-- END .alert alert-success -->
						
					<?php } // END FAIL ALERT ?>
					
					<?php //IF HIDE REQUIRED IS NOT SELECTED VIA CUSTOMIZER
					$required = '';
					if( get_theme_mod( 'hide_required' ) == false ) { 
						$required = '<span class="required">*</span>'; 
					} ?>
					
					<form action="<?php the_permalink(); ?>" id="BeanForm" method="post">
						
						<ul class="bean-contactform">
							
							<li class="six name">
								<label for="contactName"><?php _e('Name', 'bean'); echo $required ?></label>
								<input type="text" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" class="required requiredField" />
							</li>
							
							<li class="six email">
								<label for="email"><?php _e('Email', 'bean'); echo $required ?></label>
								<input type="text" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" class="required requiredField email" />
							</li>
							
							<li class="twelve">
								<label for="mailSubject"><?php _e('Subject', 'bean'); echo $required ?></label>
								<input type="text" name="mailSubject" id="mailSubject" value="<?php if(isset($_POST['mailSubject'])) echo $_POST['mailSubject'];?>" class="required requiredField" />
							</li>
				
							<li class="textarea"><label for="commentsText"><?php _e('Message', 'bean'); echo $required ?></label>
								<textarea name="comments" id="commentsText" rows="20" cols="30" class="required requiredField"><?php if(isset($_POST['comments'])) { if(function_exists('stripslashes')) { echo stripslashes($_POST['comments']); } else { echo $_POST['comments']; } } ?></textarea>
								
							</li>
							
							<li class="submit">
								<input type="hidden" name="submitted" id="submitted" value="true" />
								<button type="submit" class="button"><?php echo get_theme_mod( 'contact_button_text', 'Send Message', 'bean' ); ?></button>
							</li>
					
						</ul>
	
					</form><!-- END #BeanForm -->
				
			</div><!-- END .entry-content -->
		
		</div><!-- END .nine.columns.centered.mobile-four -->

	</div><!-- END .row -->	
	
</div><!-- END #primary-container -->	

<?php get_footer(); ?>