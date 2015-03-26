<?php get_header(); ?>

<div class="my-builder container">

	<div id="content" class="eightcol first">

          <div class="blogger">
          
                	<?php
						if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');
						} else if ( get_query_var('page') ) {
							$paged = get_query_var('page');
						} else {
							$paged = 1;
						}
						query_posts( array( 'post_type' => 'post', 'paged' => $paged ) );
					?>
					<?php if (have_posts()) : ?>
                                        
                    <?php while (have_posts()) : the_post(); ?>
            
						<?php get_template_part('/post-types/home-normal'); ?>
                            
					<?php endwhile; ?><!-- end post -->
                    
           	</div><!-- end latest posts section-->
            
            <div class="clearfix"></div>

					<div class="pagination"><?php tmnf_pagination('&laquo;', '&raquo;'); ?></div>

					<?php else : ?>
			

                        <h1>Sorry, no posts matched your criteria.</h1>
                        <?php get_search_form(); ?><br/>
					<?php endif; ?>
    
    </div><!-- end #core .eightcol-->

    <div id="sidebar"  class="fourcol">
        
        <div class="widgetable">

            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>
            <?php endif; ?>
        
        </div>
        
        <div class="widgetable widgetable_sticky woocommerce">

            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar (Sticky)") ) : ?>
            <?php endif; ?>
        
        </div>
           
    </div><!-- #sidebar --> 

</div><!-- #core -->

<div class="clearfix"></div>

<?php get_footer(); ?>