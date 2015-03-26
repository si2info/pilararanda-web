<div class="mag-big item">

	<?php echo tmnf_ratings();?>

	<?php if ( has_post_thumbnail()) : ?>
  
        <div class="imgwrap">
            
            <a class="imglink" href="<?php tmnf_permalink(); ?>">
            
                <?php the_post_thumbnail( 'mag',array('class' => "tranz grayscale grayscale-fade"));?>
            
            </a>
            
            <?php tmnf_meta_counter(); ?>
        
        </div>
       
  <?php endif; ?>
  
  <div class="post-inn">
      
      <h2><a href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 14); ?></a></h2>
      
      <?php 
          tmnf_meta_cat(); 
          tmnf_meta_date();
      ?>
      
      <div class="clearfix"></div>
      
      <p class="teaser"><?php echo themnific_excerpt( get_the_excerpt(), '175'); ?></p>
      
      <?php tmnf_meta_more() ?>
  
  </div>

</div>