<?php 
/*===================================================================*/                							
/*  LIVE PREVIEW EDITING (JS) - GRABS THE JS		                							
/*===================================================================*/
add_action( 'customize_preview_init', 'bean_customizer_live_preview' );
function bean_customizer_live_preview() {
	wp_enqueue_script('customizer', BEAN_CUSTOMIZER_URL . '/customizer.js', 'jquery', '1.0', true);
}




/*===================================================================*/                							
/*  THEME CUSTOMIZER FUNCTIONS		                							
/*===================================================================*/

//add_theme_support( 'custom-header' ); NO SUPPORT NECESSARY
//add_theme_support( 'custom-background' ); NO SUPPORT NECESSARY

add_action( 'customize_register', 'Bean_Customize_Register' );
function Bean_Customize_Register( $wp_customize ) 
{




/*===================================================================*/                							
/*  COLORS SECTION			                							
/*===================================================================*/
$wp_customize->add_section( 'custom_styles', array(
        'title' => __( 'Custom Styles', 'bean' ),
        'priority' => 32,
    )
);

	// BODY BG (OVERRIDE BC THEME WRAPPER NEEDS A BG)
	$wp_customize->add_setting( 'wrapper_background_color', array(
		'default' => '#F7F7F7',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wrapper_background_color', array(
		'label'   	=> __( 'Body', 'bean' ),
		'section' 	=> 'custom_styles',
		'settings'  => 'wrapper_background_color',
		'priority' 	=> 1
	) ) );
	
	// BODY TEXT COLOR
	$wp_customize->add_setting( 'body_text_color', array(
		'default' => '#202125',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'body_text_color', array(
		'label'   	=> __( 'Body Text', 'bean' ),
		'section' 	=> 'custom_styles',
		'settings'  => 'body_text_color',
		'priority' 	=> 2
	) ) );
	
	// THEME ACCENT COLOR
	$wp_customize->add_setting( 'theme_accent_color', array(
		'default' => '#FF584C',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'theme_accent_color', array(
		'label'   	=> __( 'Accent Color', 'bean' ),
		'section' 	=> 'custom_styles',
		'settings'  => 'theme_accent_color',
		'priority' 	=> 3
	) ) );
		
	// PORTFOLIO OVERLAY COLOR
	$wp_customize->add_setting( 'overlay_color', array(
		'default' => '#202125',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'overlay_color', array(
		'label'   	=> __( 'Portfolio Overlay', 'bean' ),
		'section' 	=> 'custom_styles',
		'settings'  => 'overlay_color',
		'priority' 	=> 6
	) ) );
	
	// PORTFOLIO OVERLAY TEXT COLOR
	$wp_customize->add_setting( 'overlay_text_color', array(
		'default' => '#FFF',
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'overlay_text_color', array(
		'label'   	=> __( 'Portfolio Overlay Text', 'bean' ),
		'section' 	=> 'custom_styles',
		'settings'  => 'overlay_text_color',
		'priority' 	=> 7
	) ) );


	

				
/*===================================================================*/         	
/*  THEME OPTIONS SECTION			                							
/*===================================================================*/	
$wp_customize->add_section( 'theme_options', array(
        'title' => __( 'Theme Settings', 'bean' ),
        'priority' => 34,
    )
);
	
	$wp_customize->add_setting( 'retina_option', array( 'default' => false ) );
	$wp_customize->add_control( 'retina_option',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Retina.js', 'bean' ),
	        'section' => 'theme_options',
	        'priority' => 1,
	    )
	);
	
	$wp_customize->add_setting( 'framework_seo', array( 'default' => true ) );
	$wp_customize->add_control( 'framework_seo',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Framework SEO', 'bean' ),
	        'section' => 'theme_options',
	        'priority' => 2,
	    )
	);
	
	$wp_customize->add_setting( 'letter_logo', array( 'default' => false ) );
	$wp_customize->add_control( 'letter_logo',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Simple Letter Logo', 'bean' ),
	        'section' => 'theme_options',
	        'priority' => 3,
	    )
	);
	
	$wp_customize->add_setting( 'letter_logo_text',array( 'default' => 'K',));
	$wp_customize->add_control( 'letter_logo_text',
	    array(
	        'label' => __( 'Logo Letter (If Enabled)', 'bean' ),
	        'section' => 'theme_options',
	        'type' => 'text',
	        'priority' => 4,
	    )
	);
	
	
	
	
