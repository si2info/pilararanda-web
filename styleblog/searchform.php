<form class="searchform" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
<input type="text" name="s" class="s rad" size="30" value="<?php esc_attr_e('Type and hit enter...','themnific'); ?>" onfocus="if (this.value = '') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php esc_attr_e('Type and hit enter...','themnific'); ?>';}" />
<button class='searchSubmit rad' ><i class="fa fa-search"></i></button>
</form>