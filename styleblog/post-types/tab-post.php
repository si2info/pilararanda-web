<div class="tab-post item">

  <?php if ( has_post_thumbnail()) : ?>
  
       <a href="<?php tmnf_permalink(); ?>" title="<?php echo short_title('...', 6); ?>" >
       
          <?php the_post_thumbnail( 'thumbnail',array('class' => "grayscale grayscale-fade")); ?>
          
       </a>
       
  <?php endif; ?>
      
  <a class="meta" href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>"><?php echo tmnf_icon() ?> <?php echo short_title('...', 10); ?></a>
  
  <?php tmnf_meta_date();?>

</div>