/*===================================================================*/         	
/*  GENERAL SETTINGS SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( 'general_settings', array(
        'title' => __( 'General Settings', 'bean' ),
        'priority' => 35,
    )
);

	$wp_customize->add_setting( 'img-upload-login-logo', array() );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-login-logo', array(
		'label' 	=> __( 'Upload Login Logo', 'bean' ),
		'section' 	=> 'general_settings',
		'settings' 	=> 'img-upload-login-logo',
		'priority' 	=> 1
	) ) );
	
	$wp_customize->add_setting( 'img-upload-logo', array() );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-logo', array(
		'label' 	=> __( 'Upload Logo (~ 60x60px)', 'bean' ),
		'section' 	=> 'general_settings',
		'settings' 	=> 'img-upload-logo',
		'priority' 	=> 2
	) ) );
	
	$wp_customize->add_setting( 'img-upload-favicon', array() );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-favicon', array(
		'label' 	=> __( 'Upload Favicon (32x32px)', 'bean' ),
		'section' 	=> 'general_settings',
		'settings' 	=> 'img-upload-favicon',
		'priority' 	=> 4
	) ) );
	
	$wp_customize->add_setting( 'img-upload-apple_touch', array() );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'img-upload-apple_touch', array(
		'label' 	=> __( 'Upload Apple Touch Icon (144x144px)', 'bean' ),
		'section' 	=> 'general_settings',
		'settings' 	=> 'img-upload-apple_touch',
		'priority' 	=> 5
	) ) );

	
	
			

/*===================================================================*/         	
/*  PORTFOLIO SECTION			                							
/*===================================================================*/	
$wp_customize->add_section( 'portfolio_settings', array(
        'title' => __( 'Portfolio Settings', 'bean' ),
        'priority' => 37,
    )
);		
	
	$wp_customize->add_setting( 'portfolio_hoverdiv', array( 'default' => true ) );
	$wp_customize->add_control( 'portfolio_hoverdiv',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Portfolio Sliding Grid', 'bean' ),
	        'section' => 'portfolio_settings',
	        'priority' => 1,
	    )
	);
	
	$wp_customize->add_setting( 'portfolio_overlay_meta', array( 'default' => false ) );
	$wp_customize->add_control( 'portfolio_overlay_meta',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Portfolio Grid Meta', 'bean' ),
	        'section' => 'portfolio_settings',
	        'priority' => 1,
	    )
	);
	
	$wp_customize->add_setting( 'portfolio_lightbox', array( 'default' => true ) );
	$wp_customize->add_control( 'portfolio_lightbox',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Portfolio Lightbox', 'bean' ),
	        'section' => 'portfolio_settings',
	        'priority' => 2,
	    )
	);
	
	$wp_customize->add_setting( 'portfolio_likes', array( 'default' => true ) );
	$wp_customize->add_control( 'portfolio_likes',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Portfolio Likes', 'bean' ),
	        'section' => 'portfolio_settings',
	        'priority' => 3,
	    )
	);
	
	$wp_customize->add_setting( 'portfolio_pagination', array( 'default' => true, ) );
	$wp_customize->add_control( 'portfolio_pagination',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Single Portfolio Pagination', 'bean' ),
	        'section' => 'portfolio_settings',
	        'priority' => 4,
	    )
	);
	
	$wp_customize->add_setting( 'portfolio_sharing', array( 'default' => true, ) );
	$wp_customize->add_control( 'portfolio_sharing',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Single Portfolio Sharing', 'bean' ),
	        'section' => 'portfolio_settings',
	        'priority' => 5,
	    )
	);
	
	$wp_customize->add_setting( 'show_portfolio_loop_single', array( 'default' => true, ) );
	$wp_customize->add_control( 'show_portfolio_loop_single',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Enable Single Portfolio Loop', 'bean' ),
	        'section' => 'portfolio_settings',
	        'priority' => 5,
	    )
	);
	
	$wp_customize->add_setting( 'portfolio_posts_count', array( 'default' => '-1') );
	$wp_customize->add_control( 'portfolio_posts_count',
	    array(
	        'label' => __( 'Portfolio Template Count', 'bean' ),
	        'section' => 'portfolio_settings',
	        'type' => 'text',
	        'priority' => 6,
	    )
	);
	
	$wp_customize->add_setting( 'single_portfolio_loop_title', array( 'default' => 'More Projects', ) );
	$wp_customize->add_control( 'single_portfolio_loop_title',
	    array(
	        'label' => __( 'Portfolio Loop Title', 'bean' ),
	        'section' => 'portfolio_settings',
	        'type' => 'text',
	        'priority' => 7,
	    )
	);
	
	$wp_customize->add_setting( 'portfolio_loop_orderby', array( 'default' => 'date' ) );
	$wp_customize->add_control( 'portfolio_loop_orderby',
	    array(
	        'type' => 'select',
	        'label' => __( 'Select Portfolio Loop', 'bean' ),
	        'section' => 'portfolio_settings',
	        'priority' => 8,
	        'choices' => array(
	        	'date' => 'Most Recent',
	        	'view_count' => 'Most Views',
	            'rand' => 'Random',
	            'menu_order' => 'Sort Order',
	        ),
	    )
	);	
		
	// PULL ALL PAGES IN ARRAY
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select your Portfolio Page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
	
	$wp_customize->add_setting('portfolio_page_selector');	
	$wp_customize->add_control( 'portfolio_page_selector', array(
	    'settings' => 'portfolio_page_selector',
	    'label'   => __( 'Select Portfolio Page', 'bean' ),
	    'section' => 'portfolio_settings',
	    'type'    => 'select',
	    'choices' => $options_pages,
	    'priority' => 9,
	));

	$wp_customize->add_setting( 'portfolio_css_filter', array( 'default' => 'none' ) );
	$wp_customize->add_control( 'portfolio_css_filter',
	    array(
	        'type' => 'select',
	        'label' => __( 'CSS3 Filter', 'bean' ),
	        'section' => 'portfolio_settings',
	        'priority' => 10,
	        'choices' => array(
	        	'none' => 'None',
	            'grayscale' => 'Black & White',
	            'sepia' => 'Sepia Tone',
	            'saturation' => 'High Saturation',
	        ),
	    )
	);




