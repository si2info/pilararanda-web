<?php
add_action('widgets_init', 'si2_agenda');

function si2_agenda()
{
	register_widget('si2_agenda');
}

class si2_agenda extends WP_Widget {
	
	function si2_agenda()
	{
		$widget_ops = array('classname' => 'si2_agenda', 'description' => 'Featured posts widget.');

		$control_ops = array('id_base' => 'si2_agenda');

		$this->WP_Widget('si2_agenda', 'SI2 - Agenda', $widget_ops, $control_ops);
	}
	
	function widget($args, $instance)
	{
		extract($args);
		
		$title = $instance['title'];
		$post_type = 'all';
		$categories = $instance['categories'];
		$posts = $instance['posts'];
		
		echo $before_widget;
		?>
		
		<?php
		$post_types = get_post_types();
		unset($post_types['page'], $post_types['attachment'], $post_types['revision'], $post_types['nav_menu_item']);
		
		if($post_type == 'all') {
			$post_type_array = $post_types;
		} else {
			$post_type_array = $post_type;
		}
		?>
		
			<h2 class="widget"><a href="<?php echo get_category_link($categories); ?>"><?php echo esc_attr($title); ?></a></h2>
			
			<?php
			$args = array(
				'post_type' => 'eventos',
				'post_status' => 'publish',
				'showposts' => $posts,
				//'meta_value' => date("Ymd"),
				//'meta_compare' => '>=',
				'meta_key' => 'entidades_grinugr_date_ini',
				'meta_query' => array(
						array(
						'key' => 'entidades_grinugr_date_ini',
						'value' => date("Ymd"),
						'compare' => '>=',
						'type' => 'DATE'
						),
						array(
						'key' => 'entidades_grinugr_time_ini',
						)
						
				),
				
				//'orderby' => 'meta_value_num',
				
				//'order' => 'ASC',
				'ignore_sticky_posts' => 1,
			);
			function customorderby($orderby) {
			  return 'mt1.meta_value ASC, mt2.meta_value+0 ASC';
			}

			add_filter('posts_orderby','customorderby');
			$recent_posts = new WP_Query( $args );
			remove_filter('posts_orderby','customorderby');
			?>
            <ul class="featured gradient-light">
			<?php  while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
				<li>
					<?php /*get_template_part('/post-types/featured-post-alt' );*/ ?>
					<?php get_template_part('/post-types/si2-agenda-sidebar' ); ?>
				</li>
			<?php  endwhile; ?>
			</ul>
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
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 100%;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<!--<p>
			<label for="<?php echo $this->get_field_id('categories'); ?>">Filter by Category:</label> 
			<select id="<?php echo $this->get_field_id('categories'); ?>" name="<?php echo $this->get_field_name('categories'); ?>" class="widefat categories" style="width:100%;">
				<option value='all' <?php if ('all' == $instance['categories']) echo 'selected="selected"'; ?>>all categories</option>
				<?php $categories = get_categories('hide_empty=0&depth=1&type=post'); ?>
				<?php foreach($categories as $category) { ?>
				<option value='<?php echo $category->term_id; ?>' <?php if ($category->term_id == $instance['categories']) echo 'selected="selected"'; ?>><?php echo $category->cat_name; ?></option>
				<?php } ?>
			</select>
		</p>-->
		
		<p>
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo $instance['posts']; ?>" />
		</p>
		

	<?php }
}
?>