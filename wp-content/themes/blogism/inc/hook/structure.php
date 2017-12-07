<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Blogism
 */

if ( ! function_exists( 'blogism_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function blogism_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'blogism_action_doctype', 'blogism_doctype', 10 );


if ( ! function_exists( 'blogism_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function blogism_head() {
	?>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
	}
endif;
add_action( 'blogism_action_head', 'blogism_head', 10 );

if ( ! function_exists( 'blogism_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function blogism_page_start() {
	?>
    <div id="page" class="hfeed site">
    <?php
	}
endif;
add_action( 'blogism_action_before', 'blogism_page_start' );

if ( ! function_exists( 'blogism_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function blogism_page_end() {
	?></div><!-- #page --><?php
	}
endif;

add_action( 'blogism_action_after', 'blogism_page_end' );

if ( ! function_exists( 'blogism_content_start' ) ) :
	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function blogism_content_start() {
	?><div id="content" class="site-content"><div class="container"><div class="inner-wrapper"><?php
	}
endif;
add_action( 'blogism_action_before_content', 'blogism_content_start' );


if ( ! function_exists( 'blogism_content_end' ) ) :
	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function blogism_content_end() {
	?></div><!-- .inner-wrapper --></div><!-- .container --></div><!-- #content --><?php
	}
endif;
add_action( 'blogism_action_after_content', 'blogism_content_end' );


if ( ! function_exists( 'blogism_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function blogism_header_start() {
	?><header id="masthead" class="site-header" role="banner"><?php
	}
endif;
add_action( 'blogism_action_before_header', 'blogism_header_start' );

if ( ! function_exists( 'blogism_header_end' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function blogism_header_end() {
	?></header><!-- #masthead --><?php
	}
endif;
add_action( 'blogism_action_after_header', 'blogism_header_end' );

if ( ! function_exists( 'blogism_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function blogism_footer_start() {
		$footer_status = apply_filters( 'blogism_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}
	?><footer id="colophon" class="site-footer" role="contentinfo"><div class="container"><?php
	}
endif;
add_action( 'blogism_action_before_footer', 'blogism_footer_start' );


if ( ! function_exists( 'blogism_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function blogism_footer_end() {
		$footer_status = apply_filters( 'blogism_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}
	?></div><!-- .container --></footer><!-- #colophon --><?php
	}
endif;
add_action( 'blogism_action_after_footer', 'blogism_footer_end' );
