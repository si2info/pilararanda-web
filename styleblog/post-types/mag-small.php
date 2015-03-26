<div class="mag-small">

    <a class="imglink" href="<?php tmnf_permalink(); ?>">
    
        <?php the_post_thumbnail( 'tabs',array('class' => "tranz grayscale grayscale-fade"));?>
    
    </a>
      
  	<a class="meta" href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>">
  
  		<?php echo short_title('...', 15); ?>
        
        <?php echo tmnf_icon();?>
  
  	</a>
    
    <?php tmnf_meta_date() ?>

</div>