<?php

add_action('init','themnific_options');  
function themnific_options(){
	
// VARIABLES
$themename = "StyleBlog";
$shortname = "themnific";

// Populate option in array for use in theme 
global $themnific_options; 
$themnific_options = get_option('themnific_options');

$GLOBALS['template_path'] = get_template_directory_uri();;

//Access the WordPress Categories via an Array
$themnific_categories = array();  
$themnific_categories_obj = get_categories('hide_empty=0');
foreach ($themnific_categories_obj as $themnific_cat) {
    $themnific_categories[$themnific_cat->cat_ID] = $themnific_cat->cat_name;}
$categories_tmp = array_unshift($themnific_categories, "Select a category:");    
       
//Access the WordPress Pages via an Array
$themnific_pages = array();
$themnific_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($themnific_pages_obj as $themnific_page) {
    $themnific_pages[$themnific_page->ID] = $themnific_page->post_name; }
$themnific_pages_tmp = array_unshift($themnific_pages, "Select a page:");       

// Image Alignment radio box
$options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 

// Image Links to Options
$options_image_link_to = array("image" => "The Image","post" => "The Post"); 

//Testing 
$options_select = array("one","two","three","four","five"); 
$options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five"); 


//Stylesheets Reader
$alt_stylesheet_path = get_template_directory() . '/styles/';
$alt_stylesheets = array();

if ( is_dir($alt_stylesheet_path) ) {
    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) { 
        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) {
            if(stristr($alt_stylesheet_file, ".css") !== false) {
                $alt_stylesheets[] = $alt_stylesheet_file;
            }
        }    
    }
}
// Set the Options Array
$bgurl =  get_template_directory_uri() . '/functions/images/bg';
//More Options
$all_uploads_path =  home_url() . '/wp-content/uploads/';
$all_uploads = get_option('themnific_uploads');
$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");

// THIS IS THE DIFFERENT FIELDS
$options = array();   

$options[] = array( "name" => "General Settings",
                    "type" => "heading");

$options[] = array( "name" => "Main Logo",
					"desc" => "Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)<br/>",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "upload");  

$options[] = array( "name" => "Custom Favicon",
					"desc" => "Upload a 16px x 16px Png/Gif image that will represent your website's favicon.",
					"id" => $shortname."_custom_favicon",
					"std" => "",
					"type" => "upload"); 
                                               
$options[] = array( "name" => "Analytics Tracking ID",
					"desc" => "Paste your Google Analytics tracking ID here.",
					"id" => $shortname."_google_analytics",
					"std" => "",
					"type" => "text");  
					

		
// general layout

$options[] = array( "name" => "General Layout",
					"type" => "heading");   

$options[] = array( "name" => "Replace native gallery [gallery] with slider",
                    "desc" => "Tick to disable classic grid gallery and enable gallary slider.",
                    "id" => $shortname."_slider_gallery",
                    "std" => "true",
                    "type" => "checkbox");

$options[] = array( "name" => "Disable Footer Widget Section",
					"desc" => "Check to disable widgets in footer",
					"id" => $shortname."_widget_dis",
					"std" => "false",
					"type" => "checkbox"); 
					
$options[] = array( "name" => "Desaturate Images",
                    "desc" => "Enable/disable desatureted images.",
                    "id" => $shortname."_desaturate",
                    "std" => "false",
                    "type" => "checkbox");

$options[] = array( "name" => "Show Uppercase Fonts",
                    "desc" => "You can disable general uppercase here.",
                    "id" => $shortname."_upper",
                    "std" => "false",
                    "type" => "checkbox");
					
// primary styling

$options[] = array( "name" => " Primary Styling",
					"type" => "heading");

			
$options[] = array( "name" => "General Text Font Style",
					"desc" => "Select the typography used in general text. <br />* semi-safe font <br />*** Google Webfonts (make sure that selected weight is supported!!).",
					"id" => $shortname."_font",
					"std" => array('size' => '14','face' => 'Arial','style' => '400','color' => '#4f4f4f'),
					"type" => "typography"); 
					
					
$options[] = array( "name" =>  "Body Background Color",
					"desc" => "Pick a custom color for main background.",
					"id" => $shortname."_bg_body",
					"std" => "#F0F0F0",
					"type" => "color");

$options[] = array( "name" =>  "Container Background Color",
					"desc" => "Pick a custom color for container.",
					"id" => $shortname."_bg_body_ghost",
					"std" => "#fdfdfd",
					"type" => "color");

					
