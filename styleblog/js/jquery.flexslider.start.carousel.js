jQuery(window).load(function() {
/*global jQuery:false */
"use strict";
	
  jQuery('.flexcarousel').flexslider({
    animation: "slide",
    animationLoop: true,
    itemWidth: 196,        
	slideshowSpeed: 10000, 
    itemMargin:0,
    minItems: 1,
    maxItems: 3,
	move: 1,
	smoothHeight: false,
	prevText: "", 
	nextText: "",
	start: function(slider) {
  		slider.removeClass('loading');
		}
  });
  
	jQuery(document).ready(function () {
		jQuery(".flexcarousel ul.slides li").animate({height:'310'},800);
	});
  
});