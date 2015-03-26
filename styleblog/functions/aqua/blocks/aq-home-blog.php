<?php
/** A simple text block **/
class AQ_Home_Blog extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Posts - Blog',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('aq_Home_Blog', $block_options);
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
			<label for="<?php echo $this->get_field_id('posts'); ?>">Number of posts:</label>
			<input class="widefat" style="width: 30px;" id="<?php echo $this->get_field_id('posts'); ?>" name="<?php echo $this->get_field_name('posts'); ?>" value="<?php echo esc_attr($instance['posts']); ?>" />
		</p>
        

		<p class="description">
			<label for="<?php echo $this->get_field_id('query_type_sel') ?>">
				Pick a query type (Latest vs. Popular)<br/>
               <?php echo aq_field_select('query_type_sel', $block_id, $query_type, $query_type_sel, $block_id); ?>
			</label>
		</p>
        
        
        <p class="description">
			<label for="<?php echo $this->get_field_id('moretitle') ?>">
				More Posts - Link Title (optional)
				<input id="<?php echo $this->get_field_id('moretitle') ?>" class="input-full" type="text" value="<?php echo esc_attr($moretitle) ?>" name="<?php echo $this->get_field_name('moretitle') ?>">
			</label>
		</p>
        
        <p class="description">
			<label for="<?php echo $this->get_field_id('urlmore') ?>">
				More Posts - URL to archive (optional)
				<input id="<?php echo $this->get_field_id('urlmore') ?>" class="input-full" type="text" value="<?php echo esc_url($urlmore) ?>" name="<?php echo $this->get_field_name('urlmore') ?>">
			</label>
		</p>
		<?php
	}
	
		
		
		
		function block($instance) {
                extract($instance);
        $title = $instance['title'];
        $moretitle = $instance['moretitle'];
        $urlmore = $instance['urlmore'];
		$query_type = $instance['query_type_sel'];
		$categories = $instance['categories'];
		$posts = $instance['posts'];

		?>
        
			<?php if ( $title == "") {} else { ?>
			<h2 class="block block_fix2"><a href="<?php echo get_category_link($categories); ?>"><?php echo esc_attr($title); ?></a></h2>
			<?php } ?>
        	
			<?php
			$popularpost = new WP_Query(array(
				'showposts' => esc_attr($posts),
				'cat' => $categories,
				'meta_key' => 'post_views_count',
				'orderby' => 'meta_value_num',
				'order' => 'DESC'
			));
			
			$recent_posts = new WP_Query(array(
				'showposts' => esc_attr($posts),
				'cat' => $categories,
			));
			?>

			<?php if ($query_type_sel == 'popular'){ ?>           
                        
                <!-- popular-->
                
                <div id="content" class="eightcol first">
                <div class="blogger">
                
				<?php 
                while ( $popularpost->have_posts() ) : $popularpost->the_post();?>

					<?php get_template_part('/post-types/home-normal'); ?>
            
				<?php endwhile; ?>
                
                <?php wp_reset_query(); ?>
            
				<?php if ( $urlmore == "") {} else { ?>
                
                    <a class="mainbutton morebutton" href="<?php echo esc_url($urlmore); ?>"><?php echo esc_attr($moretitle); ?> <i class="fa fa-arrow-circle-o-right"></i></a>
                
                <?php } ?>
                
                </div>
                </div>
                <!-- end popular-->
                
                
            
            <?php } else { ?>    
            
                <!-- latest-->
                <div id="content" class="eightcol first">
                <div class="blogger">

				<?php 
                while ( $recent_posts->have_posts() ) : $recent_posts->the_post();?>
    
					<?php get_template_part('/post-types/home-normal'); ?>
                                
				<?php endwhile; ?>
                
                <?php wp_reset_query(); ?>
            
				<?php if ( $urlmore == "") {} else { ?>
                
                    <a class="mainbutton morebutton" href="<?php echo esc_url($urlmore); ?>"><?php echo esc_attr($moretitle); ?> <i class="fa fa-arrow-circle-o-right"></i></a>
                
                <?php } ?>

                </div>
                </div>
                <!-- end latest-->

            
            <?php }  ?> 
                

                <div id="sidebar"  class="fourcol">
          
                    <div class="widgetable">
            
                        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>
                        <?php endif; ?>
                    
                    </div>
                       
                </div><!-- #sidebar --> 
                
			<?php
                
        }
	
}
aq_register_block('AQ_Home_Blog');