$options[] = array( "name" =>  "Link Color",
					"desc" => "Pick a custom color for links.",
					"id" => $shortname."_link",
					"std" => "#333",
					"type" => "color");     

$options[] = array( "name" =>  "Hover Color",
					"desc" => "Pick a custom color for links (hover).",
					"id" => $shortname."_link_hover",
					"std" => "#EF610F",
					"type" => "color"); 
					
$options[] = array( "name" =>  "Borders",
					"desc" => "Pick a custom color for borders.",
					"id" => $shortname."_borders",
					"std" => "#ebebeb ",
					"type" => "color"); 
				
	
// header styling	
	
$options[] = array( "name" => "Header Styling & Settings",
					"type" => "heading");

$options[] = array( "name" => "Navigation Font Style",
					"desc" => "Select the typography for navigation. <br />* semi-safe font <br />*** Google Webfonts (make sure that selected weight is supported!!).",
					"id" => $shortname."_font_nav",
					"std" => array('size' => '14','face' => 'Raleway','style' => '700','color' => '#4d4d4d'),
					"type" => "typography");      

$options[] = array( "name" =>  "Navigation Link Hover Color",
					"desc" => "Pick a custom color for links (hover) in header area.",
					"id" => $shortname."_hover_header",
					"std" => "#444",
					"type" => "color");          

$options[] = array( "name" =>  "Navigation Link Hover Color - border",
					"desc" => "Pick a custom color for links (hover) in header area.",
					"id" => $shortname."_hover_header_bg",
					"std" => "#FF4200",
					"type" => "color"); 
					
					
$options[] = array( "name" =>  "Navigation Background Color",
					"desc" => "Pick a custom color for navigation bar.",
					"id" => $shortname."_bg_navigation",
					"std" => "#fff",
					"type" => "color"); 
					
$options[] = array( "name" =>  "Header Link Color",
					"desc" => "Pick a custom color for header links.",
					"id" => $shortname."_link_header",
					"std" => "#525252",
					"type" => "color");   
					
$options[] = array( "name" =>  "Header Background Color",
					"desc" => "Pick a custom color for header.",
					"id" => $shortname."_bg_header",
					"std" => "#fff",
					"type" => "color"); 
					
$options[] = array( "name" =>  "Header Borders Color",
					"desc" => "Pick a custom color for borders in header.",
					"id" => $shortname."_borders_header",
					"std" => "#ebebeb",
					"type" => "color"); 
					
$options[] = array( "name" => "Header Bottom Margin",
					"desc" => "Add plain number value. Measure is in pixels (px)",
					"id" => $shortname."_header_margin",
					"std" => "30",
					"type" => "text");
					

$options[] = array( "name" => "Logo - Top margin",
					"desc" => "Add plain number value. Measure is in pixels (px)",
					"id" => $shortname."_logo_margin",
					"std" => "25",
					"type" => "text");
					
$options[] = array( "name" => "Logo - Bottom margin",
					"desc" => "Add plain number value. Measure is in pixels (px)",
					"id" => $shortname."_logo_margin_bottom",
					"std" => "25",
					"type" => "text");
					
$options[] = array( "name" => "Logo - Width limitation",
					"desc" => "Add plain number value. Measure is in pixels (px)",
					"id" => $shortname."_logo_limit",
					"std" => "400",
					"type" => "text");
	
// footer styling	
	
$options[] = array( "name" => "Footer Styling",
					"type" => "heading");
					
$options[] = array( "name" => "Footer Font Style",
					"desc" => "Select the typography for Footer section <br />* semi-safe font <br />*** Google Webfonts (make sure that selected weight is supported!!).",
					"id" => $shortname."_font_sec",
					"std" => array('size' => '12','face' => 'Arial','style' => '400','color' => '#ccc'),
					"type" => "typography"); 
									
 
$options[] = array( "name" => "Footer Background Color",
					"desc" => "Pick a custom color for Footer section .",
					"id" => $shortname."_bg_footer",
					"std" => "#262626",
					"type" => "color"); 
					
$options[] = array( "name" =>  "Footer Nav Link Color",
					"desc" => "Pick a custom color for links in Footer section .",
					"id" => $shortname."_link_footer",
					"std" => "#999",
					"type" => "color");     

