<?php
/**
 * Default theme options.
 *
 * @package Blogism
 */

if ( ! function_exists( 'blogism_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function blogism_get_default_theme_options() {

		$defaults = array();

		// Header.
		$defaults['show_title']            = true;
		$defaults['show_tagline']          = true;
		$defaults['show_social_in_header'] = false;
		$defaults['search_in_header']      = true;

		// Layout.
		$defaults['global_layout']  = 'right-sidebar';
		$defaults['archive_layout'] = 'excerpt';
		$defaults['archive_image']  = 'large';
		$defaults['single_image']   = 'large';

		// Home Page.
		$defaults['home_content_status'] = true;

		// Pagination.
		$defaults['pagination_type'] = 'numeric';

		// Footer.
		$defaults['copyright_text']        = esc_html__( 'Copyright &copy; All rights reserved.', 'blogism' );
		$defaults['show_social_in_footer'] = false;

		// Blog.
		$defaults['excerpt_length'] = 40;
		$defaults['read_more_text'] = esc_html__( 'READ MORE', 'blogism' );

		// Breadcrumb.
		$defaults['breadcrumb_type'] = 'simple';

		// Featured Block Options.
		$defaults['featured_block_status']   = 'disabled';
		$defaults['featured_block_type']     = 'sticky-posts';
		$defaults['featured_block_number']   = 3;
		$defaults['featured_block_column']   = 3;

		// Pass through filter.
		$defaults = apply_filters( 'blogism_filter_default_theme_options', $defaults );
		return $defaults;
	}

endif;
