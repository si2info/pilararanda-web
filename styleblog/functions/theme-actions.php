<?php 


/*-----------------------------------------------------------------------------------*/
/* Custom functions */
/*-----------------------------------------------------------------------------------*/


global $themnific_options;
$output = '';

// Add custom styling
add_action('wp_head','themnific_custom_styling');
function themnific_custom_styling() {
	
// Get options
$home = home_url();
$home_theme  = get_template_directory_uri();
	
$custom_css = get_option('themnific_custom_css');
if ($custom_css)
$output .= $custom_css ;
$output = '';


/////////////////// 
//primary styling
$bg_body = get_option('themnific_bg_body');
$bg_body_ghost = get_option('themnific_bg_body_ghost');
$link = get_option('themnific_link');
$link_hover = get_option('themnific_link_hover');
$borders = get_option('themnific_borders');

// primary styling - output

if ($bg_body) $output .= '
body{background-color:'.$bg_body.'}' . "\n";
	
if ($bg_body_ghost) $output .= '
.ghost,.headad,.featured-post-inn,#infscr-loading,.nav ul,.mainflex.loading,input, textarea, input checkbox, input radio, select, file{background-color:'.$bg_body_ghost.'}' . "\n";
	
if ($link) $output .= '
.body1 a, a:link, a:visited,.nav li ul li a,#bbpress-forums a{color:'.$link.'}' . "\n";
	
if ($link_hover) $output .= '
a:hover,.body1 a:hover{color:'.$link_hover.'}' . "\n";
	
if ($borders) $output .= '
.widgetable h2,.nav li ul,.tp_recent_tweets ul li,h1.entry-title,.blocker,.mag-big,.mag-small,.mag-small-alt,.media-small,.media-big,.tab-post,.hrline,.hrlineB,.com_post,#comments,input#author,input#email,input#url,h3#reply-title,.vborder,input, textarea, input checkbox, input radio, select, file,.sticky,.ratingblock,.postauthor,.nav li ul li>a,.products{border-color:'.$borders.' !important}' . "\n";
$output .= '
.nav>li>ul:after{border-color:'.$borders.' transparent}' . "\n";		




///////////////////
// header styling
$bg_header = get_option('themnific_bg_header');
$bg_navigation = get_option('themnific_bg_navigation');
$link_header = get_option('themnific_link_header');
$hover_header = get_option('themnific_hover_header');
$hover_header_bg = get_option('themnific_hover_header_bg');
$borders_header = get_option('themnific_borders_header');
$logo_margin = get_option('themnific_logo_margin');
$logo_margin_bottom = get_option('themnific_logo_margin_bottom');
$logo_limit = get_option('themnific_logo_limit');
$header_margin = get_option('themnific_header_margin');

// header styling - output

if ($bg_header) $output .= '
#header,#navigation{background-color:'.$bg_header.'}' . "\n";

if ($bg_navigation) $output .= '
#navigation{background-color:'.$bg_navigation.'}' . "\n";
	
if ($link_header) $output .= '
#header h1 a,#main-nav>li:before{color:'.$link_header.'}' . "\n";
$output .= '
#top-nav a,#header ul.social-menu a {color:'.$link_header.' !important}' . "\n";
	
if ($hover_header) $output .= '
#header .nav>li>a:hover,#main-nav>.current-menu-item>a,#main-nav>.sfHover>a{color:'.$hover_header.'}' . "\n";

if ($hover_header_bg) $output .= '
.nav li a:hover,#main-nav .current-menu-item>a,#main-nav>.sfHover>a{border-color:'.$hover_header_bg.' !important}' . "\n";
$output .= '
a:hover .sf-sub-indicator,.current-menu-item a .sf-sub-indicator{background-color:'.$hover_header_bg.'}' . "\n";$output .= '
#top-nav a:hover{color:'.$hover_header_bg.' !important}' . "\n";

if ($borders_header) $output .= '
#navigation,.nav li,.curtain{border-color:'.$borders_header.' !important}' . "\n"; $output .= '
.nav .sf-sub-indicator{background-color:'.$borders_header.'}' . "\n";

$output .= '
#header{margin-bottom:'.$header_margin.'px;}' . "\n";

$output .= '
#titles{margin-top:'.$logo_margin.'px;}' . "\n";	

$output .= '
#titles{margin-bottom:'.$logo_margin_bottom.'px;}' . "\n";	

$output .= '
#header h1{max-width:'.$logo_limit.'px}' . "\n";







///////////////////
// footer styling
$bg_footer = get_option('themnific_bg_footer');
$link_footer = get_option('themnific_link_footer');
$hover_footer = get_option('themnific_hover_footer');
$borders_footer = get_option('themnific_borders_footer');

// footer styling - output

if ($bg_footer) $output .= '
#footer,.blogger .sticky,.curtain{background-color:'.$bg_footer.'}' . "\n";
	
if ($link_footer) $output .= '
#footer a,#footer h2,#footer input,#footer textarea,#footer input,.blogger .sticky a{color:'.$link_footer.'}' . "\n";
	
if ($hover_footer) $output .= '
#footer a:hover,.blogger .sticky a:hover{color:'.$hover_footer.'}' . "\n";
	
if ($borders_footer) $output .= '
#footer .tp_recent_tweets ul li,#footer li.vcard,#footer .avatar-block,#footer .com_post,#footer .tab-post,#footer,#footer .foocol,#footer .foocol h2,#footer .com_post,#footer .wpcf7-form input,#footer .wpcf7-form textarea,#copyright,.curtain .searchform input.s{border-color:'.$borders_footer.' !important}' . "\n";
	




///////////////////
// other styling
$bg_elements = get_option('themnific_bg_elements');
$text_elements = get_option('themnific_text_elements');
$hover_bg_elements = get_option('themnific_hover_bg_elements');
$hover_text_elements = get_option('themnific_hover_text_elements');

// other styling - output

if ($bg_elements) $output .= '
.flex-caption,#serinfo-nav li.current,.ratingbar,.imgwrap,.line,.scrollTo_top a,.searchSubmit,a.mainbutton,.nav-previous a,.elements,.nav_item a,.flex-direction-nav a,.page-numbers.current,#comments .reply a,a#triggernav,.scrollTo_top a i,span.ribbon,a#navtrigger,#submit,.score,.overrating,a.comment-reply-link{background-color:'.$bg_elements.'}' . "\n";
 $output .= '
.page-numbers.current,input.wpcf7-submit,p.meta.cat{background-color:'.$bg_elements.' !important}' . "\n";
$output .= '
h2.block,h2.archiv{border-color:'.$bg_elements.' !important}' . "\n";
$output .= '
.media-small a,.meta_more a,.loop .meta_more a{color:'.$bg_elements.'}' . "\n";
	
if ($text_elements) $output .= '
.flex-caption,#serinfo-nav li.current a,.ratingbar,.searchSubmit i,.scrollTo_top i,a.mainbutton,.nav-previous a,.elements,.elements a,.nav_item a,.flex-direction-nav a,.page-numbers.current,#comments .reply a,a#triggernav,.scrollTo_top a i,.ribbon_icon,#submit{color:'.$text_elements.'}' . "\n"; 
$output .= '
p.meta.cat,p.meta.cat a,.page-numbers.current,input.wpcf7-submit,.score,a.comment-reply-link,#serinfo-nav li a.current{color:'.$text_elements.' !important}' . "\n";

if ($hover_bg_elements) $output .= '
a.mainbutton:hover,a.itembutton:hover,.nav_item a:hover,#submit:hover,#comments .navigation a:hover,.tagssingle a:hover,.contact-form .submit:hover,a.comment-reply-link:hover,.nav-previous a:hover,a#triggernav.active{background-color:'.$hover_bg_elements.'}' . "\n";

if ($hover_text_elements) $output .= '
a.mainbutton:hover,a.itembutton:hover,.nav_item a:hover,#submit:hover,#comments .navigation a:hover,.tagssingle a:hover,.contact-form .submit:hover,a.comment-reply-link:hover,.nav-previous a:hover,a#triggernav.active{color:'.$hover_text_elements.'}' . "\n";






///////////////////
///////////////////
// General Typography		
$font = get_option('themnific_font');	
$font_sec = get_option('themnific_font_sec');
$font_nav = get_option('themnific_font_nav');

$font_h1 = get_option('themnific_font_h1');	
$font_h2 = get_option('themnific_font_h2');	
$font_h2_widget = get_option('themnific_font_h2_widget');
$font_h3 = get_option('themnific_font_h3');	
$font_h4 = get_option('themnific_font_h4');	
$font_h5 = get_option('themnific_font_h5');	
$font_labels = get_option('themnific_font_labels');	


$font_h2_tagline = get_option('themnific_font_h2_tagline');	
	
	
if ( $font )
	$output .= '
	body,input, textarea,input checkbox,input radio,select, file,h3.sd-title {font:'.$font["style"].' '.$font["size"].'px/1.8em '.stripslashes($font["face"]).';color:'.$font["color"].'}' . "\n";
	
if ( $font_sec )
	$output .= '
	#footer {font:'.$font_sec["style"].' '.$font_sec["size"].'px/1.8em '.stripslashes($font_sec["face"]).';color:'.$font_sec["color"].'}' . "\n";
	$output .= '
	.blogger .sticky p,a.curtainclose{color:'.$font_sec["color"].' !important}' . "\n";

if ( $font_h1 )
	$output .= '
	h1,.flexinside h2{font:'.$font_h1["style"].' '.$font_h1["size"].'px/1.2em '.stripslashes($font_h1["face"]).';color:'.$font_h1["color"].'}';
	
if ( $font_h2 )
	$output .= '
	h2,.twocats h2.posttitle{font:'.$font_h2["style"].' '.$font_h2["size"].'px/1.1em '.stripslashes($font_h2["face"]).';color:'.$font_h2["color"].'}';
		
if ( $font_h2_widget )
	$output .= '
	h1.entry-title,h2.posttitle,h2.block,h2.widget,h2.archiv{font:'.$font_h2_widget["style"].' '.$font_h2_widget["size"].'px/1.2em '.stripslashes($font_h2_widget["face"]).';color:'.$font_h2_widget["color"].'}';
	
if ( $font_h3 )
	$output .= '
	h3,h3#reply-title,#respond h3,.comment-author cite{font:'.$font_h3["style"].' '.$font_h3["size"].'px/1.3em '.stripslashes($font_h3["face"]).';color:'.$font_h3["color"].'}';
	
if ( $font_h4 )
	$output .= '
	h4,.ratingblock p{font:'.$font_h4["style"].' '.$font_h4["size"].'px/1.4em '.stripslashes($font_h4["face"]).';color:'.$font_h4["color"].'}';	
	$output .= '
	a.mainbutton,a.mainbutton_folio,.nav_item a,a.tmnf-sc-button,.nav-previous a,.woocommerce a.button{font:'.$font_h4["style"].' '.$font_h4["size"].'px/0.9em '.stripslashes($font_h4["face"]).'}';
	
if ( $font_h5 )
	$output .= '
	h5{font:'.$font_h5["style"].' '.$font_h5["size"].'px/2.5em '.stripslashes($font_h5["face"]).';color:'.$font_h5["color"].'}';	
	
if ( $font_labels )
	$output .= '
	h6,.meta,.meta_more,p.teaser span,#top-nav a,#header .searchform input.s,h2.description,#serinfo-nav li a {font:'.$font_labels["style"].' '.$font_labels["size"].'px/1.5em '.stripslashes($font_labels["face"]).';color:'.$font_labels["color"].'}' . "\n";
	
	
if ( $font_nav )
	$output .= '
	#main-nav>li>a,.bigmenu>ul>li>a  {font:'.$font_nav["style"].' '.$font_nav["size"].'px/1.2em '.stripslashes($font_nav["face"]).';color:'.$font_nav["color"].'}';	
	$output .= '
	.nav ul li a,h2.description{color:'.$font_nav["color"].'}';	


	
	// Output styles
		if ($output <> '') {
			$output = "<!-- Themnific Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
	}
		
} 


// Add custom styling
add_action('themnific_head','themnific_mobile_styling');
function themnific_mobile_styling() {
	echo "<!-- Themnific CSS -->\n";
	
	// google fonts link generator
	get_template_part('/functions/admin-fonts');
} 
?>