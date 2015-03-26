<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="utf-8" />
<title><?php wp_title( '|', true, 'right' ); ?></title>

<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php themnific_head(); ?>

<?php wp_head(); ?>

</head>

     
<body <?php if (get_option('themnific_upper') == 'false' ){ body_class( );} else body_class('upper' ) ?>>

<div class="curtain tranz">
	<?php get_search_form();?>
	<a class='curtainclose rad' href="#" ><i class="fa fa-times"></i></a>
</div>

<?php get_template_part('/includes/mag-headad');  ?>

<div class="clearfix"></div>

<div id="header" itemscope itemtype="http://schema.org/WPHeader">

	<div class="container_alt">
        
        <div id="titles">
    
            <h1>
            
                <?php if(get_option('themnific_logo')) { ?>
                                
                    <a class="logo" href="<?php echo home_url(); ?>/">
                    
                        <img src="<?php echo esc_url(get_option('themnific_logo'));?>" alt="<?php bloginfo('name'); ?>"/>
                            
                    </a>
                        
                <?php } 
                        
                    else { ?> <a href="<?php echo home_url(); ?>/"><?php bloginfo('name');?></a>
                        
                <?php } ?>	
            
            </h1>
        
        </div>
    	
        <div class="righthead">

           	<?php 
            if (get_option('themnific_topsocial_dis') == 'true' );
            else {
            get_template_part('/includes/uni-social' );
			} ?>
		
            <?php 
            if (get_option('themnific_topsearch_dis') == 'true' );
            else {?>
            <a class='searchSubmit rad' href="#" ><i class="fa fa-search"></i></a>
        	<?php } ?>

		<img src="/wp-content/themes/styleblog/images/logo_ugr.png">
            
      	</div>     
         
		<div class="clearfix"></div>

	</div><!-- end .container  -->
          
</div><!-- end #header  -->

<div class="clearfix"></div>

<div class="wrapper ghost">
        
    <a id="navtrigger" class="rad" href="#"><?php _e('MENU','themnific');?></a>
    
    <nav id="navigation" itemscope itemtype="http://schema.org/SiteNavigationElement"> 
    
        <?php get_template_part('/includes/mag-navigation'); ?>
        
		<? // ----- modificaciones menú SI2--------------------------- ?>
		<style>
			ul.social-menu-enmenu {
				margin: 0 !important;
				float: right !important;
				position: absolute !important;
				top: 7px !important;
				/*right: 15px !important;			*/
				right: 10px !important;			
			}
			.socialenmenu {display: none;}

			ul.social-menu li a {color: #222;}

			.scroll-to-fixed-fixed .socialenmenu {display: inline !important;}
		</style>

	        <div class="socialenmenu">
				<ul class="social-menu social-menu-enmenu">
				<li class="sprite-facebook"><a class="mk-social-facebook" title="Facebook" href="https://www.facebook.com/pages/Pilar-Aranda-UGR/1434174016875703?fref=ts"><i class="fa fa-facebook"></i></a></li>
				<li class="sprite-twitter"><a class="mk-social-twitter-alt" title="Twitter" href="https://twitter.com/PilarArandaUGR"><i class="fa fa-twitter"></i></a></li>
				<li class="sprite-google"><a class="mk-social-googleplus" title="Google+" href="https://plus.google.com/116561996100447462707/posts/p/pub?hl=es"><i class="fa fa-google-plus"></i></a></li>
				</ul>	      	
	      	</div> 
		<? // ------------------------------------------------------- ?>

    </nav>
    
    

    <div class="container">
        
	<?php 
	
	if (!is_front_page()) {
		if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} 
	}
	
	?>    