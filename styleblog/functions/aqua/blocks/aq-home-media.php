<?php
/** A simple text block **/
class AQ_Home_Media extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Posts - Media',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_Home_Media', $block_options);
	}
	
	function form($instance) {
                
		$defaults = array('title' => 'Recent Posts', 'moretitle' => '','urlmore' => '','post_type' => 'all', 'categories' => 'all', 'posts' => 4,'right_lay' => 0,'no_margin' => 0, 'media_type_sel' => 'Featured Image');
		
		$media_type = array(
				'image' => 'Featured Image',
				'video' => 'Video',
			);
			
		
			
	$instance = wp_parse_args((array) $instance, $defaults);
	extract($instance);	          
    ?>
         
        <p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo esc_attr($title) ?>" name="<?php echo $this->get_field_name('title') ?>">
			</label>
		</p>
        
        <p class="description">
			<label for="<?php echo $this->get_field_id('categories'); ?>">Filter by Category:</label> 
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>
		
		<p class="description">
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo esc_attr($instance['posts']); ?>" />
		</p>
        

		<p class="description">
			<label for="<?php echo $this->get_field_id('media_type_sel') ?>">
				Pick a media type to show (for big post)<br/>
               <?php echo aq_field_select('media_type_sel', $block_id, $media_type, $media_type_sel, $block_id); ?>
			</label>
		</p>
        
		<p class="description half">
            <span style="clear:both; margin-bottom:15px;"></span>
                
            <label for="<?php echo $this->get_field_id('right_lay') ?>">
                <?php echo aq_field_checkbox('right_lay', $block_id, $right_lay) ?>
                Switch layout to right.
            </label>
		</p>
        
		<?php
	}
	
		
		
		
		function block($instance) {
                extract($instance);
        $title = $instance['title'];
		$media_type = $instance['media_type_sel'];
		$categories = $instance['categories'];
		$posts = $instance['posts'];

		?>
        
            <div class="widgetwrap ghost <?php if($right_lay == 1){echo 'right-layout';} else { } ?>">
			<?php if ( $title == "") {} else { ?>
			<h2 class="block"><a href="<?php echo get_category_link($categories); ?>"><?php echo esc_attr($title); ?></a></h2>
            <div class="clearfix"></div>
			<?php } ?>
        	
			<?php
			
			$recent_posts = new WP_Query(array(
				'showposts' => esc_attr($posts),
				'cat' => $categories,
				'ignore_sticky_posts'=> 1
			));
			?>          
                <ul>
                
				<?php 
                $big_count = round($posts / 7); if(!$big_count) { $big_count = 1; } $counter = 1;
                while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
                if($counter <= $big_count): if($counter == $big_count) { $last = 'block-item-big-last'; } else { $last = ''; };
                ?>
                
                	<li class="media-big item">
                
						<?php 
                            global $post;
                            $video_input = get_post_meta($post->ID, 'tmnf_video', true);
                            $iframe_input = get_post_meta($post->ID, 'tmnf_iframe', true);
                        ?>
    
                        <?php if ($media_type_sel == 'video'){ 
                                get_template_part('/functions/theme-video');
                            } else { ?>
                            
                             <div class="imgwrap">
                             
                             	<?php echo tmnf_ratings();?>
                            
                                 <a href="<?php tmnf_permalink(); ?>" title="<?php the_title();?>" >
                                 
                                    <?php the_post_thumbnail( 'media',array('class' => "tranz grayscale grayscale-fade")); ?>
                                    
                                 </a>
                                 
                                 <?php tmnf_meta_counter() ?>
                                 
                            </div>
                            
                        <?php }  ?> 
                
                		<?php get_template_part('/post-types/media-big' ); ?>
                
                	</li>
                
                
                <?php else: ?>
                
                	<?php get_template_part('/post-types/media-small' ); ?>
                    
				<?php endif; ?>
            
				<?php $counter++; endwhile; ?>
                
                </ul>
                
                <?php wp_reset_query(); ?>
                
			</div><!-- end. widgetwrap -->
			<?php
                
        }
	
}
aq_register_block('AQ_Home_Media');