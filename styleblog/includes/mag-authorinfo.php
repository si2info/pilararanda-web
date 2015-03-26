        <div class="postauthor vcard author rad" itemscope itemtype="http://data-vocabulary.org/Person">
        	<h4 class="additional"><?php _e('About the Author','themnific');?>: <span class="fn" itemprop="name"><?php the_author_posts_link(); ?></span></h4>
			<?php  echo get_avatar( get_the_author_meta('ID'), '85' );   ?>
 			<div class="authordesc"><?php the_author_meta('description'); ?></div>
            
            <div class="authoricons">
                <p>
                    <a href="<?php esc_url(the_author_meta('facebook')); ?>" class="<?php if(the_author_meta('facebook') == '') echo 'hidd'; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="<?php esc_url(the_author_meta('twitter')); ?>" class="<?php if(the_author_meta('twitter') == '') echo 'hidd'; ?>" target="_blank" ><i class="fa fa-twitter"></i></a>
                    <a href="<?php esc_url(the_author_meta('google')); ?>?rel=author" class="<?php if(the_author_meta('google') == '') echo 'hidd'; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
                    <a href="<?php esc_url(the_author_meta('pinterest')); ?>" class="<?php if(the_author_meta('pinterest') == '') echo 'hidd'; ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                    <a href="<?php esc_url(the_author_meta('instagram')); ?>" class="<?php if(the_author_meta('instagram') == '') echo 'hidd'; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="<?php esc_url(the_author_meta('linkedin')); ?>" class="<?php if(the_author_meta('linkedin') == '') echo 'hidd'; ?>" target="_blank" ><i class="fa fa-linkedin"></i></a>
                    <a href="<?php esc_url(the_author_meta('link')); ?>" itemprop="url" class="<?php if(the_author_meta('link') == '') echo 'hidd'; ?>" target="_blank"><i class="fa fa-link"></i></a>
                </p>
            </div>
            
		</div>
		<div class="cleafix"></div>