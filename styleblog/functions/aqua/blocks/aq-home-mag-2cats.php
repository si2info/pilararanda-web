<?php
/** A simple text block **/
class AQ_Home_Mag_2Cats extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Posts - Magazine (Two Categories)',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_Home_Mag_2Cats', $block_options);
	}
                
	function form($instance) {
                
		$defaults = array('title1' => 'Recent Posts','title2' => 'Recent Posts','moretitle' => '','urlmore1' => '','urlmore2' => '','post_type' => 'all', 'categories1' => 'all','no_margin' => 0,'categories2' => 'all', 'posts' => 5, 'query_type_sel' => 'Latest','block_bg_color' => '#FAFAFA','block_text_color1' => '#333','block_text_color2' => '#333',);
		
		$query_type = array(
				'latest' => 'Latest',
				'popular' => 'Popular',
			);
		$columns_type = array(
				'fourblog' => 'Full Width Row',
				'twoblog' => '2/3 Column',
				'oneblog' => '1/3 Column'
			);	
			
	$instance = wp_parse_args((array) $instance, $defaults);
	extract($instance);	          
    ?>
         
        <p class="description">
			<label for="<?php echo $this->get_field_id('title1') ?>">
				Left Title (optional)
				<input id="<?php echo $this->get_field_id('title1') ?>" class="input-full" type="text" value="<?php echo esc_attr($title1) ?>" name="<?php echo $this->get_field_name('title1') ?>">
			</label>
		</p>
        
        <p class="description">
			<label for="<?php echo $this->get_field_id('title2') ?>">
				Right Title (optional)
				<input id="<?php echo $this->get_field_id('title2') ?>" class="input-full" type="text" value="<?php echo esc_attr($title2) ?>" name="<?php echo $this->get_field_name('title2') ?>">
			</label>
		</p>
        
        <p style="clear:both;"></p>
        
        <p class="description half">
			<label for="<?php echo $this->get_field_id('categories1'); ?>">Filter by Category (Left):</label> 
			<select id="<?php echo $this->get_field_id('categories1'); ?>" name="<?php echo $this->get_field_name('categories1'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories1']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories1 = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories1 as $category1) { ?>
				<option value='<?php echo $category1->term_id; ?>' <?php if ($category1->term_id == $instance['categories1']) echo 'selected="selected"'; ?>><?php echo $category1->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>   
        
        
        <p class="description half last">
			<label for="<?php echo $this->get_field_id('categories2'); ?>">Filter by Category (Right):</label> 
			<select id="<?php echo $this->get_field_id('categories2'); ?>" name="<?php echo $this->get_field_name('categories2'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories2']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories2 = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories2 as $category2) { ?>
				<option value='<?php echo $category2->term_id; ?>' <?php if ($category2->term_id == $instance['categories2']) echo 'selected="selected"'; ?>><?php echo $category2->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>         
        
        <p style="clear:both;"></p>
        <hr>
        
        <p class="description half">
			<label for="<?php echo $this->get_field_id('urlmore1') ?>">
				Left Title - URL to archive (optional)
				<input id="<?php echo $this->get_field_id('urlmore1') ?>" class="input-full" type="text" value="<?php echo esc_url($urlmore1) ?>" name="<?php echo $this->get_field_name('urlmore1') ?>">
			</label>
		</p>
        
        <p class="description half last">
			<label for="<?php echo $this->get_field_id('urlmore2') ?>">
				Right Title - URL to archive (optional)
				<input id="<?php echo $this->get_field_id('urlmore2') ?>" class="input-full" type="text" value="<?php echo esc_url($urlmore2) ?>" name="<?php echo $this->get_field_name('urlmore2') ?>">
			</label>
		</p>
        
        <p style="clear:both;"></p>
        <hr>
        
		<p class="description half last spec">
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo esc_attr($instance['posts']); ?>" />
		</p>  
        
        <p class="description">
            
            <span style="clear:both; margin-bottom:15px;"></span>
		</p>
        
        
        
		<?php
	}
	
		
		
		
		function block($instance) {
                extract($instance);
        $title1 = $instance['title1'];
        $urlmore1 = $instance['urlmore1'];
        $title2 = $instance['title2'];
        $urlmore2 = $instance['urlmore2'];
		$categories1 = $instance['categories1'];
		$categories2 = $instance['categories2'];
		$posts = $instance['posts'];

		?>
        
        <div class="widgetwrap ghost">
        	
			<?php
			
			$recent_posts1 = new WP_Query(array(
				'showposts' => esc_attr($posts),
				'cat' => $categories1,
				'ignore_sticky_posts'=> 1
			));
			?>

   
            
                <!-- latest-->
                <div class="firstcat twocats">
                
					<?php if ( $title1 == "") {} else { ?>
                    <h2 class="block">
                        
                        <?php if ( $urlmore1 == "") { echo esc_attr($title1);} else { ?>
                        
                            <a href="<?php echo esc_url($urlmore1); ?>"><?php echo esc_attr($title1) ?> <i class="fa fa-angle-double-right"></i></a>
                        
                        <?php } ?>
                            
                    </h2>
                    <div class="clearfix"></div>
                    <?php } ?>

					<?php 
                    $big_count = round(20 / 20); if(!$big_count) { $big_count = 1; } $counter = 1;
                    while ( $recent_posts1->have_posts() ) : $recent_posts1->the_post();
                    if($counter <= $big_count): if($counter == $big_count) { $last = 'block-item-big-last'; } else { $last = ''; };
                    ?>
    
                        <?php get_template_part('post-types/mag-2cats' ); ?>
                    
                    <?php else: ?>
        
                        <?php get_template_part('post-types/mag-2cats-small' ); ?>
                
                    <?php endif; ?>
                
                    <?php $counter++; endwhile; ?>

                </div>
                <?php wp_reset_query(); ?>
                <!-- end latest-->
            
            
            
			<?php
			
			$recent_posts2 = new WP_Query(array(
				'showposts' => esc_attr($posts),
				'cat' => $categories2,
				'ignore_sticky_posts'=> 1
			));
			?>

   
            
                <!-- latest-->
                <div class="secondcat twocats">
                
					<?php if ( $title2 == "") {} else { ?>
                    <h2 class="block">
                        
                        <?php if ( $urlmore2 == "") { echo $title2;} else { ?>
                        
                            <a href="<?php echo esc_attr($urlmore2); ?>"><?php echo esc_attr($title2) ?> <i class="fa fa-angle-double-right"></i></a>
                        
                        <?php } ?>
                            
                    </h2>
                    <div class="clearfix"></div>
                    <?php } ?>


					<?php 
                    $big_count = round(20 / 20); if(!$big_count) { $big_count = 1; } $counter = 1;
                    while ( $recent_posts2->have_posts() ) : $recent_posts2->the_post();
                    if($counter <= $big_count): if($counter == $big_count) { $last = 'block-item-big-last'; } else { $last = ''; };
                    ?>
    
                        <?php get_template_part('post-types/mag-2cats' ); ?>
                    
                    <?php else: ?>
        
                        <?php get_template_part('post-types/mag-2cats-small' ); ?>
                
                    <?php endif; ?>
                
                    <?php $counter++; endwhile; ?>

                </div>
                <?php wp_reset_query(); ?>
                <!-- end latest-->
            
            </div><!-- end .widgetwrap -->
            
            <div class="clearfix"></div>
            
            
			<?php
                
        }
	
}
aq_register_block('AQ_Home_Mag_2Cats');