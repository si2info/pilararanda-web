<?php
/*---------------------------------------------------------------------------------*/
/* Blog Author Info */
/*---------------------------------------------------------------------------------*/
class BlogAuthorInfo extends WP_Widget {

   function BlogAuthorInfo() {
	   $widget_ops = array('description' => 'This is a Blog Author Info widget.' );
	   parent::WP_Widget(false, __('Themnific - Blog Author Info', 'themnific'),$widget_ops);      
   }

   function widget($args, $instance) {  
	extract( $args );
	$title = $instance['title'];
	$bio = $instance['bio'];
	$custom_email = $instance['custom_email'];
	$avatar_size = $instance['avatar_size']; if ( !$avatar_size ) $avatar_size = 48;
	$avatar_align = $instance['avatar_align']; if ( !$avatar_align ) $avatar_align = 'left';
	$read_more_text = $instance['read_more_text'];
	$read_more_url = $instance['read_more_url'];
	{
	?>
		<?php echo $before_widget; ?>
		<?php if ($title) { echo $before_title . esc_attr($title) . $after_title; } ?>
		
		<span class=""><?php if ( esc_url($custom_email) ) echo '<img src="'.esc_url($custom_email).'" alt="My Image"/>' ?></span>
		<p style="margin:25px 0 50px 0;"><?php echo $bio; ?><br/>
		<?php if ( $read_more_url ) echo '<a class="rad comment-reply-link" style="float:right;" href="' . $read_more_url . '">' . $read_more_text . '</a>'; ?></p>
		<?php echo $after_widget; ?>   
    <?php
	}
   }

   function update($new_instance, $old_instance) {                
	   return $new_instance;
   }

   function form($instance) {   
   
   		$defaults = array('title' => '', 'bio' => '', 'custom_email' => '', 'avatar_size' => '', 'avatar_align' => '', 'read_more_text' => '', 'read_more_url' => '', 'page' => '');
		$instance = wp_parse_args((array) $instance, $defaults);     
   
		$title = esc_attr($instance['title']);
		$bio = esc_attr($instance['bio']);
		$custom_email = esc_attr($instance['custom_email']);
		$avatar_size = esc_attr($instance['avatar_size']);
		$avatar_align = esc_attr($instance['avatar_align']);
		$read_more_text = esc_attr($instance['read_more_text']);
		$read_more_url = esc_attr($instance['read_more_url']);
		?>
		<p>
		   <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','themnific'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('title'); ?>"  value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('bio'); ?>"><?php _e('Bio:','themnific'); ?></label>
			<textarea rows="10" name="<?php echo $this->get_field_name('bio'); ?>" class="widefat" id="<?php echo $this->get_field_id('bio'); ?>"><?php echo $bio; ?></textarea>
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('custom_email'); ?>"><?php _e('Your Image URL','themnific'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('custom_email'); ?>"  value="<?php echo $custom_email; ?>" class="widefat" id="<?php echo $this->get_field_id('custom_email'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('read_more_text'); ?>"><?php _e('Read More Text (optional):','themnific'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('read_more_text'); ?>"  value="<?php echo $read_more_text; ?>" class="widefat" id="<?php echo $this->get_field_id('read_more_text'); ?>" />
		</p>
		<p>
		   <label for="<?php echo $this->get_field_id('read_more_url'); ?>"><?php _e('Read More URL (optional):','themnific'); ?></label>
		   <input type="text" name="<?php echo $this->get_field_name('read_more_url'); ?>"  value="<?php echo $read_more_url; ?>" class="widefat" id="<?php echo $this->get_field_id('read_more_url'); ?>" />
		</p>

		<?php
	}
} 

register_widget('BlogAuthorInfo');
?>