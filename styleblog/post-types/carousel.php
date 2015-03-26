           <?php $post_size = get_post_meta($post->ID, 'tmnf_size-shape', true);?>
            
            <div <?php post_class('item tranz'); ?>>
                
                	<div class="imgwrap">
                    
                    	<?php echo tmnf_ratings();?>
                        
                        <a class="imglink" href="<?php tmnf_permalink(); ?>">
                        
							<?php the_post_thumbnail( 'vert',array('class' => "tranz grayscale grayscale-fade"));?>
                        
                        </a>
                    
                    </div>
    
            	<div class="carousel-inn tranz">
        
                    <h2><a href="<?php tmnf_permalink(); ?>"><?php echo short_title('...', 9); ?></a></h2>
                    
                    <div class="clearfix"></div>
                    
                    <p class="teaser"><?php echo themnific_excerpt( get_the_excerpt(), '90'); ?>...</p>
                    
                    <?php tmnf_meta_more(); ?>
                    
                    <?php echo tmnf_icon();?>
                
                </div>
        
            </div>