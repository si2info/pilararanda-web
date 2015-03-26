<?php

/*-----------------------------------------------------------------------------------*/
/* AQUA */
/*-----------------------------------------------------------------------------------*/

//definitions
if(!defined('AQPB_VERSION')) define( 'AQPB_VERSION', '1.1.2' );
if(!defined('AQPB_PATH')) define( 'AQPB_PATH', get_template_directory() . '/functions/aqua/' );
if(!defined('AQPB_DIR')) define( 'AQPB_DIR', get_template_directory() . '/functions/aqua/' );

$aqua_path = get_template_directory() . '/functions/aqua/';

//required functions & classes
require_once ($aqua_path . 'functions/aqpb_config.php');
require_once ($aqua_path . 'functions/aqpb_blocks.php');
require_once ($aqua_path . 'classes/class-aq-page-builder.php');
require_once ($aqua_path . 'classes/class-aq-block.php');
require_once ($aqua_path . 'functions/aqpb_functions.php');

// default blocks
require_once(AQPB_PATH . 'blocks/aq-text-block.php');
require_once(AQPB_PATH . 'blocks/aq-clear-block.php');
require_once(AQPB_PATH . 'blocks/aq-widgets-block.php');
require_once(AQPB_PATH . 'blocks/aq-home-mag.php');
require_once(AQPB_PATH . 'blocks/aq-home-mag-alt.php');
require_once(AQPB_PATH . 'blocks/aq-home-mag-2cats.php');
require_once(AQPB_PATH . 'blocks/aq-home-media.php');
require_once(AQPB_PATH . 'blocks/aq-home-blog.php');
require_once(AQPB_PATH . 'blocks/aq-home-blog-infinite.php');
require_once(AQPB_PATH . 'blocks/aq-masonry-block.php');
// custom blocks
//require_once(AQPB_PATH . 'blocks/aq-3-column-block.php');
//require_once(AQPB_PATH . 'blocks/aq-2-column-block.php');
//require_once(AQPB_PATH . 'blocks/aq-2-3-column-block.php');
require_once(AQPB_PATH . 'blocks/aq-flexslider-block.php');
require_once(AQPB_PATH . 'blocks/aq-flexcarousel-block.php');
require_once(AQPB_PATH . 'blocks/aq-ads-block.php');

//register default blocks
aq_register_block('AQ_Text_Block');
aq_register_block('AQ_Clear_Block');
aq_register_block('AQ_Widgets_Block');
aq_register_block('AQ_Home_Mag');
aq_register_block('AQ_Home_Mag_Classic');
aq_register_block('AQ_Home_Mag_2Cats');
aq_register_block('AQ_Home_Media');
aq_register_block('AQ_Home_Blog');
aq_register_block('AQ_Home_Blog_Infinite');
aq_register_block('AQ_Masonry_Block');

//si2 register custom block
require_once(AQPB_PATH . 'blocks/aq-home-si2-agenda.php');
aq_register_block('AQ_Home_si2_agenda');



// register custom blocks
//aq_register_block('AQ_3_Column_Block');
//aq_register_block('AQ_2_Column_Block');
//aq_register_block('AQ_2_3_Column_Block');
aq_register_block('AQ_Flexslider_Block');
aq_register_block('AQ_Flexcarousel_Block');
aq_register_block('AQ_Ads_Block');

//fire up page builder
$aqpb_config = aq_page_builder_config();
$aq_page_builder = new AQ_Page_Builder($aqpb_config);
if(!is_network_admin()) $aq_page_builder->init();



/*-----------------------------------------------------------------------------------*/
/* Theme Version & Hooks */
/*-----------------------------------------------------------------------------------*/

function themnific_version(){
    
    $theme_data = wp_get_theme();
	
}
add_action('wp_head','themnific_version');

function themnific_head() { do_action( 'themnific_head' ); }					
function themnific_foot() { do_action( 'themnific_foot' ); }

/*-----------------------------------------------------------------------------------*/
/* Output HEAD - themnific_wp_head */
/*-----------------------------------------------------------------------------------*/
if ( ! function_exists( 'themnific_wp_head' ) ) {
	function themnific_wp_head() {

		do_action( 'themnific_wp_head_before' );

		// Favicon
		if(get_option('themnific_custom_favicon') != '') {
	        echo '<link rel="shortcut icon" href="'.  get_option('themnific_custom_favicon')  .'"/>'."\n";
	    }   

		// Output shortcodes stylesheet
		if ( function_exists( 'tmnf_shortcode_stylesheet' ) )
			tmnf_shortcode_stylesheet();
			

			
		do_action( 'themnific_wp_head_after' );
		
		

	} // End themnific_wp_head()
}



add_action( 'wp_head', 'themnific_wp_head', 10 );


/*-----------------------------------------------------------------------------------*/
/* Get the style path currently selected */
/*-----------------------------------------------------------------------------------*/
function fiftytwo_style_path() {
    $style = $_REQUEST[style];
    if ($style != '') {
        $style_path = $style;
    } else {
        $stylesheet = get_option('themnific_alt_stylesheet');
        $style_path = str_replace(".css","",$stylesheet);
    }
    if ($style_path == "default")
      echo 'images';
    else
      echo 'styles/'.$style_path;
}


/*-----------------------------------------------------------------------------------*/
/* Show analytics code in footer */
/*-----------------------------------------------------------------------------------*/


function themnific_analytics() {
$output = get_option('themnific_google_analytics');
if ( $output <> "" ) {
	?>
	<script type="text/javascript">
		var _gaq = _gaq || [];
			_gaq.push(['_setAccount', '<?php echo esc_attr($output); ?>']);
			_gaq.push(['_trackPageview']);
		(function() {
			var ga = document.createElement('script'); 
				ga.type = 'text/javascript'; 
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<?php 
}
}

add_action('wp_footer','themnific_analytics');


/*-----------------------------------------------------------------------------------*/
/* THE END */
/*-----------------------------------------------------------------------------------*/
?>