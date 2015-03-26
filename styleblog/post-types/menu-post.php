<div class="menu-post item">

  <?php if ( has_post_thumbnail()) : ?>
  
      <div class="imgwrap">
      
          <?php tmnf_meta_counter() ?>
          
          <a class="imglink" href="<?php tmnf_permalink(); ?>">
          
              <?php the_post_thumbnail( 'mag',array('class' => "tranz grayscale grayscale-fade"));?>
          
          </a>
      
      </div>
       
  <?php endif; ?>
      
  <h4><a href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 11); ?></a></h4>
  
  <?php tmnf_meta_more(); ?>

</div>