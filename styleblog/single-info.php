<div class="postinfo">    

	<span class="cntr meta likes"><?php echo getPostLikeLink( get_the_ID() ); ?></span> 

<?php
	
	the_tags( '<p class="meta cntr">' . __( '<i class="icon-tag-empty"></i> ','themnific') . '', ', ', '</p>');
	

	// breadcrumbs
	if (get_option('themnific_post_breadcrumbs_dis') == 'true' );
	else { ?>
        <span class="bread meta">
        <?php tmnf_breadcrumbs()?>
        </span> 
        <?php }

	
	// author
	if (get_option('themnific_post_author_dis') == 'true' );
	else
	get_template_part('/includes/mag-authorinfo');
	echo '';
	
	
	// prev/next	
	if (get_option('themnific_post_author_dis') == 'true' );
	else
	get_template_part('/includes/mag-nextprev');
	echo '<div class="clearfix"></div><div class="hrline"></div>';


	// related
	if (get_option('themnific_post_related_dis') == 'true' );
	else 
	get_template_part('/includes/mag-relatedposts');

	
?>
            
</div>

<div class="clearfix"></div>
 			
            

                        