/*===================================================================*/         	
/*  BLOG SETTINGS SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( 'blog_settings', array(
        'title' => __( 'Blog Settings', 'bean' ),
        'priority' => 38,
    )
);	

	$wp_customize->add_setting( 'post_thumb_hover', array( 'default' => false, ) );
	$wp_customize->add_control( 'post_thumb_hover',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Post Thumb Hovers', 'bean' ),
	        'section' => 'blog_settings',
	        'priority' => 1,
	    )
	);
	
	$wp_customize->add_setting( 'show_pagination', array( 'default' => true, ) );
	$wp_customize->add_control( 'show_pagination',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Display Single Pagination', 'bean' ),
	        'section' => 'blog_settings',
	        'priority' => 1,
	    )
	);
	
	$wp_customize->add_setting( 'post_sharing', array( 'default' => true, ) );
	$wp_customize->add_control( 'post_sharing',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Display Social Sharing Buttons', 'bean' ),
	        'section' => 'blog_settings',
	        'priority' => 2,
	    )
	);
	
	$wp_customize->add_setting( 'show_tags', array( 'default' => false, ) );
	$wp_customize->add_control( 'show_tags',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Display Single Post Tags', 'bean' ),
	        'section' => 'blog_settings',
	        'priority' => 2,
	    )
	);
		
	$wp_customize->add_setting( 'post_excerpt', array('default' => '45'));
	$wp_customize->add_control( 'post_excerpt',
	    array(
	        'label' => __( 'Post Excerpt Word Count', 'bean' ),
	        'section' => 'blog_settings',
	        'type' => 'text',
	        'priority' => 3,
	    )
	);
	
	$wp_customize->add_setting( 'twitter_profile', array('default' => ''));
	$wp_customize->add_control( 'twitter_profile',
	    array(
	        'label' => __( 'Twitter Username (eg:ThemeBeans)', 'bean' ),
	        'section' => 'blog_settings',
	        'type' => 'text',
	        'priority' => 4,
	    )
	);
		
		


/*===================================================================*/                						
/*  CONTACT TEMPLATE SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( 'contact_settings', array(
        'title' => __( 'Contact Template', 'bean' ),
        'priority' => 40,
    )
);
	
	$wp_customize->add_setting( 'hide_required', array( 'default' => false, ) );
	$wp_customize->add_control( 'hide_required',
	    array(
	        'type' => 'checkbox',
	        'label' => __( 'Hide Required Asterisks', 'bean' ),
	        'section' => 'contact_settings',
	        'priority' => 2,
	    )
	);
	
	$wp_customize->add_setting( 'admin_custom_email',array( 'default' => '',));
	$wp_customize->add_control( 'admin_custom_email',
	    array(
	        'label' => __( 'Contact Form Email', 'bean' ),
	        'section' => 'contact_settings',
	        'type' => 'text',
	        'priority' => 4,
	    )
	);
	
	$wp_customize->add_setting('contact_button_text',array( 'default' => 'Send Message',));
	$wp_customize->add_control('contact_button_text',
	    array(
	        'label' => __( 'Contact Button Text', 'bean' ),
	        'section' => 'contact_settings',
	        'type' => 'text',
	        'priority' => 5,
	    )
	);
	
	
	

/*===================================================================*/         	
/*  404 PAGE SECTION			                							
/*===================================================================*/		
$wp_customize->add_section( '404_settings', array(
        'title' => __( '404 & Coming Soon', 'bean' ),
        'priority' => 200,
    )
);	
	
	$wp_customize->add_setting( 'error_title',array( 'default' => 'Shucks' ));
	$wp_customize->add_control( 'error_title',
	    array(
	        'label' => __( '404 Header', 'bean' ),
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 1,
	    )
	);
	
	$wp_customize->add_setting( 'error_text',array( 'default' => 'Unfortunately, this page is long gone.' ));
	$wp_customize->add_control( 'error_text',
	    array(
	        'label' => __( '404 Text', 'bean' ),
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 2,
	    )
	);

	$wp_customize->add_setting( 'comingsoon_year',array( 'default' => '2016',));
	$wp_customize->add_control( 'comingsoon_year',
	    array(
	        'label' => __( 'Year (ex: 2014)', 'bean' ),
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 3,
	    )
	);
	
	$wp_customize->add_setting( 'comingsoon_month',array( 'default' => '01',));
	$wp_customize->add_control( 'comingsoon_month',
	    array(
	        'label' => __( 'Month (ex: 01 for JAN)', 'bean' ),
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 4,
	    )
	);
	
	$wp_customize->add_setting( 'comingsoon_day',array( 'default' => '01',));
	$wp_customize->add_control( 'comingsoon_day',
	    array(
	        'label' => __( 'Day (ex: 01)', 'bean' ),
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 5,
	    )
	);			




