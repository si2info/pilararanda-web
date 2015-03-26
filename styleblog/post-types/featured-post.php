<div class="tab-post item">

  <?php if ( has_post_thumbnail()) : ?>
  
       <a href="<?php tmnf_permalink(); ?>" title="<?php echo short_title('...', 6); ?>" >
       
          <?php the_post_thumbnail( 'mag',array('class' => "grayscale grayscale-fade")); ?>
          
       </a>
       
  <?php endif; ?>
      
  <h4><a href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>"><?php echo tmnf_icon() ?> <?php echo short_title('...', 12); ?></a></h4>
  
  <?php tmnf_meta_date();?>

</div>