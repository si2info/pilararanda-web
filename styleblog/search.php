<?php get_header(); ?>

<div class="my-builder container">

	<div id="content" class="eightcol first">
            
        <h2 class="archiv"><?php echo $s; ?><br/>
    	<span><?php _e('Search Results','themnific');?> </span></h2> 
            
        <div class="fix"></div>
     

		<?php if ( have_posts() ) : ?>	
    
            <div class="blogger">
          
                <?php while (have_posts()) : the_post(); ?>
        
                    <?php get_template_part('/post-types/home-normal'); ?>
                        
                <?php endwhile; ?><!-- end post -->
                    
            </div><!-- end latest posts section--> 
          
            <div class="clearfix"></div>
          
          
                  <div class="pagination"><?php tmnf_pagination('&laquo;', '&raquo;'); ?></div>
      
                  <?php else : ?>
          
                    <div id="core" class="container ghost">
                            <h1 class="post entry-title" itemprop="headline"><?php _e('Sorry, no posts matched your criteria.','themnific');?></h1>
                            
                        <div class="entry">
                             <?php get_search_form(); ?><br/>
                        </div>
                    </div>
    
        <?php endif; ?>
    
    </div><!-- end #core .eightcol-->

    <?php get_sidebar(); ?>  

</div><!-- #core -->

<div class="clearfix"></div>

<?php get_footer(); ?>