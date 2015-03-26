<?php get_header(); ?> 
    
<div id="core" class="container">

    <div id="content" class="eightcol first ghost">
    
        <div id="content-inn">

            <h1 class="post entry-title" itemprop="headline"><?php _e('Nothing found here','themnific');?></h1>
            
            <div class="errorentry entry">
            
            	<h4><?php _e('Perhaps You will find something interesting from these lists...','themnific');?></h4>
            
            	<div class="hrline clearfix"></div>
			
				<?php get_template_part('/includes/uni-404-content');?>
            
            </div>
        
        </div>
            
    </div><!-- #content -->

	<?php get_sidebar();?>
        
</div>
<?php get_footer(); ?>
