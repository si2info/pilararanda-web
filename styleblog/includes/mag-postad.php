<?php $single_featured = get_post_meta($post->ID, 'tmnf_single_banner', true);?>

<?php if($single_featured) { ?>  
    
        <div class="postad">
        
            <a href="<?php echo esc_url(get_post_meta($post->ID, 'tmnf_single_target', true)); ?>"><img src="<?php echo esc_url($single_featured);?>" alt="" /></a>
            
        </div>
        
<?php } else {

	 if(get_option('themnific_postscript')) { 
     
        echo '<div class="postad">';
     
        echo htmlspecialchars_decode(get_option('themnific_postscript'));
    
        echo '</div>';
    
    } elseif(get_option('themnific_postsimg1')) { ?> 
    
        <div class="postad">
        
            <a href="<?php echo esc_url(get_option('themnific_postsurl1'));?>"><img src="<?php echo esc_url(get_option('themnific_postsimg1'));?>" alt="" /></a>
            
        </div>
        
    <?php } else {} 
	
} ?>