<?php
/**
 * Template for front page.
 *
 * @package Blogism
 */

if ( 'posts' === get_option( 'show_on_front' ) ) :

	get_template_part( 'home' );

else :

	if ( true === apply_filters( 'blogism_filter_home_page_content', true ) ) :

		get_template_part( 'page' );

	else :

		get_header();

		get_footer();

	endif;

endif;
