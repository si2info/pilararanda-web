<?php

/*-----------------------------------------------------------------------------------
- Default
----------------------------------------------------------------------------------- */

add_action( 'after_setup_theme', 'tmnf_theme_setup' );

function tmnf_theme_setup() {
	global $content_width;

	/* Set the $content_width for things such as video embeds. */
	if ( !isset( $content_width ) )
		$content_width = 772;

	/* Add theme support for automatic feed links. */
	add_editor_style();
	add_theme_support( 'post-formats', array( 'video','audio', 'gallery','link' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'woocommerce' );

	/* Add theme support for post thumbnails (featured images). */
	if (function_exists('add_theme_support')) {		
		add_theme_support('post-thumbnails');
		add_image_size('standard', 600, 400, true);
		add_image_size('main-slider', 1280, 700, true ); //(cropped)
		add_image_size('mag', 300, 280, true ); //(cropped)
		add_image_size('media', 478, 340, true ); //(cropped)
		add_image_size('horiz', 620, 460, true ); //(cropped)
		add_image_size('vert', 350, 385, true ); //(cropped)
		add_image_size('small', 320, 275, true ); //(cropped)
		add_image_size('tabs', 100, 90, true ); //(cropped)
	}
	
	function thumb_url(){
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 2100,2100 ));
	return $src[0];
	}

	/* Add your nav menus function to the 'init' action hook. */
	add_action( 'init', 'tmnf_register_menus' );

	/* Add your sidebars function to the 'widgets_init' action hook. */
	add_action( 'widgets_init', 'tmnf_register_sidebars' );
}

function tmnf_register_menus() {
	register_nav_menus(array(
			'magazine-menu' => "Magazine Menu",
			'bottom-menu' => "Footer Menu"
	));
}

