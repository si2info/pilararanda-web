jQuery(window).load(function() {
/*global jQuery:false */
"use strict";
	
  jQuery('.mainflex,.blockflex').flexslider({
	animation: "fade",
	slideshow: true,                //Boolean: Animate slider automatically
	slideshowSpeed: 11000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
	animationDuration: 600,
	smoothHeight: true,
	useCSS: false,
	start: function(slider) {
  		slider.removeClass('loading');
  		slider.removeClass('loading_full');
		}
    });
  
});