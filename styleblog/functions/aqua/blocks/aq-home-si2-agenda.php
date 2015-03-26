<?php
/** A simple text block **/
class AQ_Home_si2_agenda extends AQ_Block {
	
	//set and create block
	function __construct() {
		$block_options = array(
			'name' => 'Posts - Magazine (2)',
			'size' => 'span12',
		);
		
		//create the block
		parent::__construct('AQ_Home_si2_agenda', $block_options);
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
        
       <!-- <p class="description">
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

		</p>-->
		<?php
	}
	
		
		
		
		function block($instance) {
                extract($instance);
        $title = $instance['title'];
		$categories = $instance['categories'];
		//$posts = $instance['posts'];
		$posts = 4;

		?>
        
            <div class="widgetwrap ghost  <?php if($right_lay == 1){echo 'right-layout';} else { } ?> ">
			<?php if ( $title == "") {} else { ?>
			<h2 class="block"><a href="/eventos/"><?php echo esc_attr($title); ?></a></h2>
			<?php } ?>
        	
			<?php
			$comparacion='>=';
			$args = array(
					'post_type' => 'eventos',
					'post_status' => 'publish',
					//'posts_per_page' => $npost,
					//'paged' => $paged,
					'showposts' => esc_attr($posts),
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
					'ignore_sticky_posts'=>1,			   
					//'meta_value' => date("Ymd"),
					//'meta_compare' => $comparacion,
					//'meta_key' => 'entidades_grinugr_date_ini',
					//'orderby' => 'meta_value',
					//'order' => 'ASC',
														   
			);
			/*$recent_posts = new WP_Query(array(
				'showposts' => esc_attr($posts),
				'cat' => $categories,
				'ignore_sticky_posts'=>1
			));*/
			 function customorderby($orderby) {
			  return 'mt1.meta_value ASC, mt2.meta_value+0 ASC';
			}

			add_filter('posts_orderby','customorderby');
			$recent_posts = new WP_Query( $args );
			remove_filter('posts_orderby','customorderby');
			
			?>


            
                <!-- latest-->
                <div class="blocker blocker_alt">
    
                <?php 
                   /* $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories,'ignore_sticky_posts'=>1));*/
				   $args = array(
							'post_type' => 'eventos',
							'post_status' => 'publish',
							//'posts_per_page' => $npost,
							//'paged' => $paged,
							'showposts' =>1,
							
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
							'ignore_sticky_posts'=>1,	
										   
							//'meta_value' => date("Ymd"),
							//'meta_compare' => $comparacion,
							//'orderby' => 'meta_value',
							//'order' => 'ASC',
																   
					);
				

			add_filter('posts_orderby','customorderby');
			$recent_posts = new WP_Query( $args );
			remove_filter('posts_orderby','customorderby');
                    while($recent_posts->have_posts()): $recent_posts->the_post();
                ?>
    
                    <?php get_template_part('/post-types/mag-big-si2-agenda' ); ?>
    
                    <?php  endwhile; ?>

                    <?php  
                    /*$recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories, 'offset' => 1,'ignore_sticky_posts'=>1));*/
					$args = array(
								'post_type' => 'eventos',
								'post_status' => 'publish',
								//'posts_per_page' => $npost,
								//'paged' => $paged,
								'showposts' => 1,
								'offset' => 1,

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
					'ignore_sticky_posts'=>1,	
											   
								//'meta_value' => date("Ymd"),
								//'meta_compare' => $comparacion,
								//'orderby' => 'meta_value',
								//'meta_key' => 'entidades_grinugr_date_ini',
								//'order' => 'ASC',
																	   
						);
				

			add_filter('posts_orderby','customorderby');
			$recent_posts = new WP_Query( $args );
			remove_filter('posts_orderby','customorderby');
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
    
                    <?php get_template_part('/post-types/mag-big-si2-agenda' ); ?>
                                
                    <?php  endwhile; ?>
                
                    <?php  
                    /*$recent_posts = new WP_Query(array('showposts' => $posts,'cat' => $categories, 'offset' => 2,'ignore_sticky_posts'=>1));*/
					$args = array(
							'post_type' => 'eventos',
							'post_status' => 'publish',
							//'posts_per_page' => $npost,
							//'paged' => $paged,
							'showposts' => $posts,
							'offset' => 2,
							'showposts' => esc_attr($posts),
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
							'ignore_sticky_posts'=>1,	
							//'meta_value' => date("Ymd"),
							//'meta_compare' => $comparacion,
							//'orderby' => 'meta_value',
							//'meta_key' => 'entidades_grinugr_date_ini',
							//'order' => 'ASC',
																   
					);
				

			add_filter('posts_orderby','customorderby');
			$recent_posts = new WP_Query( $args );
			remove_filter('posts_orderby','customorderby');
                    while($recent_posts->have_posts()): $recent_posts->the_post(); ?>
                    
                    <?php get_template_part('/post-types/mag-small-si2-agenda' ); ?>
                                
                    <?php  endwhile; ?>
					<div class="mag-small">
						<?php
						echo do_shortcode('[su_button url="/eventos/" target="blank" style="flat" background="#FF4200" size="2" wide="yes" center="yes" radius="0" icon="icon: calendar"]VER AGENDA[/su_button]');
						?>
					</div>		
                </div>
                <?php wp_reset_query(); ?>
                <!-- end latest-->
                
                
            
			</div><!-- end. widgetwrap -->
			<?php
                
        }
	
}
aq_register_block('AQ_Home_si2_agenda');