<div class="featured-post item">

  <?php if ( has_post_thumbnail() ){ ?>
  
  		<?php echo tmnf_icon() ?> 
  
       <a href="<?php tmnf_permalink(); ?>" title="<?php echo short_title('...', 6); ?>" >
       
          <?php the_post_thumbnail( 'thumbnail',array('class' => "grayscale grayscale-fade")); ?>
          
       </a>
       
       <div class="featured-post-inn tranz">
      
          <a class="meta" href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 11); ?></a>
          
          <?php //tmnf_meta_date();
		  $date = DateTime::createFromFormat('Ymd', get_field('entidades_grinugr_date_ini'));
		echo '<p class="meta date tranz"><i class="icon-clock"></i> <strong>'.$date->format('d/m/Y'). "</strong> " . get_field('entidades_grinugr_time_ini') .'</p>';
		  ?>
		  
      
      </div>
       
  <?php } else { ?>
      
      <a class="meta" href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>"><?php echo short_title('...', 11); ?></a>
      
      <?php tmnf_meta_date();?>
  
  <?php } ?>

</div>