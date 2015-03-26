<?php
/** A simple text block **/
class AQ_Ads_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Ads',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_ads_block', $block_options);
	}
	
	function form($instance) {
                
	$defaults = array('title' => 'Advertisement', 'image' => '','adcode' => '','targeturl' => '','post_type' => 'all',);
	$instance = wp_parse_args((array) $instance, $defaults);
   	
	extract($instance); ?>		
                
                
        
        <p class="description">
			<label for="<?php echo $this->get_field_id('title') ?>">
				Title (optional)
				<input id="<?php echo $this->get_field_id('title') ?>" class="input-full" type="text" value="<?php echo esc_attr($title) ?>" name="<?php echo $this->get_field_name('title') ?>">
			</label>
		</p>
        
        <p class="description">
			<label for="<?php echo $this->get_field_id('adcode') ?>">
				Content
				<?php echo aq_field_textarea('adcode', $block_id, $adcode, $size = 'full') ?>
			</label>
		</p>
        
        <p class="description">
			<label for="<?php echo $this->get_field_id('image') ?>">
				Image URL
				<input id="<?php echo $this->get_field_id('image') ?>" class="input-full" type="text" value="<?php echo esc_url($image) ?>" name="<?php echo $this->get_field_name('image') ?>">
			</label>
		</p>
        
        <p class="description">
			<label for="<?php echo $this->get_field_id('targeturl') ?>">
				Link URL
				<input id="<?php echo $this->get_field_id('targeturl') ?>" class="input-full" type="text" value="<?php echo esc_url($targeturl) ?>" name="<?php echo $this->get_field_name('targeturl') ?>">
			</label>
		</p>
        
		<?php
	}
	
		
		
		
		function block($instance) {
                extract($instance);

        $title = $instance['title'];
        $adcode = $instance['adcode'];
        $image = $instance['image'];
        $targeturl = $instance['targeturl'];
		
		?>
		
			<?php if ( $title == "") {} else { ?>
            
			<h2 class="adblock"><?php echo esc_attr($title); ?></h2>
            
			<?php } ?>
            
			<?php if($adcode != ''){ ?>
                    
           		<div class="body3 bgfix"><?php echo do_shortcode(htmlspecialchars_decode($adcode));?></div>
		
		 	<?php } else { ?>
            
                <a class="item" href="<?php echo esc_url($targeturl); ?>">
                
                        <img class="grayscale grayscale-fade" src="<?php echo esc_url($image); ?>" alt="<?php _e('Visit Sponsor','themnific');?>" />
                
                </a>
                        
			<?php	}
                
        }
	
}
aq_register_block('AQ_Ads_Block');