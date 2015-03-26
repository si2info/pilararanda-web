
                        
                        <div class="clearfix"></div>
                        
                        <h2><a href="<?php tmnf_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h2>
                    
                        <div class="clearfix"></div>
                        
                        <?php 
								tmnf_meta_cat(); 
								tmnf_meta_date(); 
						?>
                        
                        <div class="clearfix"></div>
                        
                        <p class="teaser"><?php echo themnific_excerpt( get_the_excerpt(), '280'); ?>...</p>
                        
                        <?php tmnf_meta_more(); ?>