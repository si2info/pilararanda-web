	<?php if(get_option('themnific_headeradscript')) { 
    
        echo '<div class="headad">';
     
        echo htmlspecialchars_decode(get_option('themnific_headeradscript'));
    
        echo '</div>';
    
    } elseif(get_option('themnific_headeradimg1')) { ?> 
    
        <div class="headad">
        
            <a href="<?php echo esc_url(get_option('themnific_headeradurl1'));?>"><img src="<?php echo esc_url(get_option('themnific_headeradimg1'));?>" alt="" /></a>
            
        </div>
        
    <?php } else {} ?>