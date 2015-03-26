jQuery(document).ready(function($){
/*global jQuery:false */
"use strict";

var $container = $('.blogger.infinite');
    
    $container.infinitescroll({
      navSelector  : '.nav-previous',    // selector for the paged navigation 
      nextSelector : '.nav-previous a',  // selector for the NEXT link (to page 2)
      itemSelector : '.blogger.infinite .post',     // selector for all items you'll retrieve
      loading: {
          finishedMsg: 'No more pages to load.',
          img: 'http://i.imgur.com/6RMhx.gif'
      }
	  },
      // trigger Masonry as a callback
      function( newElements ) {

		jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			// Parameters for PrettyPhoto styling
			animationSpeed:'fast',
			slideshow:5000,
			theme:'pp_default',
			show_title:false,
			overlay_gallery: false,
			social_tools: false
		});
		
		jQuery('.singleslider').flexslider({
			animation: "fade",
			animationDuration: 500,
			slideshowSpeed: 9000,
			pauseOnHover: true,
			controlNav: true,
			directionNav: true,
			manualControls: ".vrg_slideshow_thumbnails li a",
			smoothHeight: true
		});
		  
      });

  //kill scroll binding
    jQuery(window).unbind('.infscr');
    //setTimeout("jQuery('#next').slideDown();", 1000);
     //hook up the manual click guy.

	jQuery('.nav-previous a').click(function(){jQuery('.blogger.infinite').infinitescroll('retrieve');
	return false;
	});


  });