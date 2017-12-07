<?php
/**
 * Theme functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Blogism
 */

if ( ! function_exists( 'blogism_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function blogism_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'blogism' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'blogism-block', 400, 400, true );

		// Register menu locations.
		register_nav_menus( array(
			'primary'  => esc_html__( 'Primary Menu', 'blogism' ),
			'footer'   => esc_html__( 'Footer Menu', 'blogism' ),
			'social'   => esc_html__( 'Social Menu', 'blogism' ),
			'notfound' => esc_html__( '404 Menu', 'blogism' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'blogism_custom_background_args', array(
			'default-color' => 'f9f9f9',
			'default-image' => '',
		) ) );

		// Set up the WordPress core custom header feature.
		add_theme_support( 'custom-header', apply_filters( 'blogism_custom_header_args', array(
			'default-image'      => '',
			'width'              => 1920,
			'height'             => 700,
			'flex-height'        => true,
			'header-text'        => false,
		) ) );

		// Enable support for selective refresh of widgets in Customizer.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable support for custom logo.
		add_theme_support( 'custom-logo' );

		// Enable support for footer widgets.
		add_theme_support( 'footer-widgets', 4 );

		// Load Supports.
		require_once trailingslashit( get_template_directory() ) . 'inc/support.php';

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );
	}
endif;

add_action( 'after_setup_theme', 'blogism_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blogism_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'blogism_content_width', 640 );
}
add_action( 'after_setup_theme', 'blogism_content_width', 0 );

/**
 * Register widget area.
 */
function blogism_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'blogism' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your Primary Sidebar.', 'blogism' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'blogism' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your Secondary Sidebar.', 'blogism' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'blogism_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function blogism_scripts() {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/third-party/font-awesome/css/font-awesome' . $min . '.css', '', '4.7.0' );

	$fonts_url = blogism_fonts_url();
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'blogism-google-fonts', $fonts_url, array(), null );
	}

	wp_enqueue_style( 'blogism-style', get_stylesheet_uri(), array(), '1.0.3' );

	wp_enqueue_script( 'blogism-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix' . $min . '.js', array(), '20130115', true );

	wp_enqueue_script( 'blogism-navigation', get_template_directory_uri() . '/js/navigation' . $min . '.js', array( 'jquery' ), '1.0.0', true );

	wp_localize_script( 'blogism-navigation', 'blogismScreenReaderText', array(
		'expand'   => __( 'expand child menu', 'blogism' ),
		'collapse' => __( 'collapse child menu', 'blogism' ),
	) );

	wp_enqueue_script( 'blogism-custom', get_template_directory_uri() . '/js/custom' . $min . '.js', array( 'jquery' ), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blogism_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function blogism_admin_scripts( $hook ) {

	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
		wp_enqueue_style( 'blogism-metabox', get_template_directory_uri() . '/css/metabox' . $min . '.css', '', '1.0.0' );
		wp_enqueue_script( 'blogism-metabox', get_template_directory_uri() . '/js/metabox' . $min . '.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-tabs' ), '1.0.0', true );
	}

	if ( 'widgets.php' === $hook ) {
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_media();
		wp_enqueue_style( 'blogism-custom-widgets-style', get_template_directory_uri() . '/css/widgets' . $min . '.css', array(), '1.0.0' );
		wp_enqueue_script( 'blogism-custom-widgets', get_template_directory_uri() . '/js/widgets' . $min . '.js', array( 'jquery' ), '1.0.0', true );
	}

}
add_action( 'admin_enqueue_scripts', 'blogism_admin_scripts' );

/**
 * Load init.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';
