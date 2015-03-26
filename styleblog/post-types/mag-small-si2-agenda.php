<div class="mag-small">

    <a class="imglink" href="<?php tmnf_permalink(); ?>">
    
        <?php the_post_thumbnail( 'tabs',array('class' => "tranz grayscale grayscale-fade"));?>
    
    </a>
      
  	<a class="meta" href="<?php tmnf_permalink(); ?>" title="<?php the_title(); ?>">
  
  		<?php echo short_title('...', 15); ?>
        
        <?php echo tmnf_icon();?>
  
  	</a>
    
    <?php //tmnf_meta_date() 
	
		$date = DateTime::createFromFormat('Ymd', get_field('entidades_grinugr_date_ini'));
		echo '<p class="meta date tranz"><i class="icon-clock"></i> <strong>'.$date->format('d/m/Y'). "</strong> " . get_field('entidades_grinugr_time_ini') .'</p>';
	?>

</div>