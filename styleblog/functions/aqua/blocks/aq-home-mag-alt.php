<?php
/** A simple text block **/
class AQ_Home_Mag_Classic extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Posts - Magazine (2)',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_Home_Mag_Classic', $block_options);
	}
	
	function form($instance) {
                
		$defaults = array('title' => 'Recent Posts', 'moretitle' => '','urlmore' => '','post_type' => 'all', 'categories' => 'all', 'posts' => 5,'right_lay' => 0,'no_margin' => 0, 'query_type_sel' => 'Latest');
		
		$query_type = array(
				'latest' => 'Latest',
				'popular' => 'Popular',
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
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts (small posts section):</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo esc_attr($instance['posts']); ?>" /> 
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
		$categories = $instance['categories'];
		$posts = $instance['posts'];

		?>
        
            <div class="widgetwrap ghost  <?php if($right_lay == 1){echo 'right-layout';} else { } ?> ">
			<?php if ( $title == "") {} else { ?>
			<h2 class="block"><a href="<?php echo get_category_link($categories); ?>"><?php echo esc_attr($title); ?></a></h2>
			<?php } ?>
        	
			<?php
			$recent_posts = new WP_Query(array(
				'showposts' => esc_attr($posts),
				'cat' => $categories,
				'ignore_sticky_posts'=>1
			));
			?>


            
                <!-- latest-->
                <div class="blocker blocker_alt">
    
                <?php 
                    $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories,'ignore_sticky_posts'=>1));
                    while($recent_posts->have_posts()): $recent_posts->the_post();
                ?>
    
                    <?php get_template_part('/post-types/mag-big' ); ?>
    
                    <?php  endwhile; ?>

                    <?php  
                    $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories, 'offset' => 1,'ignore_sticky_posts'=>1));
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
    
                    <?php get_template_part('/post-types/mag-big' ); ?>
                                
                    <?php  endwhile; ?>
                
                    <?php  
                    $recent_posts = new WP_Query(array('showposts' => $posts,'cat' => $categories, 'offset' => 2,'ignore_sticky_posts'=>1));
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                    
                    <?php get_template_part('/post-types/mag-small' ); ?>
                                
                    <?php  endwhile; ?>
    
                </div>
                <?php wp_reset_query(); ?>
                <!-- end latest-->
                
                
            
			</div><!-- end. widgetwrap -->
			<?php
                
        }
	
}
aq_register_block('AQ_Home_Mag_Classic');