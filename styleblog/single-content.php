<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
<?php 
	$video_input = get_post_meta($post->ID, 'tmnf_video', true);
	$audio_input = get_post_meta($post->ID, 'tmnf_audio', true);
	$single_featured = get_post_meta($post->ID, 'tmnf_single_featured', true);
?>

<?php tmnf_meta_full() ?>

<h1 class="entry-title" itemprop="headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>



<div class="entryhead item">

	<?php 	
    
		if(has_post_format('video')){

			get_template_part('/functions/theme-video');
		
		}elseif(has_post_format('audio')){
		}elseif(has_post_format('gallery')){
			if ($single_featured == 'Yes')  {
			   the_post_thumbnail('standard',array('itemprop' => 'image','class' => 'standard grayscale grayscale-fade'));  
			} else;	
		} else {
			if (get_option('themnific_post_image_dis') == 'true' );
			else
			   the_post_thumbnail('standard',array('itemprop' => 'image','class' => 'standard grayscale grayscale-fade'));  
		}
		
    ?>

</div>

<div class="clearfix"></div>

<div class="entry" itemprop="text">
      
    <?php 
	
		// rating
		$rating = get_post_meta($post->ID, 'tmnf_rating_main', true);
		if($rating) { get_template_part( '/includes/mag-rating' );  } else { };	
	
		the_content(); 
		
		wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:','themnific') . '</span>', 'after' => '</div>' ) );
	
	?>
    
    <div class="clearfix"></div>
    
</div><!-- end .entry -->

	<?php 
	
		get_template_part('single-info');
		
		get_template_part('/includes/mag-postad');
		
		comments_template(); 
		
	?>

<?php endwhile; else: ?>

	<p><?php _e('Sorry, no posts matched your criteria','themnific');?>.</p>

<?php endif; ?>