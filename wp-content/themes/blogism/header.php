<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blogism
 */

?><?php
	/**
	 * Hook - blogism_action_doctype.
	 *
	 * @hooked blogism_doctype - 10
	 */
	do_action( 'blogism_action_doctype' );
?>
<head>
	<?php
	/**
	 * Hook - blogism_action_head.
	 *
	 * @hooked blogism_head -  10
	 */
	do_action( 'blogism_action_head' );
	?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	/**
	 * Hook - blogism_action_before.
	 *
	 * @hooked blogism_page_start - 10
	 * @hooked blogism_skip_to_content - 15
	 */
	do_action( 'blogism_action_before' );
	?>

    <?php
	  /**
	   * Hook - blogism_action_before_header.
	   *
	   * @hooked blogism_header_start - 10
	   */
	  do_action( 'blogism_action_before_header' );
	?>
		<?php
		/**
		 * Hook - blogism_action_header.
		 *
		 * @hooked blogism_site_branding - 10
		 */
		do_action( 'blogism_action_header' );
		?>
    <?php
	  /**
	   * Hook - blogism_action_after_header.
	   *
	   * @hooked blogism_header_end - 10
	   */
	  do_action( 'blogism_action_after_header' );
	?>

	<?php
	/**
	 * Hook - blogism_action_before_content.
	 *
	 * @hooked blogism_add_breadcrumb - 7
	 * @hooked blogism_content_start - 10
	 */
	do_action( 'blogism_action_before_content' );
	?>
    <?php
	  /**
	   * Hook - blogism_action_content.
	   */
	  do_action( 'blogism_action_content' );
	?>
