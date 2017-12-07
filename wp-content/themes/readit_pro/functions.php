<?php
/**
 * readit functions and definitions
 *
 * @package readit pro
 */

 
/**
 * register the theme update
 */ 
require 'theme-updates/theme-update-checker.php';
$MyThemeUpdateChecker = new ThemeUpdateChecker(
'readit_pro', //Theme slug. Usually the same as the name of its directory.
'http://modernthemes.net/updates/?action=get_metadata&slug=readit_pro' //Metadata URL.
);
// Подключение плагина MultiPostThumbnails
if (class_exists('MultiPostThumbnails')) {
 
new MultiPostThumbnails(array(
'label' => 'Выява на галоўнай старонцы',
'id' => 'secondary-image',
'post_type' => 'post'
 ));
 
}


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
	add_image_size( 'blog-thumbnail', 700 );
	add_image_size( 'slide-thumbnail', 1000 );

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
	
	register_sidebar( array(
		'name'          => __( 'Footer 1', 'readit' ),
		'id'            => 'footer-1',
		'description'   => __( 'Populate your first Footer area', 'readit' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'readit' ),
		'id'            => 'footer-2',
		'description'   => __( 'Populate your second Footer area', 'readit' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'readit' ),
		'id'            => 'footer-3',
		'description'   => __( 'Populate your third Footer area', 'readit' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'readit' ),
		'id'            => 'footer-4',
		'description'   => __( 'Populate your fourth Footer area', 'readit' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Addtional Sidebar 1', 'readit' ),
		'id'            => 'add-sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Addtional Sidebar 2', 'readit' ),
		'id'            => 'add-sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Addtional Sidebar 3', 'readit' ),
		'id'            => 'add-sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Addtional Sidebar 4', 'readit' ),
		'id'            => 'add-sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">', 
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Addtional Sidebar 5', 'readit' ),
		'id'            => 'add-sidebar-5',
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

	wp_enqueue_style( 'readit-menu', get_template_directory_uri() . '/css/menu.css' );
	
	wp_enqueue_style( 'readit-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.css' );  

	wp_enqueue_script( 'readit-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'readit-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'readit-buggyfill', get_template_directory_uri() . '/js/viewport-units-buggyfill.js', array(), false, true );
	

	if ( get_theme_mod('readit_animate') != 1 ) {
		
	wp_enqueue_script( 'readit-animate', get_template_directory_uri() . '/js/animate-plus.js', array('jquery'), false, true ); 
	
	wp_enqueue_style( 'readit-animate', get_template_directory_uri() . '/css/animate.css' );
	
	}
	
	wp_enqueue_script( 'readit-classie', get_template_directory_uri() . '/js/classie.js', array(), false, true );

	if ( is_single() ) { 
	
	wp_enqueue_style( 'readit-transition', get_template_directory_uri() . '/css/transition.css' );
	
	wp_enqueue_script( 'readit-transition', get_template_directory_uri() . '/js/transition.script.js', array(), false, true );
	
	} 

	wp_enqueue_script( 'readit-menu', get_template_directory_uri() . '/js/menu.js', array('jquery'), false, true );

	wp_enqueue_script( 'readit-scripts', get_template_directory_uri() . '/js/readit.scripts.js', array(), false, true );
	
	if ( is_page_template( 'page-home-masonry-fullscreen.php' ) || is_page_template( 'page-home-masonry-no-sidebar.php'  ) || is_page_template( 'page-home-masonry-sidebar.php' ) ) {

	wp_enqueue_script( 'readit-images-loaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), false, false );

	wp_enqueue_script( 'readit-masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array(), false, true );

	wp_enqueue_script( 'readit-masonry-scripts', get_template_directory_uri() . '/js/masonry-script.js', array(), false, true );
	
	}
	
	if ( is_page_template( 'page-home-slider.php' ) ) {

	wp_enqueue_style( 'readit-slick', get_template_directory_uri() . '/css/slick.css' );

	wp_enqueue_script( 'readit-slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), false, true );

	wp_enqueue_script( 'readit-slick-script', get_template_directory_uri() . '/js/slick.script.js', array(), false, true );
	
	}

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

/**
 * Activate for a child theme.  Always use a child theme to make edits.
 */
require_once( trailingslashit( get_template_directory() ) . '/inc/use-child-theme.php' );

/**
 * Slider Post Type.
 */
function slider_post_type() {

	$labels = array(
		'name'                => _x( 'Slides', 'Post Type General Name', 'readit' ),
		'singular_name'       => _x( 'Slide', 'Post Type Singular Name', 'readit' ),
		'menu_name'           => __( 'Slides', 'readit' ),
		'parent_item_colon'   => __( 'Parent Item:', 'readit' ),
		'all_items'           => __( 'All Slides', 'readit' ),
		'view_item'           => __( 'View Slides', 'readit' ),
		'add_new_item'        => __( 'Add New Slide', 'readit' ),
		'add_new'             => __( 'Add New', 'readit' ),
		'edit_item'           => __( 'Edit Slide', 'readit' ),
		'update_item'         => __( 'Update Slide', 'readit' ),
		'search_items'        => __( 'Search Slides', 'readit' ),
		'not_found'           => __( 'Not found', 'readit' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'readit' ),
	);
	$args = array(
		'label'               => __( 'slides', 'readit' ),
		'description'         => __( 'Add a slide to your schedule.', 'readit' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', ),
		'taxonomies'          => array( 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'slider', $args );

}

// Hook into the 'init' action
add_action( 'init', 'slider_post_type', 0 );	


function slider_metaboxes( $meta_boxes ) {
    $prefix = '_slide_'; // Prefix for all fields
    $meta_boxes['slider_metabox'] = array(
        'id' => 'slider_metabox',
        'title' => __( 'Slide URL', 'readit' ), 
        'pages' => array('slider'), // post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'fields' => array(
            array(
				'name' => __( 'Enter URL', 'readit' ),
				'id'   => $prefix . 'url',
				'type' => 'text_url',
			),
        ),
    );

    return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'slider_metaboxes' );


/**
 * Initialize custom meta 
 */
add_action( 'init', 'readit_be_initialize_cmb_meta_boxes', 9999 );
function readit_be_initialize_cmb_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'meta/init.php' );
    }
} 
