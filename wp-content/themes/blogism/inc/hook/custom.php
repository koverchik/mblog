<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Blogism
 */

if ( ! function_exists( 'blogism_skip_to_content' ) ) :

	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function blogism_skip_to_content() {
		?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogism' ); ?></a><?php
	}
endif;

add_action( 'blogism_action_before', 'blogism_skip_to_content', 15 );


if ( ! function_exists( 'blogism_site_branding' ) ) :

	/**
	 * Site branding.
	 *
	 * @since 1.0.0
	 */
	function blogism_site_branding() {

		?>
		<div class="main-site-branding">

				<?php do_action( 'blogism_action_custom_header' ); ?>

				<div class="site-branding-wrapper">
					<div class="container">
					<div class="branding-inner-wrapper">
						<div class="site-branding">
							<?php blogism_the_custom_logo(); ?>

							<?php $show_title = blogism_get_option( 'show_title' ); ?>
							<?php $show_tagline = blogism_get_option( 'show_tagline' ); ?>
							<?php if ( true === $show_title || true === $show_tagline ) : ?>
								<div id="site-identity">
									<?php if ( true === $show_title ) : ?>
										<?php if ( is_front_page() && is_home() ) : ?>
											<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php else : ?>
											<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ( true === $show_tagline ) : ?>
										<p class="site-description"><?php bloginfo( 'description' ); ?></p>
									<?php endif; ?>
								</div><!-- #site-identity -->
							<?php endif; ?>
						</div><!-- .site-branding -->
						</div> <!-- .branding-inner-wrapper -->
					</div><!-- .container -->
			   </div><!-- .site-branding-wrapper -->
			</div>  <!-- .main-site-branding -->

		<div class="container">
			<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'blogism' ); ?></button>
			<div id="site-header-menu" class="site-header-menu clear-fix">
				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'blogism' ); ?>">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'primary-menu',
							'fallback_cb'    => 'blogism_primary_navigation_fallback',
						 ) );
					?>
				</nav><!-- .main-navigation -->
			</div><!-- #site-header-menu -->

		</div><!-- .container -->


		<?php
	}

endif;

add_action( 'blogism_action_header', 'blogism_site_branding' );

if ( ! function_exists( 'blogism_footer_copyright' ) ) :

	/**
	 * Footer copyright.
	 *
	 * @since 1.0.0
	 */
	function blogism_footer_copyright() {

		// Check if footer is disabled.
		$footer_status = apply_filters( 'blogism_filter_footer_status', true );
		if ( true !== $footer_status ) {
			return;
		}

		// Footer Menu.
		$footer_menu_content = wp_nav_menu( array(
			'theme_location' => 'footer',
			'container'      => 'div',
			'container_id'   => 'footer-navigation',
			'depth'          => 1,
			'fallback_cb'    => false,
			'echo'           => false,
		) );

		// Copyright content.
		$copyright_text = blogism_get_option( 'copyright_text' );
		$copyright_text = apply_filters( 'blogism_filter_copyright_text', $copyright_text );
		if ( ! empty( $copyright_text ) ) {
			$copyright_text = wp_kses_data( $copyright_text );
		}

		// Powered by content.
		$powered_by_text = sprintf( esc_html__( 'Blogism by %s', 'blogism' ), '<a rel="designer" href="https://wenthemes.com/">' . esc_html__( 'WEN Themes', 'blogism' ) . '</a>' );

		$show_social_in_footer = blogism_get_option( 'show_social_in_footer' );

		$column_count = 0;

		if ( $footer_menu_content ) {
			$column_count++;
		}
		if ( $copyright_text ) {
			$column_count++;
		}
		if ( $powered_by_text ) {
			$column_count++;
		}
		if ( true === $show_social_in_footer && has_nav_menu( 'social' ) ) {
			$column_count++;
		}

		?>

		<div class="colophon-inner colophon-grid-<?php echo esc_attr( $column_count ); ?>">

		    <?php if ( ! empty( $copyright_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="copyright">
			    		<?php echo $copyright_text; ?>
			    	</div><!-- .copyright -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( true === $show_social_in_footer && has_nav_menu( 'social' ) ) : ?>
			    <div class="colophon-column">
			    	<div class="footer-social">
			    		<?php the_widget( 'Blogism_Social_Widget' ); ?>
			    	</div><!-- .footer-social -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( ! empty( $footer_menu_content ) ) : ?>
		    	<div class="colophon-column">
		    		<nav class="footer-menu" role="navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'blogism' ); ?>">
					<?php echo $footer_menu_content; ?>
					</nav><!-- .footer-menu -->
		    	</div><!-- .colophon-column -->
		    <?php endif; ?>

		    <?php if ( ! empty( $powered_by_text ) ) : ?>
			    <div class="colophon-column">
			    	<div class="site-info">
			    		<?php echo $powered_by_text; ?>
			    	</div><!-- .site-info -->
			    </div><!-- .colophon-column -->
		    <?php endif; ?>

		</div><!-- .colophon-inner -->

	    <?php
	}

endif;

add_action( 'blogism_action_footer', 'blogism_footer_copyright', 10 );


if ( ! function_exists( 'blogism_add_sidebar' ) ) :

	/**
	 * Add sidebar.
	 *
	 * @since 1.0.0
	 */
	function blogism_add_sidebar() {

		global $post;

		$global_layout = blogism_get_option( 'global_layout' );
		$global_layout = apply_filters( 'blogism_filter_theme_global_layout', $global_layout );

		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'blogism_theme_settings', true );
			if ( isset( $post_options['post_layout'] ) && ! empty( $post_options['post_layout'] ) ) {
				$global_layout = $post_options['post_layout'];
			}
		}

		// Include primary sidebar.
		if ( 'no-sidebar' !== $global_layout ) {
			get_sidebar();
		}

		// Include secondary sidebar.
		switch ( $global_layout ) {
			case 'three-columns':
				get_sidebar( 'secondary' );
				break;

			default:
				break;
		}

	}

