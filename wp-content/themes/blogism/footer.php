<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogism
 */

	/**
	 * Hook - blogism_action_after_content.
	 *
	 * @hooked blogism_content_end - 10
	 */
	do_action( 'blogism_action_after_content' );
?>

	<?php
	/**
	 * Hook - blogism_action_before_footer.
	 *
	 * @hooked blogism_add_footer_bottom_widget_area - 5
	 * @hooked blogism_footer_start - 10
	 */
	do_action( 'blogism_action_before_footer' );
	?>
    <?php
	  /**
	   * Hook - blogism_action_footer.
	   *
	   * @hooked blogism_footer_copyright - 10
	   */
	  do_action( 'blogism_action_footer' );
	?>
	<?php
	/**
	 * Hook - blogism_action_after_footer.
	 *
	 * @hooked blogism_footer_end - 10
	 */
	do_action( 'blogism_action_after_footer' );
	?>

<?php
	/**
	 * Hook - blogism_action_after.
	 *
	 * @hooked blogism_page_end - 10
	 * @hooked blogism_footer_goto_top - 20
	 */
	do_action( 'blogism_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
