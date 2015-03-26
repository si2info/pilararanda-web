<div id="post-nav">
    <?php $prevPost = get_previous_post(true);// false = all categories
        if($prevPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $prevPost->ID
            );
            $prevPost = get_posts($args);
            foreach ($prevPost as $post) {
                setup_postdata($post);
    ?>
        <div class="post-previous item tranz">
            <small><a class="previous" href="<?php the_permalink(); ?>">&laquo; Previous Story</a></small>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail',array('class' => "grayscale grayscale-fade")); ?></a>
            <a class="meta" href="<?php the_permalink(); ?>"><?php echo short_title('...', 10); ?></a>
        </div>
    <?php
                wp_reset_postdata();
            } //end foreach
        } // end if
         
        $nextPost = get_next_post(true);// false = all categories
        if($nextPost) {
            $args = array(
                'posts_per_page' => 1,
                'include' => $nextPost->ID
            );
            $nextPost = get_posts($args);
            foreach ($nextPost as $post) {
                setup_postdata($post);
    ?>
        <div class="post-next item tranz">
            <small><a class="next" href="<?php the_permalink(); ?>">Next Story &raquo;</a></small>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail',array('class' => "grayscale grayscale-fade")); ?></a>
            <a class="meta" href="<?php the_permalink(); ?>"><?php echo short_title('...', 10); ?></a>
        </div>
    <?php
                wp_reset_postdata();
            } //end foreach
        } // end if
    ?>
</div>