endif;

add_action( 'blogism_action_sidebar', 'blogism_add_sidebar' );


if ( ! function_exists( 'blogism_custom_posts_navigation' ) ) :
	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function blogism_custom_posts_navigation() {

		$pagination_type = blogism_get_option( 'pagination_type' );

		switch ( $pagination_type ) {

			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'blogism_action_posts_navigation', 'blogism_custom_posts_navigation' );


if ( ! function_exists( 'blogism_add_image_in_single_display' ) ) :

	/**
	 * Add image in single post.
	 *
	 * @since 1.0.0
	 */
	function blogism_add_image_in_single_display() {

		global $post;

		if ( has_post_thumbnail() ) {

			$values = get_post_meta( $post->ID, 'blogism_theme_settings', true );
			$blogism_theme_settings_single_image = isset( $values['single_image'] ) ? esc_attr( $values['single_image'] ) : '';

			if ( ! $blogism_theme_settings_single_image ) {
				$blogism_theme_settings_single_image = blogism_get_option( 'single_image' );
			}

			if ( 'disable' !== $blogism_theme_settings_single_image ) {
				$args = array(
					'class' => 'aligncenter',
				);
				the_post_thumbnail( esc_attr( $blogism_theme_settings_single_image ), $args );
			}
		}

	}

endif;

add_action( 'blogism_single_image', 'blogism_add_image_in_single_display' );

if ( ! function_exists( 'blogism_add_breadcrumb' ) ) :

	/**
	 * Add breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function blogism_add_breadcrumb() {

		// Bail if Breadcrumb disabled.
		$breadcrumb_type = blogism_get_option( 'breadcrumb_type' );
		if ( 'disabled' === $breadcrumb_type ) {
			return;
		}

		// Bail if Home Page.
		if ( is_front_page() || is_home() ) {
			return;
		}

		echo '<div id="breadcrumb"><div class="container">';
		switch ( $breadcrumb_type ) {
			case 'simple':
				blogism_simple_breadcrumb();
				break;

			default:
				break;
		}
		echo '</div><!-- .container --></div><!-- #breadcrumb -->';

	}

endif;

add_action( 'blogism_action_before_content', 'blogism_add_breadcrumb' , 7 );

if ( ! function_exists( 'blogism_footer_goto_top' ) ) :

	/**
	 * Go to top.
	 *
	 * @since 1.0.0
	 */
	function blogism_footer_goto_top() {

		echo '<a href="#page" class="scrollup" id="btn-scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i><span class="screen-reader-text">' . esc_html__( 'Go to top', 'blogism' ) . '</span></a>';

	}

endif;

add_action( 'blogism_action_after', 'blogism_footer_goto_top', 20 );

if ( ! function_exists( 'blogism_add_author_bio_in_single' ) ) :

	/**
	 * Display Author bio.
	 *
	 * @since 1.0.0
	 */
	function blogism_add_author_bio_in_single() {

		// Bail if not singular post.
		if ( ! is_singular( 'post' ) ) {
			return;
		}

		$author_description = get_the_author_meta( 'description' );

		if ( $author_description ) {
			get_template_part( 'template-parts/author-bio', 'single' );
		}
	}

endif;

add_action( 'blogism_author_bio', 'blogism_add_author_bio_in_single' );

if ( ! function_exists( 'blogism_header_top_content' ) ) :

	/**
	 * Header Top.
	 *
	 * @since 1.0.0
	 */
	function blogism_header_top_content() {
		$search_in_header      = blogism_get_option( 'search_in_header' );
		$show_social_in_header = blogism_get_option( 'show_social_in_header' );

		if ( false === $search_in_header && ( false === $show_social_in_header || false === has_nav_menu( 'social' ) ) ) {
			return;
		}
		?>
		<div id="tophead">
			<div class="container">
				<?php if ( true === $show_social_in_header && has_nav_menu( 'social' ) ) : ?>
					<div class="header-social-wrapper">
						<?php the_widget( 'Blogism_Social_Widget' ); ?>
					</div><!-- .header-social-wrapper -->
				<?php endif; ?>

				<?php if ( true === $search_in_header ) : ?>
					<div class="header-search-box">
						<div class="search-box-wrap">
							<?php get_search_form(); ?>
						</div><!-- .search-box-wrap -->
					</div><!-- .header-search-box -->
				<?php endif; ?>

			</div> <!-- .container -->
		</div><!--  #tophead -->

		<?php
	}

endif;

add_action( 'blogism_action_before_header', 'blogism_header_top_content', 5 );

if ( ! function_exists( 'blogism_check_home_page_content' ) ) :

	/**
	 * Check home page content status.
	 *
	 * @since 1.0.0
	 *
	 * @param bool $status Home page content status.
	 * @return bool Modified home page content status.
	 */
	function blogism_check_home_page_content( $status ) {

		if ( is_front_page() ) {
			$home_content_status = blogism_get_option( 'home_content_status' );
			if ( false === $home_content_status ) {
				$status = false;
			}
		}

		return $status;

	}

endif;

add_action( 'blogism_filter_home_page_content', 'blogism_check_home_page_content' );

if ( ! function_exists( 'blogism_check_front_page_widget_status' ) ) :

	/**
	 * Check status of front page widget area.
	 *
	 * @since 1.0.0
	 */
	function blogism_check_front_page_widget_status( $input ) {

		if ( is_front_page() && ! is_home() ) {
			$input = true;
		}
		else {
			$input = false;
		}

		return $input;

	}
endif;

add_filter( 'blogism_filter_front_page_widget_status', 'blogism_check_front_page_widget_status' );

if ( ! function_exists( 'blogism_add_custom_header_section' ) ) :

	/**
	 * Add custom header.
	 *
	 * @since 1.0.0
	 */
	function blogism_add_custom_header_section() {
		$header_image_url = apply_filters( 'blogism_filter_custom_header_image_url', '' );
		if ( empty( $header_image_url ) ) {
			return;
		}
		?>
		<div class="custom-header-wrap">
			<img src="<?php echo esc_url( $header_image_url ); ?>" alt="" />
		</div><!-- .custom-header-wrap -->
		<?php
	}
endif;

add_action( 'blogism_action_custom_header', 'blogism_add_custom_header_section', 5 );

if ( ! function_exists( 'blogism_custom_header_image_url' ) ) :

	/**
	 * Return custom header image URL.
	 *
	 * @since 1.0.0
	 *
	 * @param string $status Custom header image URL.
	 * @return string Modified custom header image URL
	 */
	function blogism_custom_header_image_url( $input ) {

		$image = get_header_image();

		if ( ! empty( $image ) ) {
			$input = $image;
		}

		return $input;

	}
endif;

add_filter( 'blogism_filter_custom_header_image_url', 'blogism_custom_header_image_url' );
