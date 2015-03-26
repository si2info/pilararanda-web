<?php
/**
 * Aqua Page Builder Config
 *
 * This file handles various configurations
 * of the page builder page
 *
 */
function aq_page_builder_config() {

	$config = array(); //initialise array
	
	/* Page Config */
	$config['menu_title'] = __('Page Builder', 'vergo');
	$config['page_title'] = __('Page Builder', 'vergo');
	$config['page_slug'] = __('aq-page-builder', 'vergo');
	
	/* This holds the contextual help text - the more info, the better.
	 * HTML is of course allowed in all of its glory! */
	$config['contextual_help'] = 
		'<p>' . __('The page builder allows you to create custom page templates which you can later use for your pages.', 'vergo') . '<p>' .
		'<p>' . __('To use the page builder, start by adding a new template. You can drag and drop the blocks on the left into the building area on the right of the screen. Each block has its own unique configuration which you can manually configure to suit your needs', 'vergo') . '<p>' .
		'<p>' . __('Please refer to the', 'vergo') . '<a href="http://aquagraphite.com/api/documentation/aqua-page-builder" target="_blank" alt="Aqua Page Builder Documentation">'. __(' documentation page ', 'vergo') . '</a>'. __('for more information on how to use this feature.', 'vergo') . '<p>';
	
	/* Debugging */
	$config['debug'] = false;
	
	return $config;
	
}