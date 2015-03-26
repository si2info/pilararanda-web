<?php
/** A simple text block **/
class AQ_Flexslider_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Posts - Slider',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_flexslider_block', $block_options);
	}
	
	function form($instance) {
                
	$defaults = array('title' => 'Recent Posts', 'post_type' => 'all', 'categories1' => 'all','categories2' => 'all','categories3' => 'all','offset' => 0, 'posts' => 4,'posts2' => 3,'posts3' => 4,'urlmore2' => '','title2' => 'Recent Posts', 'flex_bg_color' => '#eee','flex_text_color' => '#fff',);
	$instance = wp_parse_args((array) $instance, $defaults);
	
			
   	
	extract($instance); ?>		
                
                
        
        <p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo esc_attr($title) ?>" name="<?php echo $this->get_field_name('title') ?>">
			</label>
		</p>
        
        
        <p class="description half">
			<label for="<?php echo $this->get_field_id('categories1'); ?>">Filter by Category (Slider):</label> 
			<select id="<?php echo $this->get_field_id('categories1'); ?>" name="<?php echo $this->get_field_name('categories1'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories1']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories1 = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories1 as $category1) { ?>
				<option value='<?php echo $category1->term_id; ?>' <?php if ($category1->term_id == $instance['categories1']) echo 'selected="selected"'; ?>><?php echo $category1->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>   
        
        <p style="clear:both;"></p>
        
        
		
		<p class="description half last">
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts in slider:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo esc_attr($instance['posts']); ?>" />
		</p>
        
        
        <p style="clear:both; margin-bottom:30px;"></p>
        <hr>
        
        <p class="description">
            <label for="<?php echo $this->get_field_id('offset') ?>">
				<?php echo aq_field_checkbox('offset', $block_id, $offset) ?>
				Enable navigation offset
			</label>
		</p>
        
		<?php
	}
		
		
		function block($instance) {
                extract($instance);
		wp_enqueue_script('jquery.flexslider-min', get_template_directory_uri() .'/js/jquery.flexslider-min.js','','', true);				
		wp_enqueue_script('jquery.flexslider.start.main', get_template_directory_uri() .'/js/jquery.flexslider.start.main.js','','', true);

        $title = $instance['title'];
		$post_type = 'all';
		$categories1 = $instance['categories1'];
		$posts = $instance['posts'];
		
		
		$post_types = get_post_types();
		unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
		
		if($post_type == 'all') {
			$post_type_array = $post_types;
		} else {
			$post_type_array = $post_type;
		}
		?>
        
			
			<?php
			$recent_posts1 = new WP_Query(array(
				'showposts' => esc_attr($posts),
				'cat' => $categories1,
			));
			?>
            </div></div></div>
            <div class="mainflex flexslider loading <?php if($offset == 1){echo 'nav-offset';} else { } ?>">
            <ul class="slides" >
            
			<?php  while($recent_posts1->have_posts()): $recent_posts1->the_post();?>

				<?php get_template_part('/post-types/slider'); ?>

			<?php  endwhile; ?>
			</ul>
            </div>
            <?php wp_reset_query();
			// END FLEXSLIDER ?>
        
        <div class="container builder woocommerce"><div>   <div>   
     
		<?php
                
        }
	
}
aq_register_block('AQ_Flexslider_Block');