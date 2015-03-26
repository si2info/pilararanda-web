<?php


// admin panel options
$font_h1 = get_option('themnific_font_h1');	
$font_h2 = get_option('themnific_font_h2');	
$font_h2_widget = get_option('themnific_font_h2_widget');	
$font_h3 = get_option('themnific_font_h3');	
$font_h4 = get_option('themnific_font_h4');	
$font_h5 = get_option('themnific_font_h5');	
$font_labels = get_option('themnific_font_labels');	

$font = get_option('themnific_font');
$font_sec = get_option('themnific_font_sec');	
$font_nav = get_option('themnific_font_nav');	



// web-safe fonts
$safefonts = array("Helvetica Neue", "Arial", "Verdana", "Trebuchet MS", "Georgia", "Times New Roman", "Tahoma", "Palatino", "Calibri", "Myriad Pro", "Lucida Sans Unicode", "Arial Black", "Gill Sans", "Geneva", "Courier", "Impact");


// google link
echo '<link href="http://fonts.googleapis.com/css?family=';

	if (in_array($font_h1 ["face"], $safefonts))
		{ echo ''; } else {echo str_replace(" ", "+",$font_h1 ["face"]).':'.$font_h1["style"].'%7c';};
		
	if (in_array($font_h2 ["face"], $safefonts))
		{ echo ''; } else {echo str_replace(" ", "+",$font_h2 ["face"]).':'.$font_h2["style"].'%7c';};
		
	if (in_array($font_h2_widget ["face"], $safefonts))
		{ echo ''; } else {echo str_replace(" ", "+",$font_h2_widget ["face"]).':'.$font_h2_widget["style"].'%7c';};
		
	if (in_array($font_h3 ["face"], $safefonts))
		{ echo ''; } else {echo str_replace(" ", "+",$font_h3 ["face"]).':'.$font_h3["style"].'%7c';};
		
	if (in_array($font_h4 ["face"], $safefonts))
		{ echo ''; } else {echo str_replace(" ", "+",$font_h4 ["face"]).':'.$font_h4["style"].'%7c';};
		
	if (in_array($font_h5 ["face"], $safefonts))
		{ echo ''; } else {echo str_replace(" ", "+",$font_h5 ["face"]).':'.$font_h5["style"].'%7c';};
		
	if (in_array($font ["face"], $safefonts))
		{ echo ''; } else {echo str_replace(" ", "+",$font ["face"]).':'.$font["style"].'%7c';};
		
	if (in_array($font_sec ["face"], $safefonts))
		{ echo ''; } else {echo str_replace(" ", "+",$font_sec ["face"]).':'.$font_sec["style"].'%7c';};
		
	if (in_array($font_nav ["face"], $safefonts))
		{ echo ''; } else {echo str_replace(" ", "+",$font_nav ["face"]).':'.$font_nav["style"].'%7c';};
		
	if (in_array($font_labels ["face"], $safefonts))
		{ echo ''; } else {echo str_replace(" ", "+",$font_labels ["face"]).':'.$font_labels["style"];};
	
echo '&subset=latin,latin-ext" rel="stylesheet" type="text/css">'."\n";


?>