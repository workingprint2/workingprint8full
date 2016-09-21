/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. This javascript will grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
 
( function( $ ) {

	//LIVE HTML
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.logo_text' ).html( newval );
		} );
	} );
		
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );
	
	wp.customize( 'letter_logo_text', function( value ) {
		value.bind( function( newval ) {
			$( '.letter-logo a' ).html( newval );
		} );
	} );
	
	wp.customize( 'single_portfolio_loop_title', function( value ) {
		value.bind( function( newval ) {
			$( '.more-title h1' ).html( newval );
		} );
	} );
	
	wp.customize( 'footer_copyright', function( value ) {
		value.bind( function( newval ) {
			$( '.copyright' ).html( newval );
		} );
	} );
	
	wp.customize( 'menu_text', function( value ) {
		value.bind( function( newval ) {
			$( 'h6.menu_text' ).html( newval );
		} );
	} );
	
	wp.customize( 'contact_button_text', function( value ) {
		value.bind( function( newval ) {
			$( '.bean-contactform li.submit .button' ).html( newval );
		} );
	} );
	
	
	

	//LIVE CSS
	wp.customize( 'wrapper_background_color', function( value ) {
		value.bind( function( newval ) {
			$('body, #theme-wrapper').css('background-color', newval );
		} );
	} );
	
	wp.customize( 'body_text_color', function( value ) {
		value.bind( function( newval ) {
			$('p, body, a:hover, .theme-tagline p a:hover').css('color', newval );
		} );
	} );
	
	wp.customize( 'overlay_color', function( value ) {
		value.bind( function( newval ) {
			$('#isotope-container li a div.overlay').css('background-color', newval );
		} );
	} );
	
	wp.customize( 'overlay_text_color', function( value ) {
		value.bind( function( newval ) {
			$('#isotope-container li a div.overlay h4, #isotope-container li a div.overlay h4 span').css('color', newval );
		} );
	} );
	
} )( jQuery );
