<?php
$summary = get_post_meta($post->ID, 'tmnf_rating_summary', true);
$rating_1 = get_post_meta($post->ID, 'tmnf_rating_1', true);
$rating_2 = get_post_meta($post->ID, 'tmnf_rating_2', true);
$rating_3 = get_post_meta($post->ID, 'tmnf_rating_3', true);
$rating_4 = get_post_meta($post->ID, 'tmnf_rating_4', true);
$rating_5 = get_post_meta($post->ID, 'tmnf_rating_5', true);
$rating_6 = get_post_meta($post->ID, 'tmnf_rating_6', true);
$rating_7 = get_post_meta($post->ID, 'tmnf_rating_7', true);
$rating_8 = get_post_meta($post->ID, 'tmnf_rating_8', true);
$rating_9 = get_post_meta($post->ID, 'tmnf_rating_9', true);
$rating_10 = get_post_meta($post->ID, 'tmnf_rating_10', true);

$rating_1_label = get_post_meta($post->ID, 'tmnf_rating_1_label', true);
$rating_2_label = get_post_meta($post->ID, 'tmnf_rating_2_label', true);
$rating_3_label = get_post_meta($post->ID, 'tmnf_rating_3_label', true);
$rating_4_label = get_post_meta($post->ID, 'tmnf_rating_4_label', true);
$rating_5_label = get_post_meta($post->ID, 'tmnf_rating_5_label', true);
$rating_6_label = get_post_meta($post->ID, 'tmnf_rating_6_label', true);
$rating_7_label = get_post_meta($post->ID, 'tmnf_rating_7_label', true);
$rating_8_label = get_post_meta($post->ID, 'tmnf_rating_8_label', true);
$rating_9_label = get_post_meta($post->ID, 'tmnf_rating_9_label', true);
$rating_10_label = get_post_meta($post->ID, 'tmnf_rating_10_label', true);
?>

<div class="ratingblock rad">

<div itemprop="review" itemscope itemtype="http://schema.org/Review">
  <meta itemprop="worstRating" content = "1">
  <meta itemprop="ratingValue" content = "<?php echo esc_html(tmnf_rating_raw()) ?>">
  <meta itemprop="bestRating" content = "100">
</div>

<?php
if ($rating_1) echo '<p class="first">'.esc_html($rating_1_label).': '. esc_html($rating_1).'&#37;<br/><span class="partialrating rad"><span class="overrating rad" style="width:'.esc_html($rating_1).'%"></span></span></p>';

if ($rating_2) echo '<p>'.esc_html($rating_2_label).': '.esc_html( $rating_2).'&#37;<br/><span class="partialrating rad"><span class="overrating rad" style="width:'.esc_html($rating_2).'%"></span></span></p>';

if ($rating_3) echo '<p class="first">'.esc_html($rating_3_label).': '.esc_html( $rating_3).'&#37;<br/><span class="partialrating rad"><span class="overrating rad" style="width:'.esc_html($rating_3).'%"></span></span></p>';

if ($rating_4) echo '<p>'.esc_html($rating_4_label).': '.esc_html( $rating_4).'&#37;<br/><span class="partialrating rad"><span class="overrating rad" style="width:'.esc_html($rating_4).'%"></span></span></p>';

if ($rating_5) echo '<p class="first">'.esc_html($rating_5_label).': '. esc_html($rating_5).'&#37;<br/><span class="partialrating rad"><span class="overrating rad" style="width:'.esc_html($rating_5).'%"></span></span></p>';

if ($rating_6) echo '<p>'.esc_html($rating_6_label).': '. esc_html($rating_6).'&#37;<br/><span class="partialrating rad"><span class="overrating rad" style="width:'.esc_html($rating_6).'%"></span></span></p>'; 

if ($rating_7) echo '<p class="first">'.esc_html($rating_7_label).': '. esc_html($rating_7).'&#37;<br/><span class="partialrating rad"><span class="overrating rad" style="width:'.esc_html($rating_7).'%"></span></span></p>';

if ($rating_8) echo '<p>'.esc_html($rating_8_label).': '. esc_html($rating_8).'&#37;<br/><span class="partialrating rad"><span class="overrating rad" style="width:'.esc_html($rating_8).'%"></span></span></p>';

if ($rating_9) echo '<p class="first">'.esc_html($rating_9_label).': '. esc_html($rating_9).'&#37;<br/><span class="partialrating rad"><span class="overrating rad" style="width:'.esc_html($rating_9).'%"></span></span></p>';

if ($rating_10) echo '<p>'.esc_html($rating_10_label).': '. esc_html($rating_10).'&#37;<br/><span class="partialrating rad"><span class="overrating rad" style="width:'.esc_html($rating_10).'%"></span></span></p>'; 

if ($summary) echo '<p class="first full"><span itemprop="summary">' .esc_html( $summary); echo '</span></p>';
?>
<div class="clearfix"></div>
<h2 class="rad"><?php _e('Total Score ','themnific');?> <span class="score rad" itemprop="rating"><?php echo tmnf_rating() ?></span></h2>
</div>