/*===================================================================*/                						
/*  CUSTOM CSS SECTION			                							
/*===================================================================*/	
$wp_customize->add_section( 'custom_css', array(
        'title' => __( 'Custom CSS', 'bean' ),
        'priority' => 300,
    )
);




/*===================================================================*/                						
/*  NAVIGATION SECTION (ADDED ON)			                							
/*===================================================================*/		
	$wp_customize->add_setting( 'menu_text', array( 'default' => 'Menu.' ) );
	$wp_customize->add_control( 'menu_text',
	    array(
	        'label' => 'Main Menu Label',
	        'section' => 'nav',
	        'type' => 'text',
	        'priority' => 5,
	    )
	);
		
	
	
		
/*===================================================================*/                						
/*  CUSTOM CONTROLS			                							
/*===================================================================*/	
	// CUSTOM CSS EDITOR
	class Custom_CSS_Control extends WP_Customize_Control {
	    public $type = 'custom_css';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="7" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	$wp_customize->add_setting( 'custom_css' );
	$wp_customize->add_control(
	    new Custom_CSS_Control( $wp_customize, 'custom_css',
	        array(
	            'label' => __( 'Enter Custom CSS', 'bean' ),
	            'section' => 'custom_css',
	            'settings' => 'custom_css'
	        )
	    )
	);
	
		
	// GOOGLE ANALYTICS TEXTAREA
	class Google_Analytics_Control extends WP_Customize_Control {
	    public $type = 'google_analytics';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="7" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	$wp_customize->add_setting( 'google_analytics' );
	$wp_customize->add_control(
	    new Google_Analytics_Control(
	        $wp_customize, 'google_analytics',
	        array(
	            'label' => __( 'Google Analytics Script', 'bean' ),
	            'section' => 'general_settings',
	            'settings' => 'google_analytics',
	            'priority' => 10,
	        )
	    )
	);
	
	
	// FOOTER COPYRIGHT TEXTAREA
	class Footer_Copyright_Control extends WP_Customize_Control {
	    public $type = 'footer_copyright';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="7" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	$wp_customize->add_setting( 'footer_copyright', array( 'default' => '' ) );
	$wp_customize->add_control(
	    new Footer_Copyright_Control(
	        $wp_customize, 'footer_copyright',
	        array(
	            'label' => __( 'Copyright Text', 'bean' ),
	            'section' => 'general_settings',
	            'settings' => 'footer_copyright',
	            'priority' => 10,
	        )
	    )
	);




/*===================================================================*/                							
/*  TRANSPORTS FOR LIVE PREVIEW EDITING		                							
/*===================================================================*/
	//LIVE HTML
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
	$wp_customize->get_setting( 'letter_logo_text' )->transport = 'postMessage';
	$wp_customize->get_setting( 'single_portfolio_loop_title' )->transport = 'postMessage';
	$wp_customize->get_setting( 'footer_copyright' )->transport = 'postMessage';
	$wp_customize->get_setting( 'menu_text' )->transport = 'postMessage';
	$wp_customize->get_setting( 'contact_button_text' )->transport = 'postMessage';
	
	
	//LIVE CSS
	$wp_customize->get_setting( 'overlay_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'overlay_text_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'wrapper_background_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'body_text_color' )->transport = 'postMessage';
	
}