function tmnf_register_sidebars() {
	
	register_sidebar(array('name' => 'Blog Sidebar','description' => 'Sidebar widget section (displayed on blog page and in "Blog" blocks)','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));
	
	register_sidebar(array('name' => 'Blog Sidebar (Sticky)','description' => 'Sidebar widget section (displayed on blog page)','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));
	
	register_sidebar(array('name' => 'Sidebar','description' => 'Sidebar widget section (displayed on posts, pages and archives)','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));
	
	register_sidebar(array('name' => 'Sidebar (Sticky)','description' => 'Sidebar widget section (displayed on posts, pages and archives)','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));
	
	//footer widgets
	register_sidebar(array('name' => 'Footer 1','description' => 'Widget section in footer - left','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));
	register_sidebar(array('name' => 'Footer 2','description' => 'Widget section in footer - center/left','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));
	register_sidebar(array('name' => 'Footer 3','description' => 'Widget section in footer - center/right','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));
	register_sidebar(array('name' => 'Footer 4','description' => 'Widget section in footer - right','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));

	//si2 widgets areas (HOME)

	register_sidebar(array('name' => 'SI2 Widget Area 1','description' => '','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));

	register_sidebar(array('name' => 'SI2 Widget Area 2','description' => '','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));

	register_sidebar(array('name' => 'SI2 Widget Area 3','description' => '','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));
	
	register_sidebar(array('name' => 'SI2 Widget Area 4','description' => '','before_widget' => '','after_widget' => '','before_title' => '<h2 class="widget">','after_title' => '</h2>'));

}

	
/*-----------------------------------------------------------------------------------
- Framework - Please refrain from editing this section 
----------------------------------------------------------------------------------- */

// Set path to Framework and theme specific functions
$functions_path = get_template_directory() . '/functions/';

// Theme specific functionality
require_once ($functions_path . 'theme-options.php'); 					// Options panel settings and custom settings
require_once ($functions_path . 'theme-actions.php');					// Theme actions & user defined hooks
require_once ($functions_path . 'admin-setup.php');						// Options panel variables and functions
require_once ($functions_path . 'admin-functions.php');					// Custom functions and plugins
require_once ($functions_path . 'admin-interface.php');					// Admin Interfaces
require_once ($functions_path . 'post-like/post-like.php');				// Post Like
require_once ($functions_path . 'admin-shortcodes.php' );				// Shortcodes

if (get_option('themnific_slider_gallery') <> "false") {require_once ($functions_path . 'theme-gallery.php'); } // Replace [gallery] shortcode with slider

//Add Custom Post Types
require_once ($functions_path . 'posttypes/post-metabox.php'); 			// custom meta box

	
/*-----------------------------------------------------------------------------------
- Enqueues scripts and styles for front end
----------------------------------------------------------------------------------- */ 

function tmnf_enqueue_style() {
	
	// Main stylesheet
	wp_enqueue_style( 'default_style', get_stylesheet_uri());
	
	// prettyPhoto css
	wp_enqueue_style('prettyPhoto', get_template_directory_uri() .	'/styles/prettyPhoto.css');
	
	// Font Social Media css			
	wp_enqueue_style('fontello', get_template_directory_uri() .	'/styles/fontello.css');
	
	// Font Awesome css	
	wp_enqueue_style('font-awesome.min', get_template_directory_uri() .	'/styles/font-awesome.min.css');

	// Desaturate css
	if (get_option('themnific_desaturate') <> "false") { 	
		wp_register_style('desaturate', get_stylesheet_directory_uri() .	'/styles/desaturate.css');
			wp_enqueue_style( 'desaturate');
	}
	
	// Custom stylesheet
	wp_enqueue_style('style-custom', get_stylesheet_directory_uri() .	'/style-custom.css');
	
	
}
add_action( 'wp_enqueue_scripts', 'tmnf_enqueue_style' );




// themnific custom css + chnage the order of how the sytlesheets are loaded, and overrides WooCommerce styles.
function tmnf_custom_order() {
	
	// place wooCommerce styles before our main stlesheet
	if ( class_exists('woocommerce') ) {
		wp_dequeue_style( 'woocommerce_frontend_styles' );
		wp_enqueue_style('woocommerce_frontend_styles', plugins_url() .'/woocommerce/assets/css/woocommerce.css');
	}
	
	wp_enqueue_style('woo-custom', get_stylesheet_directory_uri().	'/styles/woo-custom.css');
	wp_enqueue_style('mobile', get_stylesheet_directory_uri().'/style-mobile.css');
}
add_action('wp_enqueue_scripts', 'tmnf_custom_order');


function tmnf_enqueue_script() {

		// Load Common scripts	
		wp_enqueue_script('jquery');
		wp_enqueue_script('cssfix', get_template_directory_uri().'/js/cssfix.js');
		wp_enqueue_script('jquery.hoverIntent.minified', get_template_directory_uri().'/js/jquery.hoverIntent.minified.js','','', true);
		wp_enqueue_script('prettyPhoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js','','', true);
		wp_enqueue_script('superfish', get_template_directory_uri().'/js/superfish.js','','', true);
		wp_enqueue_script('jquery-scrolltofixed-min', get_template_directory_uri() .'/js/jquery-scrolltofixed-min.js','','', true);
		wp_enqueue_script('jquery.hoverIntent.minified', get_template_directory_uri().'/js/jquery.hoverIntent.minified.js','','', true);
		wp_enqueue_script('ownScript', get_template_directory_uri() .'/js/ownScript.js','','', true);
		
		
		// Singular comment script		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

}
	
add_action('wp_enqueue_scripts', 'tmnf_enqueue_script');

/*-----------------------------------------------------------------------------------
- Loads all the .php files found in /admin/widgets/ directory
----------------------------------------------------------------------------------- */

	$preview_template = _preview_theme_template_filter();

	if(!empty($preview_template)){
		$widgets_dir = WP_CONTENT_DIR . "/themes/".$preview_template."/functions/widgets/";
	} else {
    	$widgets_dir = WP_CONTENT_DIR . "/themes/".get_option('template')."/functions/widgets/";
    }
    
    if (@is_dir($widgets_dir)) {
		$widgets_dh = opendir($widgets_dir);
		while (($widgets_file = readdir($widgets_dh)) !== false) {
  	
			if(strpos($widgets_file,'.php') && $widgets_file != "widget-blank.php") {
				include_once($widgets_dir . $widgets_file);
			
			}
		}
		closedir($widgets_dh);
	}


/*-----------------------------------------------------------------------------------
- TGM_Plugin_Activation class.
----------------------------------------------------------------------------------- */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'tmnf_register_required_plugins' );
function tmnf_register_required_plugins() {

    $plugins = array(

        // SHORTCODES
        array(
            'name'      => 'Shortcodes Ultimate',
            'slug'      => 'shortcodes-ultimate',
            'required'  => true,
        ),

    );
    $config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'themnific' ),
            'menu_title'                      => __( 'Install Plugins', 'themnific' ),
            'installing'                      => __( 'Installing Plugin: %s', 'themnific' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'themnific' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'themnific' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'themnific' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'themnific' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'themnific' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'themnific' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'themnific' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'themnific' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'themnific' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'themnific' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'themnific' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'themnific' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'themnific' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'themnific' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

	
/*-----------------------------------------------------------------------------------
- Other theme functions
----------------------------------------------------------------------------------- */

// title filter
function tmnf_filter_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s','themnific' ), max( $paged, $page ) ) : '';

	return $filtered_title;
}
add_filter( 'wp_title', 'tmnf_filter_wp_title', 10, 2 );


// Use shortcodes in text widgets.
add_filter('widget_text', 'do_shortcode');

// Make theme available for translation
load_theme_textdomain( 'themnific', get_template_directory() . '/lang' );

// Shorten post title
function short_title($after = '', $length) {
	$mytitle = explode(' ', get_the_title(), $length);
	if (count($mytitle)>=$length) {
		array_pop($mytitle);
		$mytitle = implode(" ",$mytitle). $after;
	} else {
		$mytitle = implode(" ",$mytitle);
	}
	return $mytitle;
}

// icons - font awesome
function tmnf_icon() {
	
	if(has_post_format('audio')) {return '<i class="rad tmnf_icon icon-volume-up"></i>';
	}elseif(has_post_format('gallery')) {return '<i class="rad tmnf_icon icon-camera"></i>';	
	}elseif(has_post_format('link')) {return '<i class="rad tmnf_icon icon-link"></i>';			
	}elseif(has_post_format('quote')) {return '<i class="rad tmnf_icon icon-quote-right"></i>';		
	}elseif(has_post_format('video')) {return '<i class="rad tmnf_icon icon-play-circle2"></i>';
	} else {'';}	
	
}

function tmnf_icon_spec() {
	if(has_post_format('link')) {return '<i class="fa fa-sign-out"></i>';	
	} else {'';}
}

// icons ribbons - font awesome
function tmnf_ribbon() {
	if(has_post_format('video')) {return '<span class="ribbon video-ribbon"></span><span class="ribbon_icon"><i class="fa fa-play-circle"></i></span>';
	}elseif(has_post_format('audio')) {return '<span class="ribbon audio-ribbon"></span><span class="ribbon_icon"><i class="fa fa-microphone"></i></span>';
	}elseif(has_post_format('gallery')) {return '<span class="ribbon gallery-ribbon"></span><span class="ribbon_icon"><i class="fa fa-picture-o"></i></span>';
	}elseif(has_post_format('link')) {return '<span class="ribbon link-ribbon"></span><span class="ribbon_icon"><i class="fa fa-link"></i></span>';
	}elseif(has_post_format('image')) {return '<span class="ribbon image-ribbon"></span><span class="ribbon_icon"><i class="fa fa-camera"></i></span>';
	}elseif(has_post_format('quote')) {return '<span class="ribbon quote-ribbon"></span><span class="ribbon_icon"><i class="fa fa-quote-right"></i></span>';
	} else {}	
	
}



// link format
function tmnf_permalink() {
	$linkformat = get_post_meta(get_the_ID(), 'tmnf_linkss', true);
	if($linkformat) echo esc_url($linkformat); else the_permalink();
}

// ratings

function tmnf_rating() {
	$rinter = get_post_meta(get_the_ID(), 'tmnf_rating_main', true);
	if ($rinter > 0) {
	return  esc_html($rinter) .'<span>&#37;</span>';}
}

function tmnf_rating_raw() {
	$rinter = get_post_meta(get_the_ID(), 'tmnf_rating_main', true);
	if ($rinter > 0) {
	return  esc_html($rinter) .'<span>&#37;</span>';}
}

function tmnf_ratingbar() {
	$rinter = get_post_meta(get_the_ID(), 'tmnf_rating_main', true);
	if ($rinter > 0) {
	return  '<span class="ratingbar">
				<span class="overrating" style="width:'.esc_html($rinter ).'%"></span>
				<span class="overratingnr">'. esc_html($rinter) .'<span>&#37;</span></span>
			</span>';}
}

function tmnf_ratings() {
	$rinter = get_post_meta(get_the_ID(), 'tmnf_rating_main', true);
	if ($rinter >= 94 && $rinter <= 100) {return '	<span title="Rating: '.esc_html($rinter) .'&#37;" class="rating_star val-A">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
													</span>';}
													
	if ($rinter >= 85 && $rinter <= 94) {return '	<span title="Rating: '.esc_html($rinter) .'&#37;" class="rating_star val-B">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-o"></i>
													</span>';}
													
	if ($rinter >= 75 && $rinter <= 84) {return '	<span title="Rating: '.esc_html($rinter) .'&#37;" class="rating_star val-C">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</span>';}
													
	if ($rinter >= 65 && $rinter <= 74) {return '	<span title="Rating: '.esc_html($rinter) .'&#37;" class="rating_star val-C">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-o"></i>
														<i class="fa fa-star-o"></i>
													</span>';}
													
	if ($rinter >= 55 && $rinter <= 64) {return '	<span title="Rating: '.esc_html($rinter) .'&#37;" class="rating_star val-D">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</span>';}
													
	if ($rinter >= 45 && $rinter <= 54) {return '	<span title="Rating: '.esc_html($rinter) .'&#37;" class="rating_star val-D">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</span>';}

	if ($rinter >= 35 && $rinter <= 44) {return '	<span title="Rating: '.esc_html($rinter) .'&#37;" class="rating_star val-E">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</span>';}

	if ($rinter >= 25 && $rinter <= 34) {return '	<span title="Rating: '.esc_html($rinter) .'&#37;" class="rating_star val-F">
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</span>';}

	if ($rinter >= 15 && $rinter <= 24) {return '	<span title="Rating: '.esc_html($rinter) .'&#37;" class="rating_star val-G">
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</span>';}

	if ($rinter > 0 && $rinter <= 14) {return '	<span title="Rating: '.esc_html($rinter) .'&#37;" class="rating_star val-G">
														<i class="fa fa-star-half-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
														<i class="fa fa-star-o"></i>
													</span>';}

	if ($rinter = 0 ) {return '';}											
}


// new excerpt function

function tmnf_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
    add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
    add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
    }



// Old Shorten Excerpt text for use in theme
function themnific_excerpt($text, $chars = 1620) {
	$text = $text." ";
	$text = substr($text,0,$chars);
	$text = substr($text,0,strrpos($text,' '));
	$text = $text."";
	return $text;
}

function trim_excerpt($text) {
     $text = str_replace('[', '', $text);
     $text = str_replace(']', '', $text);
     return $text;
    }
add_filter('get_the_excerpt', 'trim_excerpt');





// automatically add prettyPhoto rel attributes to embedded images
function gallery_prettyPhoto ($content) {
	return str_replace("<a", "<a rel='prettyPhoto[gallery]'", $content);
}

function insert_prettyPhoto_rel($content) {
	$pattern = '/<a(.*?)href="(.*?).(bmp|gif|jpeg|jpg|png)"(.*?)>/i';
  	$replacement = '<a$1href="$2.$3" rel=\'prettyPhoto\'$4>';
	$content = preg_replace( $pattern, $replacement, $content );
	return $content;
}
add_filter( 'the_content', 'insert_prettyPhoto_rel' );
add_filter( 'wp_get_attachment_link', 'gallery_prettyPhoto');


// function to display number of posts.
function tmnf_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count.'';
}

// function to count views.
function tmnf_count_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views', 'themnific');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo tmnf_post_views(get_the_ID());
    }
}



// pagination
function tmnf_pagination( $args = array() ) {
global $wp_rewrite, $wp_query;

/* If there's not more than one page, return nothing. */
if ( 1 >= $wp_query->max_num_pages )
return;

/* Get the current page. */
$current = ( get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1 );

/* Get the max number of pages. */
$max_num_pages = intval( $wp_query->max_num_pages );

/* Get the pagination base. */
$pagination_base = $wp_rewrite->pagination_base;

/* Set up some default arguments for the paginate_links() function. */
$defaults = array(
'base' => add_query_arg( 'paged', '%#%' ),
'format' => '',
'total' => $max_num_pages,
'current' => $current,
'prev_next' => true,
//'prev_text' => __( '&laquo; Previous' ), // This is the WordPress default.
//'next_text' => __( 'Next &raquo;' ), // This is the WordPress default.
'show_all' => false,
'end_size' => 1,
'mid_size' => 1,
'add_fragment' => '',
'type' => 'plain',

// Begin loop_pagination() arguments.
'before' => '<nav class="loop-pagination">',
'after' => '</nav>',
'echo' => true,
);

/* Add the $base argument to the array if the user is using permalinks. */
if ( $wp_rewrite->using_permalinks() && !is_search() )
$defaults['base'] = user_trailingslashit( trailingslashit( get_pagenum_link() ) . "{$pagination_base}/%#%" );

/* Allow developers to overwrite the arguments with a filter. */
$args = apply_filters( 'loop_pagination_args', $args );

/* Merge the arguments input with the defaults. */
$args = wp_parse_args( $args, $defaults );

/* Don't allow the user to set this to an array. */
if ( 'array' == $args['type'] )
$args['type'] = 'plain';

/* Get the paginated links. */
$page_links = paginate_links( $args );

/* Remove 'page/1' from the entire output since it's not needed. */
$page_links = preg_replace(
array(
"#(href=['\"].*?){$pagination_base}/1(['\"])#", // 'page/1'
"#(href=['\"].*?){$pagination_base}/1/(['\"])#", // 'page/1/'
"#(href=['\"].*?)\?paged=1(['\"])#", // '?paged=1'
"#(href=['\"].*?)&\#038;paged=1(['\"])#" // '&#038;paged=1'
),
'$1$2',
$page_links
);

/* Wrap the paginated links with the $before and $after elements. */
$page_links = $args['before'] . $page_links . $args['after'];

/* Allow devs to completely overwrite the output. */
$page_links = apply_filters( 'loop_pagination', $page_links );

/* Return the paginated links for use in themes. */
if ( $args['echo'] )
echo $page_links;
else
return $page_links;
}



//Breadcrumbs
function tmnf_breadcrumbs() {
	if (!is_home()) {
		echo '<a href="'. home_url().'">';
		echo '<i class="icon-home"></i> ';
		echo "</a> <i class='fa fa-angle-right'></i>
 ";
		if (is_category() || is_single()) {
		the_category(', ');
		if (is_single()) {
		echo " <i class='fa fa-angle-right'></i> ";
	echo short_title('...', 16);
	}
	} elseif (is_page()) {
	echo the_title();}
	}
}


function attachment_toolbox($size = thumbnail) {
	if($images = get_children(array(
		'post_parent'    => get_the_ID(),
		'post_type'      => 'attachment',
		'numberposts'    => -1, // show all
		'post_status'    => null,
		'post_mime_type' => 'image',
	))) {
		foreach($images as $image) {
			$attimg   = wp_get_attachment_image($image->ID,$size);
			$atturl   = wp_get_attachment_url($image->ID);
			$attlink  = get_attachment_link($image->ID);
			$postlink = get_permalink($image->post_parent);
			$atttitle = apply_filters('the_title',$image->post_title);

			echo '<p><strong>wp_get_attachment_image()</strong><br />'.$attimg.'</p>';
			echo '<p><strong>wp_get_attachment_url()</strong><br />'.$atturl.'</p>';
		}
	}
}

//Featured image in RSS feeds
function tmnf_image_in_rss($content)
{
    global $post;
    if (has_post_thumbnail($post->ID))
    {
        $content = get_the_post_thumbnail($post->ID, 'small', array('style' => 'margin-bottom:10px;')) . $content;
    }
    return $content;
}
add_filter('the_excerpt_rss', 'tmnf_image_in_rss');
add_filter('the_content_feed', 'tmnf_image_in_rss');


// meta sections
function tmnf_meta_counter() {
	?>    
	<p class="meta counter">
	<span class="likes"><?php echo getPostLikeLink( get_the_ID() ); ?></span>
    <span class="views">
    <!-- mfunc tmnf_post_views($post_id); --><!-- /mfunc -->
	<i class="icon-eye"></i> <?php echo tmnf_post_views(get_the_ID()); ?>
    </span>
    </p>
    <?php
}

function tmnf_meta_cat() {
	?>    
	<p class="meta cat tranz">
		<?php the_category(', ') ?>
    </p>
    <?php
}

function tmnf_meta_date() {
	?>    
	<p class="meta date tranz"> 
        <?php the_time(get_option('date_format')); ?>
    </p>
    <?php
}

function tmnf_meta() { ?>   
	<p class="meta">
		<?php the_time(get_option('date_format')); ?> &bull; 
		<?php the_category(', ') ?>
    </p>
<?php }

function tmnf_meta_full() { ?>    
	<p class="meta meta_full">
		<span class="post-date updated"><i class="icon-clock"></i> <?php the_time(get_option('date_format')); ?></span>
      	<span class="comm"><i class="icon-chat"></i> <?php comments_popup_link( __('Comments (0)', 'themnific'), __('Comments (1)', 'themnific'), __('Comments (%)', 'themnific')); ?></span>
		<span class="categs"><i class="icon-folder-empty"></i> <?php the_category(', ') ?></span>
        <span class="meta likes"><?php echo getPostLikeLink( get_the_ID() ); ?></span>
    </p>
<?php
}

function tmnf_meta_more() {
	?>    
	<p class="meta_more">
    		<a href="<?php tmnf_permalink() ?>"><?php _e('Read article','themnific');?> <i class="fa fa-long-arrow-right"></i></a>
    </p>
    <?php
}

// get featured image on posts screen  
function tmnf_get_featured_image($post_ID) {  
    $post_thumbnail_id = get_post_thumbnail_id($post_ID);  
    if ($post_thumbnail_id) {  
        $post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail');  
        return $post_thumbnail_img[0];  
    }  
} 
    // ADD NEW COLUMN  
    function tmnf_columns_head($defaults) {  
        $defaults['featured_image'] = 'Featured Image';  
        return $defaults;  
    }  
    // SHOW THE FEATURED IMAGE  
    function tmnf_columns_content($column_name, $post_ID) {  
        if ($column_name == 'featured_image') {  
            $post_featured_image = tmnf_get_featured_image($post_ID);  
            if ($post_featured_image) {  
                echo '<img style=" width:100px;" src="' . $post_featured_image . '" />';  
            }  
        }  
    }  
add_filter('manage_posts_columns', 'tmnf_columns_head');  
add_action('manage_posts_custom_column', 'tmnf_columns_content', 10, 2); 

	

// Walker menu
class tmnf_description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) 
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '';
           $append = '';
           $description  = ! empty( $item->description ) ? '<div class="sub">'.esc_attr( $item->description ).'</div>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= '</a>';
            $item_output .= $description.$args->link_after;
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

add_filter('wp_nav_menu', 'do_menu_shortcodes');
function do_menu_shortcodes( $menu ){
        return do_shortcode( $menu );
} 



//author box - additional links
function tmnf_new_contactmethods( $contactmethods ) {
	
	$contactmethods['twitter'] = 'Twitter';
	$contactmethods['facebook'] = 'Facebook';
	$contactmethods['google'] = 'Google+';
	$contactmethods['linkedin'] = 'Linked in';
	$contactmethods['pinterest'] = 'Pinterest';
	$contactmethods['instagram'] = 'Instagram';
	$contactmethods['google'] = 'Google+';
	$contactmethods['link'] = 'Any Link';
	
	return $contactmethods;
}
add_filter('user_contactmethods','tmnf_new_contactmethods',10,1);


/////////
// woocommerce
/////////
 
	
// limit related na upsells posts
	
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_upsells', 15 );
 
if ( ! function_exists( 'woocommerce_output_upsells' ) ) {
function woocommerce_output_upsells() {
	woocommerce_upsell_display( 3,3 ); // Display 3 products in rows of 3
}
}

	
/*-----------------------------------------------------------------------------------
- SI2 función eventos
----------------------------------------------------------------------------------- */ 
//Función para recuperar eventos ordenados por fecha de inicio y dependiendo del valor de comparacion se muestran los eventos pasados o los eventos siguientes.
//El parametro $consulta determina lo que devuelve la función. Si es false devuelve el vector de id de los eventos y si es true devuelve la consulta.
function get_array_events($npost,$comparacion,$consulta){
	if ($npost!=-1){
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;
	}else{
		$paged=1;
	}
	$args = array(
			'post_type' => 'eventos',
			'post_status' => 'publish',
			'posts_per_page' => $npost,
			'paged' => $paged,
			'meta_key' => 'entidades_grinugr_date_ini',
						   
			'meta_value' => date("Y-m-d"),
			'meta_compare' => $comparacion,
			'orderby' => 'meta_value',
			'order' => 'DESC',
						   						   
	);
	/*$args = array(
	   'post_type' => 'eventos',
	   'post_status' => 'publish',
	   'posts_per_page' => 3,
	   'paged' => get_query_var('paged'),
	   'meta_key' => 'entidades_grinugr_date_ini',
	   'meta_value' =>  date("Y-m-d"),
	   'meta_compare' => '>=',
	   'orderby' => 'meta_value',
	   'order' => 'DESC',
	   'meta_query'   => array
					(
						array
						(
							'key'     => 'entidades_grinugr_date_ini',
							'meta_value' => $value,
							'value'    => date("Y-m-d"),
							'compare' => '>=',
							'type' => 'CHAR',
						)
					)
	   
	);*/
	$my_query = null;
	$my_query = new WP_Query($args);
	if( $my_query->have_posts() ) {
	
		if ($consulta==false) {
		
			while ($my_query->have_posts()) : $my_query->the_post(); 
			  
				$events_array[]=get_the_ID(); //guardamos los Id de los eventos
				
			endwhile;
			wp_reset_query();
			return ($events_array);
		}else{
			return $my_query;
		}
	}
		
	
}


?>