<?php get_header();  

tmnf_count_views(get_the_ID());
	
?>

<div id="core" class="container">
    
    <div <?php post_class(); ?>  itemscope itemprop="blogPost" itemtype="http://schema.org/Article"> 
    
        <div id="content" class="eightcol first ghost">
        
        	<div id="content-inn">
        
                <?php get_template_part('single-content-eventos' ); ?>
          	
            </div>
               
        </div><!-- #content -->
        
        <?php get_sidebar(); ?>
    
    </div>

</div><!-- #core -->
    
<?php get_footer(); ?>