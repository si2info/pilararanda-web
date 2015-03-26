<?php
add_action('widgets_init', 'tmnf_tabs_widget');

function tmnf_tabs_widget()
{
	register_widget('tmnf_tabs_widget');
}

class tmnf_tabs_widget extends WP_Widget {
	
	function tmnf_tabs_widget()
	{
		$widget_ops = array('classname' => 'tmnf_tabs_widget', 'description' => 'Featured posts widget.');

		$control_ops = array('id_base' => 'tmnf_tabs_widget');

		$this->WP_Widget('tmnf_tabs_widget', 'Themnific - Tabs', $widget_ops, $control_ops);
}	
	function widget($args, $instance)
	{
	extract($args);
		
	wp_enqueue_script('tabs', get_template_directory_uri() .'/js/tabs.js','','', true);
		
		$title = $instance['title'];
		$post_type = 'all';
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		
		echo $before_widget;
		?>
        
        
		
        	<div id="hometab" class="">
            
                <ul id="serinfo-nav">
                
                        <li class="li01"><a href="#serpane0"><?php _e('Popular','themnific');?></a></li>
                        <li class="li02"><a href="#serpane1"><?php _e('Latest','themnific');?></a></li>
                
                </ul>
                
                <ul id="serinfo">
                
                
                        <li id="serpane0">
                            <?php $popular_query = new WP_Query(array(
                                'showposts' => $posts,
								'ignore_sticky_posts' => 1,
                                'meta_key' => 'post_views_count',
                                'orderby' => 'meta_value_num',
                                'order' => 'DESC'
                            )); 
                            while ($popular_query->have_posts()) : $popular_query->the_post(); ?>
                                <?php get_template_part("/post-types/tab-post"); ?>
                            <?php endwhile; ?><?php wp_reset_query(); ?>
                        </li>
                
                        <li id="serpane1">	
                            <?php $latest_query = new WP_Query(array(
                                'showposts' => $posts,
								'ignore_sticky_posts' => 1,
                                'orderby' => 'post_date'
                            )); 
                            while ($latest_query->have_posts()) : $latest_query->the_post();
                            ?>	
                                <?php get_template_part("/post-types/tab-post"); ?>
                            <?php endwhile; ?>	<?php wp_reset_query(); ?>
                        </li>
                
                </ul>
            
            </div>
            <div style="clear: both;"></div> 





		<?php
		echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = $new_instance['title'];
		$instance['post_type'] = 'all';
		$instance['categories'] = $new_instance['categories'];
		$instance['posts'] = $new_instance['posts'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('title' => 'Recent Posts', 'post_type' => 'all', 'categories' => 'all', 'posts' => 4, 'show_excerpt' => null);
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
		</p>
		

	<?php }
}
?>