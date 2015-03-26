
    
    				<li class="media-small item">
                    
                       	<a class="imagelink" href="<?php tmnf_permalink(); ?>" title="<?php the_title();?>" >
                                 
                        	<?php the_post_thumbnail( 'thumbnail',array('class' => "tranz grayscale grayscale-fade")); ?>
                        
                        	<?php echo tmnf_icon();?>
                                    
                        </a>
                    
						<h4><a href="<?php tmnf_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h4>
                        
                        <?php tmnf_meta_date() ?>
                        
                        <p class="teaser"><?php echo themnific_excerpt( get_the_excerpt(), '90'); ?>...</p>
                        
            		</li>