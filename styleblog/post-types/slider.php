			<li class="item">
                    
				<?php if ( has_post_thumbnail()) { ?>
                
                    <div class="imgwrap">
                
                        <?php echo tmnf_ratings();?>
                    
                         <a href="<?php tmnf_permalink(); ?>" title="<?php the_title();?>" >
                         
                            <?php the_post_thumbnail( 'main-slider',array('class' => "tranz grayscale grayscale-fade")); ?>
                            
                         </a>
                         
                    </div>
                    
                <?php } ?>
                
                <div class="flexinside">
            
                    <div class="container">
                    
                    	<div class="flexinside-inn tranz">
                                    
                            <h2><a href="<?php tmnf_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h2>
                         
                         	
                    
							<?php 
								tmnf_meta_cat(); 
								tmnf_meta_date(); 
								tmnf_meta_counter();
							?>
                            
                            <div class="clearfix"></div>
                            
                            <p class="teaser tranz"><?php echo themnific_excerpt( get_the_excerpt(), '160'); ?>...</p>
                    
                     	</div>
                     
                     </div>
                 
                 </div>
                        
			</li>