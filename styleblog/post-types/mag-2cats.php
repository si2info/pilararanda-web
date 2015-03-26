          	<div <?php post_class('item normal tranz'); ?>>
            
            	<?php echo tmnf_ratings();?>
                
				<?php 
                    $video_input = get_post_meta($post->ID, 'tmnf_video', true);
                    $audio_input = get_post_meta($post->ID, 'tmnf_audio', true);
                    $single_featured = get_post_meta($post->ID, 'tmnf_single_featured', true);
                ?>
                
				<?php 	
                    
                    if(has_post_format('video')){
                    
                        get_template_part('/functions/theme-video');
                    
                    }elseif(has_post_format('audio')){
                    } else {?>

						<?php if ( has_post_thumbnail()){ ?>
                        
                            <div class="imgwrap">
                                
                                <a class="imglink" href="<?php tmnf_permalink(); ?>">
                                
                                    <?php the_post_thumbnail( 'standard',array('class' => "tranz grayscale grayscale-fade"));?>
                                
                                </a>
                                
                                <?php tmnf_meta_counter(); ?>
                            
                            </div>
        
                        <?php } else { } ?> 

                    	<?php }
                        
            	?>
    
            	<div class="item_inn tranz">
        
                    <h2 class="posttitle"><a href="<?php tmnf_permalink(); ?>"><?php echo short_title('...', 20); ?></a></h2>
                    
                    <?php 
						tmnf_meta_cat(); 
						tmnf_meta_date();
					?>
                    
                    <div class="clearfix"></div>
                    
                    <p class="teaser"><?php echo themnific_excerpt( get_the_excerpt(), '350'); ?></p>
                    
                    <?php tmnf_meta_more() ?>
                
                </div>
        
            </div>