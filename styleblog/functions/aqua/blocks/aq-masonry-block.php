<?php
/** A simple text block **/
class AQ_Masonry_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Posts - Masonry',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_masonry_block', $block_options);
	}
	
	function form($instance) {
                
	$defaults = array('title' => 'Recent Posts', 'post_type' => 'all', 'categories' => 'all', 'flex_bg_color' => '#eee','offset' => 0,'right_lay' => 0,'flex_text_color' => '#000',);
	$instance = wp_parse_args((array) $instance, $defaults);
	
			
   	
	extract($instance); ?>		
                
                
        
        <p class="description half">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo $title ?>" name="<?php echo $this->get_field_name('title') ?>">
			</label>
		</p>
        
        <p class="description half">
			<label for="<?php echo $this->get_field_id('categories'); ?>">Filter by Category:</label> 
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
        
        <p style="clear:both; margin-bottom:30px;"></p>
        <hr>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('offset') ?>">
				<?php echo aq_field_checkbox('offset', $block_id, $offset) ?>
				Enable navigation offset
			</label>
		</p>
        
        <p style="clear:both; margin-bottom:30px;"></p>
        <hr>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('right_lay') ?>">
				<?php echo aq_field_checkbox('right_lay', $block_id, $right_lay) ?>
				Switch position (2nd vs 3rd column)
			</label>
		</p>
		<?php
	}
		
		
		function block($instance) {
                extract($instance);

        $title = $instance['title'];
		$post_type = 'all';
		$categories = $instance['categories'];
		
		
		$post_types = get_post_types();
		unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
		
		if($post_type == 'all') {
			$post_type_array = $post_types;
		} else {
			$post_type_array = $post_type;
		}
		?>
			<?php if ( $title == "") {} else { ?>
			<h2 class="widget"><a href="<?php echo get_category_link($categories); ?>"><?php echo esc_attr($title); ?></a></h2>
			<?php } ?>
            </div></div></div>
            
            
            <div class="clearfix"></div>
            <div class="maso <?php if($offset == 1){echo 'nav-offset';} else { } ?> <?php if($right_lay == 1){echo 'right-layout';} else { } ?>">
            
                <ul class="maso-inn" >
                
                
                    <?php  
                    $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories,'ignore_sticky_posts'=>1));
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
        
                        <li class="maso1 item">
                                
                                <div class="imgwrap">
                            
                                    <?php echo tmnf_ratings();?>
                                
                                     <a class="imglink" href="<?php tmnf_permalink(); ?>" title="<?php the_title();?>" >
                                     
                                        <?php the_post_thumbnail( 'horiz', array('class' => "tranz grayscale grayscale-fade")); ?>
                                        
                                     </a>
                                     
                                </div>
                                
                                <div class="masoinside tranz"><span class="bg tranz"></span>
                                
									<?php 
                                        tmnf_meta_cat(); 
                                        tmnf_meta_date(); 
                                        tmnf_meta_counter();
                                    ?>
                                    
                                    <div class="clearfix"></div>
                                        
                                    <h2><a href="<?php tmnf_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h2>
                                
                                 </div>
                                
                                    
                        </li>
        
                    <?php  endwhile; ?>
                    



                    <?php  
                    $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories, 'offset' => 1,'ignore_sticky_posts'=>1));
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
        
                        <li class="maso2 item">


                                <div class="imgwrap">
                            
                                    <?php echo tmnf_ratings();?>
                                
                                     <a class="imglink" href="<?php tmnf_permalink(); ?>" title="<?php the_title();?>" >
                                     
                                        <?php the_post_thumbnail( 'horiz', array('class' => "tranz grayscale grayscale-fade")); ?>
                                        
                                     </a>
                                     
                                </div>
                                
                                <div class="masoinside tranz"><span class="bg tranz"></span>
                                
									<?php 
                                        tmnf_meta_cat(); 
                                        tmnf_meta_date(); 
                                        tmnf_meta_counter();
                                    ?>
                                    
                                    <div class="clearfix"></div>

                                        
                                    <h2><a href="<?php tmnf_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h2>
                                
                                 </div>
                                
                                    
                        </li>
        
                    <?php  endwhile; ?>
                    
                    
                
                    <?php  
                    $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories, 'offset' => 2,'ignore_sticky_posts'=>1));
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
        
                        <li class="maso3 masosmall item">


                                <div class="imgwrap">
                            
                                    <?php echo tmnf_ratings();?>
                                
                                     <a class="imglink" href="<?php tmnf_permalink(); ?>" title="<?php the_title();?>" >
                                     
                                        <?php the_post_thumbnail( 'small', array('class' => "tranz grayscale grayscale-fade")); ?>
                                        
                                     </a>
                                     
                                </div>
                                
                                <div class="masoinside tranz"><span class="bg tranz"></span>
                                
									<?php 
                                        tmnf_meta_date(); 
                                        tmnf_meta_counter();
                                    ?>
                                    
                                    <div class="clearfix"></div>

                                        
                                    <h2><a href="<?php tmnf_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h2>
                                
                                 </div>
                                
                                    
                        </li>
        
                    <?php  endwhile; ?>
                    
                    
                    <?php  
                    $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories, 'offset' => 3,'ignore_sticky_posts'=>1));
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
        
                        <li class="maso4 masosmall item">


                                <div class="imgwrap">
                            
                                    <?php echo tmnf_ratings();?>
                                
                                     <a class="imglink" href="<?php tmnf_permalink(); ?>" title="<?php the_title();?>" >
                                     
                                        <?php the_post_thumbnail( 'small', array('class' => "tranz grayscale grayscale-fade")); ?>
                                        
                                     </a>
                                     
                                </div>
                                
                                <div class="masoinside tranz"><span class="bg tranz"></span>
                                
									<?php 
                                        tmnf_meta_date(); 
                                        tmnf_meta_counter();
                                    ?>
                                    
                                    <div class="clearfix"></div>

                                        
                                    <h2><a href="<?php tmnf_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h2>
                                
                                 </div>
                                
                                    
                        </li>
        
                    <?php  endwhile; ?>    
                    
                    
                     <?php  
                    $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories, 'offset' => 4,'ignore_sticky_posts'=>1));
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
        
                        <li class="maso5 masosmall item">


                                <div class="imgwrap">
                            
                                    <?php echo tmnf_ratings();?>
                                
                                     <a class="imglink" href="<?php tmnf_permalink(); ?>" title="<?php the_title();?>" >
                                     
                                        <?php the_post_thumbnail( 'small', array('class' => "tranz grayscale grayscale-fade")); ?>
                                        
                                     </a>
                                     
                                </div>
                                
                                <div class="masoinside tranz"><span class="bg tranz"></span>
                                
									<?php 
                                        tmnf_meta_date(); 
                                        tmnf_meta_counter();
                                    ?>
                                    
                                    <div class="clearfix"></div>

                                        
                                    <h2><a href="<?php tmnf_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h2>
                                
                                 </div>
                                
                                    
                        </li>
        
                    <?php  endwhile; ?>
                    



                     <?php  
                    $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories, 'offset' => 5,'ignore_sticky_posts'=>1));
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
        
                        <li class="maso6 masosmall item">


                                <div class="imgwrap">
                            
                                    <?php echo tmnf_ratings();?>
                                
                                     <a class="imglink" href="<?php tmnf_permalink(); ?>" title="<?php the_title();?>" >
                                     
                                        <?php the_post_thumbnail( 'vert', array('class' => "tranz grayscale grayscale-fade")); ?>
                                        
                                     </a>
                                     
                                </div>
                                
                                <div class="masoinside tranz"><span class="bg tranz"></span>
                                
									<?php 
                                        tmnf_meta_date(); 
                                        tmnf_meta_counter();
                                    ?>
                                    
                                    <div class="clearfix"></div>

                                        
                                    <h2><a href="<?php tmnf_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h2>
                                
                                 </div>
                                
                                    
                        </li>
        
                    <?php  endwhile; ?>
                    
                    
                    
                    
                     <?php  
                    $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories, 'offset' => 6,'ignore_sticky_posts'=>1));
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
        
                        <li class="maso7 masosmall item">


                                <div class="imgwrap">
                            
                                    <?php echo tmnf_ratings();?>
                                
                                     <a class="imglink" href="<?php tmnf_permalink(); ?>" title="<?php the_title();?>" >
                                     
                                        <?php the_post_thumbnail( 'vert', array('class' => "tranz grayscale grayscale-fade")); ?>
                                        
                                     </a>
                                     
                                </div>
                                
                                <div class="masoinside tranz"><span class="bg tranz"></span>
                                
									<?php 
                                        tmnf_meta_date(); 
                                        tmnf_meta_counter();
                                    ?>
                                    
                                    <div class="clearfix"></div>
                                        
                                    <h2><a href="<?php tmnf_permalink() ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 16); ?></a></h2>
                                
                                 </div>
                                
                                    
                        </li>
        
                    <?php  endwhile; ?>
                 
                
                
                </ul>
            
            </div>
            <div class="container builder woocommerce"><div>   <div> 
            <?php wp_reset_query(); ?>
			<?php
                
        }
	
}
aq_register_block('AQ_Masonry_Block');