<?php
/** A simple text block **/
class AQ_Home_Blog_Infinite extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Posts - Blog (Infinite)',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_Home_Blog_Infinite', $block_options);
	}
	
	function form($instance) {
                
		$defaults = array('title' => 'Recent Posts', 'moretitle' => '','urlmore' => '','post_type' => 'all', 'categories' => 'all', 'posts' => 4, 'query_type_sel' => 'Latest');
		
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
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo esc_attr($instance['posts']); ?>" />
		</p>
		<?php
	}
	
		
		
		
		function block($instance) {
                extract($instance);
				
		wp_enqueue_script('jquery.infinitescroll', get_template_directory_uri() .'/js/jquery.infinitescroll.js','','', true);
		wp_enqueue_script('jquery.isotope.start.infinite', get_template_directory_uri() . '/js/jquery.isotope.start.infinite.js','','', true);	
				
        $title = $instance['title'];
		$posts = $instance['posts'];

		?>
        
			<?php if ( $title == "") {} else { ?>
			<h2 class="block block_fix2"><?php echo esc_attr($title); ?></h2>
			<?php } ?>
            
          <!-- latest-->
          
          <div id="content" class="eightcol first">
          <div class="blogger infinite">

			  <?php
                  if ( get_query_var('paged') ) {
                      $paged = get_query_var('paged');
                  } else if ( get_query_var('page') ) {
                      $paged = get_query_var('page');
                  } else {
                      $paged = 1;
                  }
                  query_posts( array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page' => esc_attr($posts)) );
              ?>
              <?php if (have_posts()) : ?>
                                  
              <?php while (have_posts()) : the_post(); ?>
    
                  <?php get_template_part('/post-types/home-normal'); ?>
                              
				<?php endwhile; ?><!-- end post -->
          
              <?php else : endif; ?>
              
              <div class="nav-previous"><?php next_posts_link( __( 'Load More Posts', 'themnific') ); ?></div>
              
              <?php wp_reset_query(); ?>

          </div>
          </div>
          <!-- end latest-->
          
          
          <div id="sidebar"  class="fourcol">
    
              <div class="widgetable">
      
                  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>
                  <?php endif; ?>
              
              </div>
                 
          </div><!-- #sidebar --> 
                          
		
		
		<?php
                
        }
	
}
aq_register_block('AQ_Home_Blog_Infinite');