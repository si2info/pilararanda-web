<?php
/** "Clear" block 
 * 
 * Clear the floats vertically
 * Optional to use horizontal lines/images
**/
class AQ_Clear_Block extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Clear',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_clear_block', $block_options);
	}
	
	function form($instance) {
		
		$defaults = array(
			'horizontal_line' => 'none',
			'line_color' => '#FFFFFF',
			'pattern' => '1',
			'height' => ''
		);
		
		$line_options = array(
			'transparent' => 'Trasparent',
			'colored' => 'Colored',
			'colored_alt' => 'Colored (No Margins)',
		);
		
		$instance = wp_parse_args($instance, $defaults);
		extract($instance);
		
		$line_color = isset($line_color) ? $line_color : '#ededed';
		
		?>
		<p class="description note">
			<?php _e('Use this block to clear the floats between two or more separate blocks vertically.', 'themnific') ?>
		</p>
		<p class="description fourth">
			<label for="<?php echo $this->get_field_id('line_color') ?>">
				Pick a horizontal line<br/>
				<?php echo aq_field_select('horizontal_line', $block_id, $line_options, $horizontal_line, $block_id); ?>
			</label>
		</p>
		<div class="description fourth">
			<label for="<?php echo $this->get_field_id('height') ?>">
				Height (optional)<br/>
				<?php echo aq_field_input('height', $block_id, $height, 'min', 'number') ?> px
			</label>
		</div>
		<div class="description half last">
			<label for="<?php echo $this->get_field_id('line_color') ?>">
				Pick a line color<br/>
				<?php echo aq_field_color_picker('line_color', $block_id, $line_color, $defaults['line_color']) ?>
			</label>
			
		</div>
		<?php
		
	}
	
	function block($instance) {
		extract($instance);
		
		switch($horizontal_line) {
			case 'none':
				break;
			case 'transparent':
				echo '<div class="aq-block-clear aq-block-hr-single" style="height:'.esc_attr($height).'px;"></div>';
				break;
			case 'colored':
				echo '<div class="aq-block-clear aq-block-hr-single" style="margin:30px 0;background:'.esc_attr($line_color).';height:'.esc_attr($height).'px;"/></div>';
				break;
			case 'colored_alt':
				echo '<div class="aq-block-clear aq-block-hr-single" style="margin:1px 0;background:'.esc_attr($line_color).';height:'.esc_attr($height).'px;"/></div>';
				break;
			case 'double':
				echo '<div class="aq-block-clear aq-block-hr-double" style="background:'.esc_attr($line_color).';height:'.esc_attr($height).'px;"/></div>';
				echo '<div class="aq-block-clear aq-block-hr-single" style="background:'.esc_attr($line_color).';height:'.esc_attr($height).'px;"/></div>';
				break;
			case 'image':
				echo '<div class="aq-block-clear aq-block-hr-image cf"/></div>';
				break;
		}
		
	}
	
}