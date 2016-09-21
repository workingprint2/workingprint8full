// IF JS IS ENABLED, REMOVE 'no-js' AND ADD 'js' CLASS
jQuery('html').removeClass('no-js').addClass('js');

jQuery(document).ready(function($) {

	//ADD CLASS IE8
	if ($browserMSIE && $browserVersion === 8) {
		$('body').addClass('ie-8');	
	} else {}
	
	//FITVIDS
	$("body").fitVids();
	     
	//RESPONSIVE MENU
	$('header nav').meanmenu();
	
	//FULL HEIGHT RESIZE
	$(window).resize(function () {
	    triggerResize();
	});
	
	var triggerResize = function () {
	    var $window = $(window);
	    var windowHeight = $window.height();
	    var windowWidth = $window.width();
	    $('#header-container').css({
	        'height': windowHeight + 'px'
	    }).find('.toggle a').css({
	        'height': windowHeight + 'px'
	    });
	};
	
	//AUTOHEIGHT TEXTAREA
	jQuery('textarea.auto-height').flexText();
	  
  	//FORM VALIDATION
	if (jQuery().validate) { jQuery("#commentform").validate(); } 
	
	//ISOTOPE LOADING ANIMATION
	$(".portfolio-template").delay(1200).queue(function(){
		$(this).css('background','none');
		$(this).dequeue();
	});
	
	//SOCIAL POPOVER
	$('.social_popover').click(function(){ 
		$('.social_popover').toggleClass('active');
		return false; 
	});
	$('[rel=popover]').popover({ 
	       html : true, 
	       content: function() {
	         return $('#popover_content_wrapper').html();
	       }
	});
	
	//BEAN LIKES
	$("li.likes a:not(.active)").click(function () {
	$('span.bean-like-icon').addClass('animated BeanLikeAnimation');
	});
	
	function Bean_Reload_Likes(who) {
	var text = jQuery("#" + who).html();
	var patt= /(\d)+/;
	
	var num = patt.exec(text);
	num[0]++;
	text = text.replace(patt,num[0]);
	jQuery("#" + who).html('<span class="count">' + text + '</span>');
	}
	
	function Bean_Likes_Init() {
	jQuery(".bean-likes").click(function() {
		var classes = jQuery(this).attr("class");
		classes = classes.split(" ");
	
		if(classes[1] == "active") {
			return false;
		}
		var classes = jQuery(this).addClass("active");
		var id = jQuery(this).attr("id");
		id = id.split("like-");
		jQuery.ajax({
		  type: "POST",
		  url: "index.php",
		  data: "likepost=" + id[1],
		  success: Bean_Reload_Likes("like-" + id[1])
		});
		return false;
	});
	}
	Bean_Likes_Init();
	
	/*===================================================================*/
	/* RIGHT SIDEBAR MAIN
	/*===================================================================*/
	// IE8
	var $browserMSIE = $.browser.msie;
	var $browserVersion = parseInt($.browser.version, 10);
	
	//IE HIDDEN SIDEBAR TOGGLE
	var $browserMSIE = $.browser.msie;
	var $browserVersion = parseInt($.browser.version, 10);
	
	if ($browserMSIE && $browserVersion === 8 || $browserMSIE && $browserVersion === 9) {
	$(document).on("click", '.ie #header-container' , function(){ 
		if ($('#theme-wrapper').hasClass('ie-side-menu')) {
			$('#theme-wrapper').removeClass('ie-side-menu');
		 	$('.hidden-sidebar').css('display','none').css('z-index','-1');
		 	$('.menu-icon').removeClass('close');
		 } else {
		 	$('#theme-wrapper').addClass('ie-side-menu');
		 	$('.hidden-sidebar').css('display','block').css('z-index','99');
		 	$('.menu-icon').addClass('close');
		} 
	 });
	} else {}
	//END IE 
	
	
	//CLICK EVENTS
	var ua = navigator.userAgent,
		clickevent = (ua.match(/iPad/i) || ua.match(/iPhone/i) || ua.match(/Android/i)) ? "touchstart" : "click";
		    console.log(clickevent);
		    
	//MENU BUTTON TRIGGER
	$(document).on(clickevent, '#header-container', function(event){
	event.preventDefault();
		if ($('#theme-wrapper').hasClass('side-menu')) {
		  closeMenu();
		} else {
		  openMenu();
		}
	});
	 
	//OPEN
	function openMenu(){
	 	$('.hidden-sidebar').css('display','block');
	 	$('.menu-icon').addClass('close');
	 	$('#theme-wrapper').addClass('side-menu');
	 	$('.safari #theme-wrapper').addClass('no-flick');
	 	$('.safari #header-container').addClass('no-flick');
	 	setTimeout(function(){$('.hidden-sidebar').css('z-index','0');},300);
	}
	
	//CLOSE 
	function closeMenu(){
		$('.hidden-sidebar').css('z-index','-1');
		$('.menu-icon').removeClass('close');
	    $('#theme-wrapper').removeClass('side-menu');
	    $('.safari #theme-wrapper').removeClass('no-flick');
	    $('.safari #header-container').removeClass('no-flick');
		setTimeout(function(){ $('.hidden-sidebar').css('z-index','-1'); },300);
	 }
});