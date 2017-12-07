<?php
/**
 * Basic theme functions.
 *
 * This file contains hook functions attached to core hooks.
 *
 * @package Blogism
 */

if ( ! function_exists( 'blogism_implement_excerpt_length' ) ) :

	/**
	 * Implement excerpt length.
	 *
	 * @since 1.0.0
	 *
	 * @param int $length The number of words.
	 * @return int Excerpt length.
	 */
	function blogism_implement_excerpt_length( $length ) {

		$excerpt_length = blogism_get_option( 'excerpt_length' );
		$excerpt_length = apply_filters( 'blogism_filter_excerpt_length', $excerpt_length );

		if ( absint( $excerpt_length ) > 0 ) {
			$length = absint( $excerpt_length );
		}

		return $length;

	}

endif;

if ( ! function_exists( 'blogism_implement_read_more' ) ) :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function blogism_implement_read_more( $more ) {

		$flag_apply_excerpt_read_more = apply_filters( 'blogism_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more;
		}

		$output = $more;
		$read_more_text = blogism_get_option( 'read_more_text' );
		if ( ! empty( $read_more_text ) ) {
			$output = ' <a href="' . esc_url( get_permalink() ) . '" class="read-more">' . esc_html( $read_more_text ) . '</a>';
			$output = apply_filters( 'blogism_filter_read_more_link' , $output );
		}
		return $output;

	}

endif;

if ( ! function_exists( 'blogism_content_more_link' ) ) :

	/**
	 * Implement read more in content.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more_link Read More link element.
	 * @param string $more_link_text Read More text.
	 * @return string Link.
	 */
	function blogism_content_more_link( $more_link, $more_link_text ) {

		$flag_apply_excerpt_read_more = apply_filters( 'blogism_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more_link;
		}

		$read_more_text = blogism_get_option( 'read_more_text' );
		if ( ! empty( $read_more_text ) ) {
			$more_link = str_replace( $more_link_text, esc_html( $read_more_text ), $more_link );
		}
		return $more_link;

	}

endif;

if ( ! function_exists( 'blogism_custom_body_class' ) ) :

	/**
	 * Custom body class.
	 *
	 * @since 1.0.0
	 *
	 * @param string|array $input One or more classes to add to the class list.
	 * @return array Array of classes.
	 */
	function blogism_custom_body_class( $input ) {

		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$input[] = 'group-blog';
		}

		// Home content status.
		$home_content_status = blogism_get_option( 'home_content_status' );
		if ( true !== $home_content_status ) {
			$input[] = 'home-content-not-enabled';
		}

		// Custom header status.
		$header_image_url = apply_filters( 'blogism_filter_custom_header_image_url', '' );
		if ( $header_image_url ) {
			$input[] = 'custom-header-enabled';
		} else {
			$input[] = 'custom-header-disabled';
		}

		// Global layout.
		global $post;
		$global_layout = blogism_get_option( 'global_layout' );
		$global_layout = apply_filters( 'blogism_filter_theme_global_layout', $global_layout );

		// Check if single.
		if ( $post  && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'blogism_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		$input[] = 'global-layout-' . esc_attr( $global_layout );

		// Common class for three columns.
		switch ( $global_layout ) {
			case 'three-columns':
				$input[] = 'three-columns-enabled';
				break;

			default:
				break;
		}

		return $input;

	}
endif;

add_filter( 'body_class', 'blogism_custom_body_class' );

if ( ! function_exists( 'blogism_custom_content_width' ) ) :

	/**
	 * Custom content width.
	 *
	 * @since 1.0.0
	 */
	function blogism_custom_content_width() {

		global $post, $wp_query, $content_width;

		$global_layout = blogism_get_option( 'global_layout' );
		$global_layout = apply_filters( 'blogism_filter_theme_global_layout', $global_layout );

		// Check if single.
		if ( $post  && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'blogism_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = esc_attr( $post_options['post_layout'] );
			}
		}
		switch ( $global_layout ) {

			case 'no-sidebar':
				$content_width = 1220;
				break;

			case 'three-columns':
				$content_width = 570;
				break;

			case 'left-sidebar':
			case 'right-sidebar':
				$content_width = 895;
				break;

			default:
				break;
		}

	}
endif;

add_filter( 'template_redirect', 'blogism_custom_content_width' );

if ( ! function_exists( 'blogism_hook_read_more_filters' ) ) :

	/**
	 * Hook read more filters.
	 *
	 * @since 1.0.0
	 */
	function blogism_hook_read_more_filters() {
		if ( is_home() || is_category() || is_tag() || is_author() || is_date() ) {

			add_filter( 'excerpt_length', 'blogism_implement_excerpt_length', 999 );
			add_filter( 'the_content_more_link', 'blogism_content_more_link', 10, 2 );
			add_filter( 'excerpt_more', 'blogism_implement_read_more' );

		}
	}
endif;

add_action( 'wp', 'blogism_hook_read_more_filters' );

if ( ! function_exists( 'blogism_tinymce_init' ) ) :

	/**
	 * Customize TinyMCE.
	 *
	 * @since 1.0.0
	 */
	function blogism_tinymce_init( $init ) {

		// Remove H1 from TinyMCE so users are discouraged from breaking headings hierarchy.
		$init['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6';

		return $init;
	}

endif;

add_filter( 'tiny_mce_before_init', 'blogism_tinymce_init' );

if ( ! function_exists( 'blogism_exclude_sticky_posts' ) ) :

	/**
	 * Exclude sticky posts.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Query $q The WP_Query instance.
	 */
	function blogism_exclude_sticky_posts( $q ) {

		if ( ! $q->is_admin() && $q->is_home() && $q->is_main_query() ) {
			$stickies = (array)get_option( 'sticky_posts' );
			if ( ! empty( $stickies ) ) {
				$featured_block_status = blogism_get_option( 'featured_block_status' );
				$featured_block_type   = blogism_get_option( 'featured_block_type' );
				if ( 'disabled' !== $featured_block_status && 'sticky-posts' === $featured_block_type ) {
					$featured_block_number = blogism_get_option( 'featured_block_number' );
					$to_exclude = array_slice( $stickies, 0, $featured_block_number );
					if ( ! empty( $to_exclude ) ) {
						$q->set( 'post__not_in', $to_exclude );
					}
				}
			}
		}

	}

endif;

add_action( 'pre_get_posts', 'blogism_exclude_sticky_posts' );
