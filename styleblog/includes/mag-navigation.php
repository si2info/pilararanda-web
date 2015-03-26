<?php
if ( function_exists('has_nav_menu') && has_nav_menu('magazine-menu') ) {
	
	$walker = new tmnf_description_walker;
	wp_nav_menu( array( 'depth' => 4, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_class' => 'nav', 'menu_id' => 'main-nav' , 'theme_location' => 'magazine-menu','walker' => $walker ) );
} else {
?>
    <ul id="main-nav" class="nav tranz">
    
        <?php wp_list_pages('sort_column=menu_order&depth=4&title_li=&'); ?>
        
    </ul>
<?php } ?>

	  