$options[] = array( "name" =>  "Footer Link Hover Color",
					"desc" => "Pick a custom color for links (hover) in Footer section .",
					"id" => $shortname."_hover_footer",
					"std" => "#fff",
					"type" => "color"); 
					
$options[] = array( "name" =>  "Footer Borders",
					"desc" => "Pick a custom color for Footer borders.",
					"id" => $shortname."_borders_footer",
					"std" => "#444",
					"type" => "color");


// other styling	
	
$options[] = array( "name" => "Other Styling",
					"type" => "heading");	
					
$options[] = array( "name" =>  "Elements Background Color",
					"desc" => "Pick a custom bg color for Main buttons, Spacial sections etc.",
					"id" => $shortname."_bg_elements",
					"std" => "#FF4200",
					"type" => "color");
					
$options[] = array( "name" =>  "Elements Text/Link Color",
					"desc" => "Pick a font color for Main buttons, Spacial sections etc.",
					"id" => $shortname."_text_elements",
					"std" => "#fff",
					"type" => "color");	
					
$options[] = array( "name" =>  "Elements Background Hover Color",
					"desc" => "Pick a custom color for Main buttons, Spacial sections etc.",
					"id" => $shortname."_hover_bg_elements",
					"std" => "#EF610F",
					"type" => "color");
					
$options[] = array( "name" =>  "Elements Text/Link Hover Color",
					"desc" => "Pick a font color for Main buttons, Spacial sections etc.",
					"id" => $shortname."_hover_text_elements",
					"std" => "#fff",
					"type" => "color");
			

// typography

$options[] = array( "name" => "Headings Typography",
					"type" => "heading");     

$options[] = array( "name" => "H1 Font Style",
					"desc" => "Select the typography you want for heading H1. <br />* semi-safe font <br />*** Google Webfonts (make sure that selected weight is supported!!).",
					"id" => $shortname."_font_h1",
					"std" => array('size' => '24','face' => 'Raleway','style' => '700','color' => '#222'),
					"type" => "typography");  

$options[] = array( "name" => "H2 Font Style",
					"desc" => "Select the typography you want for heading H2. <br />* semi-safe font <br />*** Google Webfonts (make sure that selected weight is supported!!).",
					"id" => $shortname."_font_h2",
					"std" => array('size' => '20','face' => 'Raleway','style' => '700','color' => '#3d3d3d'),
					"type" => "typography");  

$options[] = array( "name" => "H2: Block Titles + Blog Titles",
					"desc" => "Select the typography you want for heading H2 (on homepage, widgets). <br />* semi-safe font <br />*** Google Webfonts (make sure that selected weight is supported!!).",
					"id" => $shortname."_font_h2_widget",
					"std" => array('size' => '26','face' => 'Bitter','style' => '700','color' => '#3d3d3d'),
					"type" => "typography");  

$options[] = array( "name" => "H3 Font Style",
					"desc" => "Select the typography you want for heading H3 <br />* semi-safe font <br />*** Google Webfonts (make sure that selected weight is supported!!).",
					"id" => $shortname."_font_h3",
					"std" => array('size' => '14','face' => 'Open Sans','style' => '600','color' => '#222222'),
					"type" => "typography"); 

$options[] = array( "name" => "H4 Font Style",
					"desc" => "Select the typography you want for heading H4. <br />* semi-safe font <br />*** Google Webfonts (make sure that selected weight is supported!!).",
					"id" => $shortname."_font_h4",
					"std" => array('size' => '14','face' => 'Open Sans','style' => '400','color' => '#222222'),
					"type" => "typography");  
					
$options[] = array( "name" => "H5 Font Style",
					"desc" => "Select the typography you want for heading H5 and H6. <br />* semi-safe font <br />*** Google Webfonts (make sure that selected weight is supported!!).",
					"id" => $shortname."_font_h5",
					"std" => array('size' => '10','face' => 'Open Sans','style' => '400','color' => '#333'),
					"type" => "typography"); 
					
$options[] = array( "name" => "Labels (Meta) + H6 Font Style",
					"desc" => "Select the typography you want for heading H5 and H6. <br />* semi-safe font <br />*** Google Webfonts (make sure that selected weight is supported!!).",
					"id" => $shortname."_font_labels",
					"std" => array('size' => '12','face' => 'Source Sans Pro','style' => '400','color' => '#333'),
					"type" => "typography"); 


					

// post settings

$options[] = array( "name" => "Post Settings",
					"type" => "heading");    
			

