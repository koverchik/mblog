<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Blogism
 */

if ( ! function_exists( 'blogism_posted_on' ) ) :

	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function blogism_posted_on() {

		echo '<span class="posted-on">';
		echo '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">';
		echo '<span class="entry-day">' . get_the_time( _x( 'd', 'date format', 'blogism' ) ) . '</span>';
		echo '<span class="entry-month">' . get_the_time( _x( 'M', 'date format', 'blogism' ) ) . '</span>';
		echo '</a>';
		echo '</span>';

	}
endif;

if ( ! function_exists( 'blogism_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function blogism_entry_footer() {

		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			$byline = sprintf(
				'%s',
				'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
			);

			if ( ! empty( $byline ) ) {
				echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
			}

			/* Translators: used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( esc_html__( ', ', 'blogism' ) );
			if ( $categories_list && blogism_categorized_blog() ) {
				printf( '<span class="cat-links">%1$s</span>', $categories_list ); // WPCS: XSS OK.
			}

			/* Translators: used between list items, there is a space after the comma. */
			$tags_list = get_the_tag_list( '', esc_html__( ', ', 'blogism' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links">%1$s</span>', $tags_list ); // WPCS: XSS OK.
			}

		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'blogism' ), esc_html__( '1 Comment', 'blogism' ), esc_html__( '% Comments', 'blogism' ) );
			echo '</span>';
		}

		edit_post_link( esc_html__( 'Edit', 'blogism' ), '<span class="edit-link">', '</span>' );
	}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function blogism_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'blogism_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'blogism_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so blogism_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so blogism_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in blogism_categorized_blog.
 */
function blogism_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'blogism_categories' );
}
add_action( 'edit_category', 'blogism_category_transient_flusher' );
add_action( 'save_post',     'blogism_category_transient_flusher' );
