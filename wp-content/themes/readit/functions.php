<?php
/**
 * readit functions and definitions
 *
 * @package readit
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'readit_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function readit_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on readit, use a find and replace
	 * to change 'readit' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'readit', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'readit-blog-thumbnail', 700 ); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'readit' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'readit_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	
	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'image' ) ); 
	
}
endif; // readit_setup
add_action( 'after_setup_theme', 'readit_setup' );


/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function readit_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'readit' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	//Register the sidebar widgets   
	register_widget( 'readit_Video_Widget' ); 
	register_widget( 'readit_Contact_Info' ); 
	
}
add_action( 'widgets_init', 'readit_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function readit_scripts() {
	wp_enqueue_style( 'readit-style', get_stylesheet_uri() );
	
	$headings_font = esc_html(get_theme_mod('headings_fonts'));
	$body_font = esc_html(get_theme_mod('body_fonts'));
	
	if( $headings_font ) {
		wp_enqueue_style( 'readit-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'readit-open-sans', '//fonts.googleapis.com/css?family=Montserrat:400,700');  
	}	
	if( $body_font ) {
		wp_enqueue_style( 'readit-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );	
	} else {
		wp_enqueue_style( 'readit-open-body', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700');
	}

	wp_enqueue_style( 'readit-transition', get_template_directory_uri() . '/css/transition.css' );
	
	wp_enqueue_style( 'readit-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.css' );

	wp_enqueue_style( 'readit-menu', get_template_directory_uri() . '/css/menu.css' );

	wp_enqueue_script( 'readit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'readit-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'readit-buggyfill', get_template_directory_uri() . '/js/viewport-units-buggyfill.js', array(), false, true );

	wp_enqueue_script( 'readit-classie', get_template_directory_uri() . '/js/classie.js', array(), false, true );

	wp_enqueue_script( 'readit-menu', get_template_directory_uri() . '/js/menu.js', array('jquery'), false, true );
	
	if ( is_single() ) { 
	wp_enqueue_script( 'readit-transition', get_template_directory_uri() . '/js/transition.script.js', array(), false, true );
	} 

	wp_enqueue_script( 'readit-scripts', get_template_directory_uri() . '/js/readit.scripts.js', array(), false, true ); 

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'readit_scripts' );


/**
 * Load html5shiv
 */
function readit_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'readit_html5shiv' ); 

/**
 * Change the excerpt length
 */
function readit_excerpt_length( $length ) {
	
	$excerpt = esc_attr( get_theme_mod('exc_length', '40'));
	return $excerpt; 

}

add_filter( 'excerpt_length', 'readit_excerpt_length', 999 );  

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Include additional custom admin panel features. 
 */
require get_template_directory() . '/panel/functions-admin.php';
require get_template_directory() . '/panel/readit-admin_page.php';

/**
 * register your custom widgets
 */ 
require get_template_directory() . "/widgets/contact-info.php"; 
require get_template_directory() . "/widgets/video-widget.php"; 

/**
 * Google Fonts  
 */
require get_template_directory() . '/inc/gfonts.php'; 

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
