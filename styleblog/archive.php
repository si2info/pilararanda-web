<?php get_header(); ?>

<div class="my-builder container">

	<div id="content" class="eightcol first">
    
            <?php if (is_category()) { ?>
    			<h2 class="archiv"><?php single_cat_title(); ?><br/>
    			<span><?php _e('Category','themnific');?></span></h2>     
        
            <?php } elseif (is_day()) { ?>
            
    			<h2 class="archiv"><?php the_time( get_option( 'date_format' ) ); ?><br/>
    			<span><?php _e('Archive','themnific');?></span></h2>  

            <?php } elseif (is_month()) { ?>
            
    			<h2 class="archiv"><?php the_time( 'F, Y' ); ?><br/>
    			<span><?php _e('Archive','themnific');?></span></h2>  

            <?php } elseif (is_year()) { ?>
            
    			<h2 class="archiv"><?php the_time( 'Y' ); ?><br/>
    			<span><?php _e('Archive','themnific');?></span></h2>  

            <?php } elseif (is_author()) { ?>
            
    			<h2 class="archiv"><?php _e( 'Author', 'themnific' ); ?></h2>  
                
            <?php } elseif (is_tag()) { ?>
            
    			<h2 class="archiv"><?php echo single_tag_title( '', true); ?><br/>
    			<span><?php _e('Tag Archive','themnific');?></span></h2>  
            
            <?php } ?>

          		<div class="blogger">

					<?php if ( have_posts() ) : ?>	

					<?php while (have_posts()) : the_post(); ?>
            
						<?php get_template_part('/post-types/home-normal'); ?>
                    
                    <?php endwhile; ?>   <!-- end post -->
                    
     			</div><!-- end latest posts section-->
      
              <div class="pagination"><?php tmnf_pagination('&laquo;', '&raquo;'); ?></div>
  
              	<?php else : ?>
  
                  <h1>Sorry, no posts matched your criteria.</h1>
                  <?php get_search_form(); ?><br/>
                  
                  </div>

			<?php endif; ?>
    
    </div><!-- end #core .eightcol-->

    <?php get_sidebar(); ?>  

</div><!-- #core -->

<div class="clearfix"></div>

<?php get_footer(); ?>