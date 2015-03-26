<?php
/** A simple text block **/
class AQ_Flexcarousel_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Posts - Carousel',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_flexcarousel_block', $block_options);
	}
	
	function form($instance) {
                
	$defaults = array('title' => 'Recent Posts', 'post_type' => 'all', 'categories' => 'all', 'posts' => 12,'no_margin' => 0,'offset' => 0, 'flex_bg_color' => '#eee','flex_text_color' => '#000',);
	$instance = wp_parse_args((array) $instance, $defaults);
	
			
   	
	extract($instance); ?>		
                
                
        
        <p class="description half">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo esc_attr($title) ?>" name="<?php echo $this->get_field_name('title') ?>">
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
		
		<p class="description half">
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo esc_attr($instance['posts']); ?>" />
			
		</p>
        
        
        <p style="clear:both; margin-bottom:30px;"></p>
        <hr>
		<?php
	}
		
		
		function block($instance) {
                extract($instance);
				
		wp_enqueue_script('jquery.flexslider-min', get_template_directory_uri() .'/js/jquery.flexslider-min.js','','', true);				
		wp_enqueue_script('jquery.flexslider.start.carousel', get_template_directory_uri() .'/js/jquery.flexslider.start.carousel.js','','', true);

        $title = $instance['title'];
		$post_type = 'all';
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		
		
		$post_types = get_post_types();
		unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
		
		if($post_type == 'all') {
			$post_type_array = $post_types;
		} else {
			$post_type_array = $post_type;
		}
		?>
            
		<?php if ( $title == "") {} else { ?>
        <h2 class="block block_fix"><a href="<?php echo get_category_link($categories); ?>"><?php echo esc_attr($title); ?></a></h2>
        <div class="clearfix"></div>
        <?php } ?>
            
        <div class="flexcarousel flexslider loading ghost">
			
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => esc_attr($posts),
				'cat' => $categories,
			));
			?>
            
            <ul class="slides" >
			<?php  while($recent_posts->have_posts()): $recent_posts->the_post(); ?>

			<li class="ghost">
            
            	<?php get_template_part('/post-types/carousel' ); ?>
                        
			</li>

			<?php  endwhile; ?>
			</ul>
            <?php wp_reset_query(); ?>
            
        </div> 
        <?php
                
        }
	
}
aq_register_block('AQ_Flexcarousel_Block');