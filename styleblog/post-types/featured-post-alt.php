<div class="featured-post item">

  <?php if ( has_post_thumbnail() ){ ?>
  
  		<?php echo tmnf_icon() ?> 
  
       <a href="<?php tmnf_permalink(); ?>" title="<?php echo short_title('...', 6); ?>" >
       
          <?php the_post_thumbnail( 'thumbnail',array('class' => "grayscale grayscale-fade")); ?>
          
       </a>
       
       <div class="featured-post-inn tranz">
      
          <a class="meta" href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 11); ?></a>
          
          <?php tmnf_meta_date();?>
      
      </div>
       
  <?php } else { ?>
      
      <a class="meta" href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 11); ?></a>
      
      <?php tmnf_meta_date();?>
  
  <?php } ?>

</div>