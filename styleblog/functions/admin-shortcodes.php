<?php

//////////////
/* MENU  */
//////////////

function tmnf_magmenu($atts, $content = null) {
	extract(shortcode_atts(array(
		"pagination" => 'true',
		"query" => '',
		"category" => '',
	), $atts));
	global $wp_query,$paged,$post;
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	if(!empty($category)){
		$query .= 'showposts=3&category_name='.$category;
	}
	if(!empty($query)){
		$query .= $query;
	}
	$wp_query->query($query);
	ob_start();
	?>
	<ul class="loop">
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<li><?php get_template_part('/post-types/menu-post'); ?></li>
	<?php endwhile; ?>
	</ul>
    <?php wp_reset_query(); ?>
	<?php $wp_query = null; $wp_query = $temp;
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
	wp_reset_query();
}
add_shortcode("magmenu", "tmnf_magmenu");


//2nd mega menu
function tmnf_magmenu2($atts, $content = null) {
	extract(shortcode_atts(array(
		"pagination" => 'true',
		"query" => '',
		"category" => '',
	), $atts));
	global $wp_query,$paged,$post;
	$temp = $wp_query;
	$wp_query= null;
	$wp_query = new WP_Query();
	if(!empty($category)){
		$query .= 'showposts=4&category_name='.$category;
	}
	if(!empty($query)){
		$query .= $query;
	}
	$wp_query->query($query);
	ob_start();
	?>
	<ul class="loop">
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<li><?php get_template_part('/post-types/menu-post'); ?></li>
	<?php endwhile; ?>
	</ul>
    <?php wp_reset_query(); ?>
	<?php $wp_query = null; $wp_query = $temp;
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
	wp_reset_query();
}
add_shortcode("magmenu2", "tmnf_magmenu2");

?>