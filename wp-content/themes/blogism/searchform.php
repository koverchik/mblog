<?php
/**
 * Search form.
 *
 * @package Blogism
 */

?>
<div class="searchform" role="search">
	<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php $search_form_id = rand( 100, 999 ); ?>
		<div class="searchform-inner">
			<label for="s<?php echo absint( $search_form_id ); ?>" class="screen-reader-text"><?php echo esc_html_x( 'Search for:', 'label', 'blogism' ) ?>
			</label>
			<input type="text" name="s" id="s<?php echo absint( $search_form_id ); ?>" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'blogism' ); ?>" value="<?php echo get_search_query(); ?>" class="search-field" />
			<button type="submit" class="button search-submit">&#xf002<span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'blogism' ); ?></span></button>
		</div><!-- .searchform-inner -->
	</form>
</div><!-- .searchform -->
