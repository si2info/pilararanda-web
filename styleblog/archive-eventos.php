<?php
/*
Template Name: Lista Eventos
*/
?>
<?php get_header(); ?>
<style>
	.blocker_alt .mag-big{
	width:33%;
	padding-right:17px;
	}
</style>    
<div id="core" class="container">

	<div id="content-inn" class="ghost top-fix">
	
		<div id="aq-block-4492-5" class="aq-block aq-block-aq_home_mag_classic aq_span12 aq-first clearfix">      
        
		 <h2 class="block"><a href="">Agenda</a></h2>
         <!-- latest-->
                <div class="blocker blocker_alt">
    
                <?php 
					
			
					$comparacion='>=';
                   /* $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories,'ignore_sticky_posts'=>1));*/
				   $args = array(
							'post_type' => 'eventos',
							'post_status' => 'publish',
							//'posts_per_page' => $npost,
							//'paged' => $paged,
							'showposts' =>6,
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
							//'meta_value' => date("Ymd"),
							//'meta_compare' => $comparacion,
							//'orderby' => 'meta_value',
							//'order' => 'DESC',
																   
					);
				    function customorderby($orderby) {
					  return 'mt1.meta_value ASC, mt2.meta_value+0 ASC';
					}

					add_filter('posts_orderby','customorderby');
					$recent_posts = new WP_Query( $args );
					remove_filter('posts_orderby','customorderby');
				   $i=0;
                    while($recent_posts->have_posts()): $recent_posts->the_post();
                ?>
    
                   <div class="mag-big item">

								<?php echo tmnf_ratings();?>

								<?php if ( has_post_thumbnail()) : ?>
							  
									<div class="imgwrap">
										
										<a class="imglink" href="<?php tmnf_permalink(); ?>">
										
											<?php the_post_thumbnail( 'mag',array('class' => "tranz grayscale grayscale-fade"));?>
										
										</a>
										
										<?php //tmnf_meta_counter(); ?>
									
									</div>
								   
							  <?php endif; ?>
							  
							  <div class="post-inn">
								  
								  <h2><a href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 14); ?></a></h2>
								  
								  <?php 
									  tmnf_meta_cat(); 
									  //tmnf_meta_date();
									 
										$date = DateTime::createFromFormat('Ymd', get_field('entidades_grinugr_date_ini'));
										echo "<h4><i class='icon-clock'></i><strong>".$date->format('d/m/Y'). "</strong> ". get_field('entidades_grinugr_time_ini') ."</h4>";
									
								  ?>
								  
								  <div class="clearfix"></div>
								  
								  <p class="teaser"><?php echo themnific_excerpt( get_the_excerpt(), '175'); ?></p>
								  
								  <?php tmnf_meta_more() ?>
							  
							  </div>

							</div>
    
                    <?php  $i++; if($i==3): echo "<div class='clearfix'></div><br/><div class='clearfix'></div>"; endif; endwhile; ?>

                   <div class='clearfix'></div><br/><div class='clearfix'></div>
			</div> 
		
		</div>	
		
		
		<div id="aq-block-4492-5" class="aq-block aq-block-aq_home_mag_classic aq_span12 aq-first clearfix">      
        
		 <h2 class="block"><a href="">Pasados</a></h2>
         <!-- latest-->
                <div class="blocker blocker_alt">
    
                <?php 
					
					
					$comparacion='<';
					$paged = get_query_var('paged') ? get_query_var('paged') : 1;
                   /* $recent_posts = new WP_Query(array('showposts' => 1,'cat' => $categories,'ignore_sticky_posts'=>1));*/
				   $args = array(
							'post_type' => 'eventos',
							'post_status' => 'publish',
							'posts_per_page' =>-1,
							'paged' => $paged,
							
							'meta_key' => 'entidades_grinugr_date_ini',	   
							'meta_value' => date("Ymd"),
							'meta_compare' => $comparacion,
							'orderby' => 'meta_value',
							'order' => 'DESC',
																   
					);
				   $recent_posts = new WP_Query($args);
				   $i=0;
                    while($recent_posts->have_posts()): $recent_posts->the_post();
                ?>
    
                   <div class="mag-big item">

								<?php echo tmnf_ratings();?>

								<?php if ( has_post_thumbnail()) : ?>
							  
									<div class="imgwrap">
										
										<a class="imglink" href="<?php tmnf_permalink(); ?>">
										
											<?php the_post_thumbnail( 'mag',array('class' => "tranz grayscale grayscale-fade"));?>
										
										</a>
										
										<?php //tmnf_meta_counter(); ?>
									
									</div>
								   
							  <?php endif; ?>
							  
							  <div class="post-inn">
								  
								  <h2><a href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 14); ?></a></h2>
								  
								  <?php 
									  tmnf_meta_cat(); 
									  //tmnf_meta_date();
									 
										$date = DateTime::createFromFormat('Ymd', get_field('entidades_grinugr_date_ini'));
										echo "<h4><i class='icon-clock'></i><strong>".$date->format('d/m/Y'). "</strong></h4>";
									
								  ?>
								  
								  <div class="clearfix"></div>
								  
								  <p class="teaser"><?php echo themnific_excerpt( get_the_excerpt(), '175'); ?></p>
								  
								  <?php tmnf_meta_more() ?>
							  
							  </div>

							</div>
    
                    <?php  $i++; if($i==3): echo "<div class='clearfix'></div><br/><div class='clearfix'></div>"; endif; endwhile; ?>

                   <div class='clearfix'></div><br/><div class='clearfix'></div>
			</div> 
		
		</div>	
		
		
		
	</div> 
    
</div> 
<div class="clearfix"></div>
    
<?php get_footer(); ?>