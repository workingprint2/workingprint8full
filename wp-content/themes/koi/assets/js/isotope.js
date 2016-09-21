(function (e) {
    "use strict";
    e(document).ready(function () {
        var t = e("html").removeClass("no-js"),
            n = e("body");
		e(window).load(function () {

		if (e().isotope) {
		    var r = e("#isotope-container"),
		        s = function () {
		            var t, n = e(window).width();
		            n <= 400 ? t = Math.floor(r.width() / 1) : n <= 800 ? t = Math.floor(r.width() / 2) : n <= 1200 ? t = Math.floor(r.width() / 3) : n <= 1600 ? t = Math.floor(r.width() / 4) : n <= 2000 ? t = Math.floor(r.width() / 5) : n <= 2400 ? t = Math.floor(r.width() / 6) : n <= 2800 ? t = Math.floor(r.width() / 7) : n <= 3200 ? t = Math.floor(r.width() / 8) : t = 400;
		            return t
		        }, o = function () {
		            var e = s();
		            r.children().css({
		                width: e
		            })
		        };
		    o();
		    r.isotope({
		        layoutMode: "masonry",
		        itemSelector: '.isotope-item',
		        onLayout: verticalAlign,
		        masonry: {
		            columnWidth: s()
		        },
		        
		    });
		    e(window).smartresize(function () {
		        o();
		        r.isotope({
		        	itemSelector: '.isotope-item',
		            masonry: {
		                columnWidth: s()
		            }
		        })
		    });
         	}
         	
         	// VERTICAL ALIGNMENT
         	function verticalAlign($container) {
         	  $container.each(function($) {
         	      	 var $h4 = jQuery(this).find('a h4');
         	      	 $h4.css( 'margin-top', jQuery(this).height() / 2 - $h4.get()[0].clientHeight / 2 );
         	    });
         	}
        });
        
    })
    
})(window.jQuery);

jQuery(document).ready(function($) {
	//PORTFOLIO FILTER
	$(function(){
	    var $container = $('#isotope-container');
	        optionFilter = jQuery('#filter'),
	        optionFilterLinks = optionFilter.find('a');
	    
	    optionFilterLinks.attr('href', '#');
	    
	    optionFilterLinks.click(function(){
	       var selector = jQuery(this).attr('data-filter');
	       $container.imagesLoaded( function(){ 
	       		$container.isotope({ 
	            	filter : '.' + selector, 
	            	itemSelector : '.isotope-item',
	            	layoutMode : 'masonry',
	            	resizesContainer: true,
	        });
	      });	
	      // Highlight the correct filter
	      optionFilterLinks.removeClass('active');
	      jQuery(this).addClass('active');
	      return false;
	  });
	}); 
	
	
	//FILTER TRIGGER     
	$("#filter").click(function () {
	    $(this).toggleClass('open');
	});

});