$options[] = array( "name" => "Disable Featured Image",
					"desc" => "Check to disable featured image in single post",
					"id" => $shortname."_post_image_dis",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Disable Author Info and Next/Previous Post Section",
					"desc" => "Check to disable author section in single post",
					"id" => $shortname."_post_author_dis",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Disable Post Breadcrumbs",
					"desc" => "Check to disable breadcrumbs section in single post",
					"id" => $shortname."_post_breadcrumbs_dis",
					"std" => "false",
					"type" => "checkbox");
					
$options[] = array( "name" => "Disable Related Posts",
					"desc" => "Check to disable related posts section in single post",
					"id" => $shortname."_post_related_dis",
					"std" => "false",
					"type" => "checkbox");

		
// social networks	

$options[] = array( "name" => "Social Networks",
    				"type" => "heading");
			

$options[] = array( "name" => "Rss Feed",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_rss",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Facebook",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_fa",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Twitter",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_tw",
					"std" => "",
					"type" => "text");
					
$options[] = array( "name" => "Google+",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_googleplus",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Pinterest",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_pinterest",
					"std" => "",
					"type" => "text");
					

$options[] = array( "name" => "Instagram",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_instagram",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "You Tube",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_yo",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Vimeo",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_vi",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Tumblr",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_tu",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "500px",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_500px",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Flickr",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_fl",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "LinkedIn",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_li",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Foursquare",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_foursquare",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Dribbble",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_dribbble",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Skype",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_sk",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Stumbleupon",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_stumbleupon",
					"std" => "",
					"type" => "text");

$options[] = array( "name" => "Github",
					"desc" => "Enter full URL (http:// including)",
					"id" => $shortname."_socials_github",
					"std" => "",
					"type" => "text");




					
// footer
$options[] = array( "name" => "Footer",
                    "type" => "heading");
					
$options[] = array( "name" => "Enable Custom Footer (Left)",
					"desc" => "Activate to add the custom text below to the theme footer.",
					"id" => $shortname."_footer_left",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Custom Text (Left)",
					"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
					"id" => $shortname."_footer_left_text",
					"std" => "<p></p>",
					"type" => "textarea");
	
						
$options[] = array( "name" => "Enable Custom Footer (Right)",
					"desc" => "Activate to add the custom text below to the theme footer.",
					"id" => $shortname."_footer_right",
					"std" => "false",
					"type" => "checkbox");    

$options[] = array( "name" => "Custom Text (Right)",
					"desc" => "Custom HTML and Text that will appear in the footer of your theme.",
					"id" => $shortname."_footer_right_text",
					"std" => "<p></p>",
					"type" => "textarea");
					
					
// ads					
					
$options[] = array( "name" => "Static Ads",
					"type" => "heading");    

$options[] = array("name" => "Header Script Code",
					"desc" => "Enter your code here.",
					"id" => $shortname."_headeradscript",
					"std" => "",
					"type" => "textarea");  
					

$options[] = array("name" => "Header Image URL",
					"desc" => "Enter your image url here (http:// including).",
					"id" => $shortname."_headeradimg1",
					"std" => "",
					"type" => "text");   
	   
$options[] = array("name" => "Header Link URL",
					"desc" => "Enter link url here (http:// including).",
					"id" => $shortname."_headeradurl1",
					"std" => "#",
					"type" => "text");
					
					

					

$options[] = array("name" => "Post Script Code",
					"desc" => "Enter your code here.",
					"id" => $shortname."_postscript",
					"std" => "",
					"type" => "textarea");  

$options[] = array("name" => "Post Image URL",
					"desc" => "Enter your image url here (http:// including).",
					"id" => $shortname."_postsimg1",
					"std" => "",
					"type" => "text");   
	   
$options[] = array("name" => "Post Link URL",
					"desc" => "Enter link url here (http:// including).",
					"id" => $shortname."_postsurl1",
					"std" => "#",
					"type" => "text");


							                        
update_option('themnific_template',$options);      
update_option('themnific_themename',$themename);   
update_option('themnific_shortname',$shortname);

                                     
// Themnific Metabox Options
$themnific_metaboxes = array();

$themnific_metaboxes[] = array (	"name" => "image",
							"label" => "Image",
							"type" => "upload",
							"desc" => "Upload file here...");							
    
update_option('themnific_custom_template',$themnific_metaboxes);      

}

?>