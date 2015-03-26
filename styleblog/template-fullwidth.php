<?php
/*
Template Name: Full Width
*/
?>
<?php get_header(); ?>
    
<div id="core" class="container">

	<div id="content-inn" class="ghost top-fix">
            
        <h1 class="post entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
    
    	<div class="entry entryfull">
            
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <?php the_content(); ?>
            
            <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
            
            <?php endwhile; endif; ?>
            
       	</div>
        
	</div> 
    
</div> 
<div class="clearfix"></div>
    
<?php get_footer(); ?>