<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div id="core" class="container">

    <div id="content" class="eightcol first ghost">
    
        <div id="content-inn">
    
		<div <?php post_class(); ?>>
        
        	<h1 class="post entry-title" itemprop="headline"><?php the_title(); ?></a></h1>

                <div class="entry">
                    
                    <?php the_content(); ?>
                    
                    <?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','themnific') . '</span>', 'after' => '</div>' ) ); ?>
                    
                    <?php the_tags( '<p class="tagssingle">','',  '</p>'); ?>
                
                </div>       
                        
                <div class="clearfix"></div> 
                  
                <?php comments_template(); ?>

            </div>
            
		</div>


	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria','themnific');?>.</p>

	<?php endif; ?>

                <div style="clear: both;"></div>

	</div><!-- #content -->

    <?php get_sidebar();?>
        
</div>

<?php get_footer(); ?>