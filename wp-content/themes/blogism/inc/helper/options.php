<?php
/**
 * Helper functions related to customizer and options.
 *
 * @package Blogism
 */

if ( ! function_exists( 'blogism_get_global_layout_options' ) ) :

	/**
	 * Returns global layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function blogism_get_global_layout_options() {

		$choices = array(
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'blogism' ),
			'right-sidebar' => esc_html__( 'Right Sidebar', 'blogism' ),
			'three-columns' => esc_html__( 'Three Columns', 'blogism' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'blogism' ),
		);
		$output = apply_filters( 'blogism_filter_layout_options', $choices );
		return $output;

	}

endif;

if ( ! function_exists( 'blogism_get_pagination_type_options' ) ) :

	/**
	 * Returns pagination type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function blogism_get_pagination_type_options() {

		$choices = array(
			'default' => esc_html__( 'Default (Older / Newer Post)', 'blogism' ),
			'numeric' => esc_html__( 'Numeric', 'blogism' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'blogism_get_breadcrumb_type_options' ) ) :

	/**
	 * Returns breadcrumb type options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function blogism_get_breadcrumb_type_options() {

		$choices = array(
			'disabled' => esc_html__( 'Disabled', 'blogism' ),
			'simple'   => esc_html__( 'Enabled', 'blogism' ),
		);

		return $choices;

	}

endif;


if ( ! function_exists( 'blogism_get_archive_layout_options' ) ) :

	/**
	 * Returns archive layout options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function blogism_get_archive_layout_options() {

		$choices = array(
			'full'    => esc_html__( 'Full Post', 'blogism' ),
			'excerpt' => esc_html__( 'Post Excerpt', 'blogism' ),
		);
		$output = apply_filters( 'blogism_filter_archive_layout_options', $choices );
		if ( ! empty( $output ) ) {
			ksort( $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'blogism_get_image_sizes_options' ) ) :

	/**
	 * Returns image sizes options.
	 *
	 * @since 1.0.0
	 *
	 * @param bool  $add_disable True for adding No Image option.
	 * @param array $allowed Allowed image size options.
	 * @return array Image size options.
	 */
	function blogism_get_image_sizes_options( $add_disable = true, $allowed = array(), $show_dimension = true ) {

		global $_wp_additional_image_sizes;
		$get_intermediate_image_sizes = get_intermediate_image_sizes();
		$choices = array();
		if ( true === $add_disable ) {
			$choices['disable'] = esc_html__( 'No Image', 'blogism' );
		}
		$choices['thumbnail'] = esc_html__( 'Thumbnail', 'blogism' );
		$choices['medium']    = esc_html__( 'Medium', 'blogism' );
		$choices['large']     = esc_html__( 'Large', 'blogism' );
		$choices['full']      = esc_html__( 'Full (original)', 'blogism' );

		if ( true === $show_dimension ) {
			foreach ( array( 'thumbnail', 'medium', 'large' ) as $key => $_size ) {
				$choices[ $_size ] = $choices[ $_size ] . ' (' . get_option( $_size . '_size_w' ) . 'x' . get_option( $_size . '_size_h' ) . ')';
			}
		}

		if ( ! empty( $_wp_additional_image_sizes ) && is_array( $_wp_additional_image_sizes ) ) {
			foreach ( $_wp_additional_image_sizes as $key => $size ) {
				$choices[ $key ] = $key;
				if ( true === $show_dimension ){
					$choices[ $key ] .= ' (' . $size['width'] . 'x' . $size['height'] . ')';
				}
			}
		}

		if ( ! empty( $allowed ) ) {
			foreach ( $choices as $key => $value ) {
				if ( ! in_array( $key, $allowed ) ) {
					unset( $choices[ $key ] );
				}
			}
		}

		return $choices;

	}

endif;

if ( ! function_exists( 'blogism_get_featured_block_content_options' ) ) :

	/**
	 * Returns the featured block content options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function blogism_get_featured_block_content_options() {

		$choices = array(
			'disabled'  => esc_html__( 'Disabled', 'blogism' ),
			'blog-page' => esc_html__( 'Blog Index Only', 'blogism' ),
		);

		$output = apply_filters( 'blogism_filter_featured_block_content_options', $choices );

		return $output;

	}

endif;

if ( ! function_exists( 'blogism_get_featured_block_type' ) ) :

	/**
	 * Returns the featured block type.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function blogism_get_featured_block_type() {

		$choices = array(
			'sticky-posts' => esc_html__( 'Sticky Posts', 'blogism' ),
		);

		$output = apply_filters( 'blogism_filter_featured_block_type', $choices );

		if ( ! empty( $output ) ) {
			ksort( $output );
		}

		return $output;

	}

endif;

if ( ! function_exists( 'blogism_get_image_alignment_options' ) ) :

	/**
	 * Returns image options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Options array.
	 */
	function blogism_get_image_alignment_options() {

		$choices = array(
			'none'   => _x( 'None', 'alignment', 'blogism' ),
			'left'   => _x( 'Left', 'alignment', 'blogism' ),
			'center' => _x( 'Center', 'alignment', 'blogism' ),
			'right'  => _x( 'Right', 'alignment', 'blogism' ),
		);
		return $choices;

	}

endif;

if ( ! function_exists( 'blogism_get_numbers_dropdown_options' ) ) :

	/**
	 * Returns numbers dropdown options.
	 *
	 * @since 1.0.0
	 *
	 * @param int    $min    Min.
	 * @param int    $max    Max.
	 * @param string $prefix Prefix.
	 * @param string $suffix Suffix.
	 * @return array Options array.
	 */
	function blogism_get_numbers_dropdown_options( $min = 1, $max = 4, $prefix = '', $suffix = '' ) {

		$output = array();

		if ( $min <= $max ) {
			for ( $i = $min; $i <= $max; $i++ ) {
				$string = $prefix . $i . $suffix;
				$output[ $i ] = $string;
			}
		}

		return $output;

	}

endif;
