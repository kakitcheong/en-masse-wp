<?php
/**
 * custom searchform
 */
?>
<form role="search" method="get" class="search-box--aside" action="<?php echo home_url( '/' ); ?>">
	<input type="search" class="search-box__input-text--aside" placeholder="Search …" value="" name="s" title="Search for:" />
	<button type="submit" class="search-box__input-btn" value="Search" /><iron-icon src="<?php echo get_template_directory_uri() ?>/images/global/icons/search-18px.svg"></iron-icon></button>
</form>