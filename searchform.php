<?php


?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div>
		<input type="search" class="search-field" value="" name="s" id="s" />
		<label for="s"><?php esc_html_e('Search', 'lauraheino'); ?></label>
		<button type="submit" class="search-submit"><?php get_template_part('assets/icons/inline', 'icon-search.svg') ?></button>
	</div>	
</form>