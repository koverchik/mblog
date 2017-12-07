<?php
/**
 * readit Theme Customizer
 *
 * @package readit pro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function readit_customize_register( $wp_customize ) { 
	
	//allows donations
    class readit_Info extends WP_Customize_Control { 
     
        public $label = '';
        public function render_content() { 
        ?>

        <?php
        }
    }	
	
	// Pro
    $wp_customize->add_section(
        'readit_theme_info',
        array(
            'title' => __('Readit Pro', 'readit'), 
            'priority' => 5, 
            'description' => __('We created a quick theme setup video to help you get started with Readit Pro. Watch the video by clicking the link below.</br></br><a href="http://modernthemes.net/documentation/readit-documentation/readit-quick-demo-import/" target="_blank">View Video</a>', 'readit'), 
        ) 
    );
	 
    //Donations section 
    $wp_customize->add_setting('readit_help', array(
			'sanitize_callback' => 'readit_no_sanitize',
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
        )
    );
    $wp_customize->add_control( new readit_Info( $wp_customize, 'readit_help', array(
        'section' => 'readit_theme_info', 
        'settings' => 'readit_help', 
        'priority' => 10
        ) )
    );
	
	// Fonts  
    $wp_customize->add_section(
        'readit_typography',
        array(
            'title' => __('Google Fonts', 'readit' ),  
            'priority' => 39,
        )
    );
	
    $font_choices = 
        array(
			'Montserrat:400,700' => 'Montserrat',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Raleway:400,700' => 'Raleway',
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Lobster:400' => 'Lobster',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Mandali:400' => 'Mandali',
			'Vesper Libre:400,700' => 'Vesper Libre',
			'NTR:400' => 'NTR',
			'Dhurjati:400' => 'Dhurjati',
			'Faster One:400' => 'Faster One',
			'Mallanna:400' => 'Mallanna',
			'Averia Libre:400,300,700,400italic,700italic' => 'Averia Libre',
			'Galindo:400' => 'Galindo',
			'Titan One:400' => 'Titan One',
			'Abel:400' => 'Abel',
			'Nunito:400,300,700' => 'Nunito',
			'Poiret One:400' => 'Poiret One',
			'Signika:400,300,600,700' => 'Signika',
			'Muli:400,400italic,300italic,300' => 'Muli',
			'Play:400,700' => 'Play',
			'Bree Serif:400' => 'Bree Serif',
			'Archivo Narrow:400,400italic,700,700italic' => 'Archivo Narrow',
			'Cuprum:400,400italic,700,700italic' => 'Cuprum',
			'Noto Serif:400,400italic,700,700italic' => 'Noto Serif',
			'Pacifico:400' => 'Pacifico',
			'Alegreya:400,400italic,700italic,700,900,900italic' => 'Alegreya',
			'Asap:400,400italic,700,700italic' => 'Asap',
			'Maven Pro:400,500,700' => 'Maven Pro',
			'Dancing Script:400,700' => 'Dancing Script',
			'Karla:400,700,400italic,700italic' => 'Karla',
			'Merriweather Sans:400,300,700,400italic,700italic' => 'Merriweather Sans',
			'Exo:400,300,400italic,700,700italic' => 'Exo',
			'Varela Round:400' => 'Varela Round',
			'Cabin Condensed:400,600,700' => 'Cabin Condensed',
			'PT Sans Caption:400,700' => 'PT Sans Caption',
			'Cinzel:400,700' => 'Cinzel',
			'News Cycle:400,700' => 'News Cycle',
			'Inconsolata:400,700' => 'Inconsolata',
			'Architects Daughter:400' => 'Architects Daughter',
			'Quicksand:400,700,300' => 'Quicksand',
			'Titillium Web:400,300,400italic,700,700italic' => 'Titillium Web',
			'Quicksand:400,700,300' => 'Quicksand',
			'Monda:400,700' => 'Monda',
			'Didact Gothic:400' => 'Didact Gothic',
			'Coming Soon:400' => 'Coming Soon',
			'Ropa Sans:400,400italic' => 'Ropa Sans',
			'Tinos:400,400italic,700,700italic' => 'Tinos',
			'Glegoo:400,700' => 'Glegoo',
			'Pontano Sans:400' => 'Pontano Sans',
			'Fredoka One:400' => 'Fredoka One',
			'Lobster Two:400,400italic,700,700italic' => 'Lobster Two',
			'Quattrocento Sans:400,700,400italic,700italic' => 'Quattrocento Sans',
			'Covered By Your Grace:400' => 'Covered By Your Grace',
			'Changa One:400,400italic' => 'Changa One',
			'Marvel:400,400italic,700,700italic' => 'Marvel',
			'BenchNine:400,700,300' => 'BenchNine',
			'Orbitron:400,700,500' => 'Orbitron',
			'Crimson Text:400,400italic,600,700,700italic' => 'Crimson Text',
			'Bangers:400' => 'Bangers',
			'Courgette:400' => 'Courgette',
    );
    
    $wp_customize->add_setting(
        'headings_fonts',
        array(
            'sanitize_callback' => 'readit_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'headings_fonts',
        array(
            'type' => 'select',
            'description' => __('Select your desired font for the headings. Montserrat is the default Heading font.', 'readit'),
            'section' => 'readit_typography',
            'choices' => $font_choices
        )
    );
    
    $wp_customize->add_setting(
        'body_fonts',
        array(
            'sanitize_callback' => 'readit_sanitize_fonts',
        )
    );
    
    $wp_customize->add_control(
        'body_fonts',
        array(
            'type' => 'select',
            'description' => __( 'Select your desired font for the body. Playfair Display is the default Body font.', 'readit' ), 
            'section' => 'readit_typography',  
            'choices' => $font_choices 
        ) 
    ); 

	// Colors
	$wp_customize->add_setting( 'readit_text_color', array(
        'default'     => '#404040',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_text_color', array(
        'label'	   => __( 'Text Color', 'readit' ),
        'section'  => 'colors',
        'settings' => 'readit_text_color',
		'priority' => 10 
    ))); 
	
    $wp_customize->add_setting( 'readit_link_color', array( 
        'default'     => '#000000',   
        'sanitize_callback' => 'sanitize_hex_color', 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_link_color', array(
        'label'	   => __( 'Link Color', 'readit' ), 
        'section'  => 'colors',
        'settings' => 'readit_link_color',
		'priority' => 30 
    )));
	
	$wp_customize->add_setting( 'readit_hover_color', array(
        'default'     => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_hover_color', array(
        'label'	   => __( 'Hover Color', 'readit' ),
        'section'  => 'colors',
        'settings' => 'readit_hover_color',
		'priority' => 40
    )));
	
	$wp_customize->add_setting( 'readit_site_title_color', array(
        'default'     => '#FFFFFF', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_site_title_color', array(
        'label'	   => __( 'Site Title Color', 'readit' ),  
        'section'  => 'colors',
        'settings' => 'readit_site_title_color', 
		'priority' => 50 
    )));
	
	$wp_customize->add_setting( 'readit_custom_color', array( 
        'default'     => '#222222', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_custom_color', array(
        'label'	   => __('Theme Color', 'readit' ),
        'section'  => 'colors',
        'settings' => 'readit_custom_color', 
		'priority' => 20
    )));
	
	
	// nav 
	$wp_customize->add_section( 'readit_nav', array(
	'title' => __( 'Navigation', 'readit' ),
	'priority' => '13', 
	));
	
	
	$wp_customize->add_setting( 'readit_nav_bg', array( 
        'default'     => '#000000', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_nav_bg', array(
        'label'	   => __('Menu Background Color', 'readit' ), 
        'section'  => 'readit_nav',
        'settings' => 'readit_nav_bg', 
		'priority' => 10
    )));
	
    // Logo upload
    $wp_customize->add_section( 'readit_logo_section' , array(  
	    'title'       => __( 'Logo and Icons', 'readit' ),
	    'priority'    => 20, 
	    'description' => __( 'Upload a logo to replace the default site name and description in the header. Also, upload your site favicon and Apple Icons.', 'readit'),
	)); 

	$wp_customize->add_setting( 'readit_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'readit_logo', array( 
		'label'    => __( 'Logo', 'readit' ),
		'section'  => 'readit_logo_section', 
		'settings' => 'readit_logo',
		'priority' => 1,
	))); 
	
	// Logo Width 
    $wp_customize->add_setting(
        'logo_size',
        array(
            'sanitize_callback' => 'absint',
			'default' => '120' 
    ));
	
    $wp_customize->add_control( 'logo_size', array(  
        'type'        => 'number',
        'priority'    => 2, 
        'section'     => 'readit_logo_section',
        'label'    => __( 'Change the width of the Logo in PX.', 'readit' ),
		'description'    => __( 'Only enter numeric value', 'readit' ),
	)); 
	
	//Favicon Upload
	$wp_customize->add_setting(
		'site_favicon',
		array(
			'default' => (get_stylesheet_directory_uri() . '/img/favicon.png'),
			'sanitize_callback' => 'esc_url_raw', 
		)
	);
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site_favicon',
            array(
               'label'          => __( 'Upload your favicon (16x16 pixels)', 'readit' ),
			   'type' 			=> 'image',
               'section'        => 'readit_logo_section',
               'settings'       => 'site_favicon',
               'priority' => 2, 
            )
        )
    );
    //Apple touch icon 144
    $wp_customize->add_setting(
        'apple_touch_144',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_144',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (144x144 pixels)', 'readit' ),
               'type'           => 'image',
               'section'        => 'readit_logo_section',
               'settings'       => 'apple_touch_144',
               'priority'       => 11,
            )
        )
    );
    //Apple touch icon 114
    $wp_customize->add_setting(
        'apple_touch_114',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw', 
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_114',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (114x114 pixels)', 'readit' ),
               'type'           => 'image',
               'section'        => 'readit_logo_section',
               'settings'       => 'apple_touch_114',
               'priority'       => 12,
            )
        )
    );
    //Apple touch icon 72
    $wp_customize->add_setting(
        'apple_touch_72',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_72',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (72x72 pixels)', 'readit' ),
               'type'           => 'image',
               'section'        => 'readit_logo_section',
               'settings'       => 'apple_touch_72',
               'priority'       => 13,
            )
        )
    );
    //Apple touch icon 57
    $wp_customize->add_setting(
        'apple_touch_57',
        array(
            'default-image' => '',
			'sanitize_callback' => 'esc_url_raw',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'apple_touch_57',
            array(
               'label'          => __( 'Upload your Apple Touch Icon (57x57 pixels)', 'readit' ), 
               'type'           => 'image',
               'section'        => 'readit_logo_section',
               'settings'       => 'apple_touch_57',
               'priority'       => 14,
            )
        )
    );
	
	// Social Panel
	$wp_customize->add_panel( 'social_panel', array(
    'priority'       => 26, 
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Social Media Section', 'readit' ),
    'description'    => __( 'Edit your social media icons', 'readit' ), 
	));
	
	// Social Section 
	$wp_customize->add_section( 'readit_settings', array(
    	'title'          => __( 'Social Media Icons', 'readit' ),
        'priority'       => 38,
		'panel' => 'social_panel',  
    ) ); 
	
	// Header Social Section 
	$wp_customize->add_setting('active_social',
	    array(
	        'sanitize_callback' => 'readit_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 
    'active_social', 
    array(
        'type' => 'checkbox',
        'label' => __( 'Hide Social Section', 'readit' ),
        'section' => 'readit_settings',  
		'priority'   => 1 
    )); 
	
	// Social Icon Colors
	$wp_customize->add_setting( 'readit_social_color', array( 
        'default'     => '#b9babe', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_social_color', array(
        'label'	   => __( 'Social Icon Color', 'readit' ),
        'section'  => 'readit_settings',
        'settings' => 'readit_social_color', 
		'priority' => 1
    )));
	
	$wp_customize->add_setting( 'readit_social_color_hover', array( 
        'default'     => '#999999',
		'sanitize_callback' => 'sanitize_hex_color',  
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_social_color_hover', array(
        'label'	   => __( 'Social Icon Hover Color', 'readit' ), 
        'section'  => 'readit_settings',
        'settings' => 'readit_social_color_hover', 
		'priority' => 2
    )));
	
	// New Window
	$wp_customize->add_setting(
        'readit_social_new_window', 
        array(
            'sanitize_callback' => 'readit_sanitize_checkbox',
            'default' => 0,
    ));
	
    $wp_customize->add_control( 
        'readit_social_new_window',
        array(
            'type' => 'checkbox',
            'label' => esc_html__('Open links in new window?', 'readit'),
            'section'  => 'readit_settings',
            'priority' => 2,       
    ));
	
	// Facebook
	$wp_customize->add_setting( 'readit_fb',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_fb', array(
		'label'    => esc_html__( 'Facebook URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_fb',
		'priority'   => 30
	))); 
	
	// Twitter
	$wp_customize->add_setting( 'readit_twitter',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_twitter', array(
		'label'    => esc_html__( 'Twitter URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_twitter',
		'priority'   => 40
	))); 
	
	// LinkedIn
	$wp_customize->add_setting( 'readit_linked',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_linked', array(
		'label'    => esc_html__( 'LinkedIn URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_linked',
		'priority'   => 50
	)));
	
	// Google Plus
	$wp_customize->add_setting( 'readit_google',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_google', array(
		'label'    => esc_html__( 'Google Plus URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_google',
		'priority'   => 60
	)));
	
	// Instagram
	$wp_customize->add_setting( 'readit_instagram',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_instagram', array(
		'label'    => esc_html__( 'Instagram URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_instagram',
		'priority'   => 70
	)));
	
	// Snapchat
	$wp_customize->add_setting( 'readit_snapchat',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_snapchat', array(
		'label'    => esc_html__( 'Snapchat URL:', 'readit' ),
		'section'  => 'readit_settings',  
		'settings' => 'readit_snapchat',
		'priority'   => 78
	)));
	
	// Vine
	$wp_customize->add_setting( 'readit_vine',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_vine', array(
		'label'    => esc_html__( 'Vine URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_vine', 
		'priority'   => 75 
	)));
	
	// Flickr
	$wp_customize->add_setting( 'readit_flickr',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_flickr', array(
		'label'    => esc_html__( 'Flickr URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_flickr',
		'priority'   => 80
	)));
	
	// Pinterest
	$wp_customize->add_setting( 'readit_pinterest',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_pinterest', array(
		'label'    => esc_html__( 'Pinterest URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_pinterest',
		'priority'   => 90
	)));
	
	// Youtube
	$wp_customize->add_setting( 'readit_youtube',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_youtube', array(
		'label'    => esc_html__( 'YouTube URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_youtube',  
		'priority'   => 100
	)));
	
	// Vimeo
	$wp_customize->add_setting( 'readit_vimeo',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_vimeo', array(
		'label'    => esc_html__( 'Vimeo URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_vimeo',
		'priority'   => 110
	)));
	
	// Tumblr
	$wp_customize->add_setting( 'readit_tumblr',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_tumblr', array(
		'label'    => esc_html__( 'Tumblr URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_tumblr', 
		'priority'   => 120
	)));
	
	// Dribbble
	$wp_customize->add_setting( 'readit_dribbble',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_dribbble', array(
		'label'    => esc_html__( 'Dribbble URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_dribbble',
		'priority'   => 130
	)));
	
	// behance
	$wp_customize->add_setting( 'readit_behance',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_behance', array(
		'label'    => esc_html__( 'Behance URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_behance',
		'priority'   => 132
	)));
	
	// 500px
	$wp_customize->add_setting( 'readit_500px',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_500px', array(
		'label'    => esc_html__( '500px URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_500px',
		'priority'   => 134
	)));
	
	// VK
	$wp_customize->add_setting( 'readit_vk',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_vk', array(
		'label'    => esc_html__( 'VK URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_vk',
		'priority'   => 135
	)));
	
	// yelp
	$wp_customize->add_setting( 'readit_yelp',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_yelp', array(
		'label'    => esc_html__( 'Yelp URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_yelp',
		'priority'   => 140
	)));
	
	// xing
	$wp_customize->add_setting( 'readit_xing',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_xing', array(
		'label'    => esc_html__( 'Xing URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_xing',
		'priority'   => 145
	)));
	
	// skype
	$wp_customize->add_setting( 'readit_skype',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_skype', array(
		'label'    => esc_html__( 'Skype URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_skype',
		'priority'   => 150
	)));
	
	// deviantart
	$wp_customize->add_setting( 'readit_deviant',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_deviant', array(
		'label'    => esc_html__( 'DeviantArt URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_deviant',
		'priority'   => 155
	)));
	
	// reddit
	$wp_customize->add_setting( 'readit_reddit',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_reddit', array(
		'label'    => esc_html__( 'Reddit URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_reddit',
		'priority'   => 160
	)));
	
	// github
	$wp_customize->add_setting( 'readit_github',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_github', array(
		'label'    => esc_html__( 'Github URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_github',
		'priority'   => 165
	)));
	
	// codepen
	$wp_customize->add_setting( 'readit_codepen',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_codepen', array(
		'label'    => esc_html__( 'Codepen URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_codepen',
		'priority'   => 165
	)));
	
	// spotify
	$wp_customize->add_setting( 'readit_spotify',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_spotify', array(
		'label'    => esc_html__( 'Spotify URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_spotify',
		'priority'   => 170
	)));
	
	// soundcloud
	$wp_customize->add_setting( 'readit_soundcloud',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_soundcloud', array(
		'label'    => esc_html__( 'SoundCloud URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_soundcloud',
		'priority'   => 175
	)));
	
	// lastfm
	$wp_customize->add_setting( 'readit_lastfm',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_lastfm', array(
		'label'    => esc_html__( 'lastFM URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_lastfm',
		'priority'   => 180
	)));
	
	// stumbleupon
	$wp_customize->add_setting( 'readit_stumble',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_stumble', array(
		'label'    => esc_html__( 'StumbleUpon URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_stumble',
		'priority'   => 185
	)));
	
	// Weibo
	$wp_customize->add_setting( 'readit_weibo', 
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_weibo', array(
		'label'    => esc_html__( 'Weibo URL:', 'readit' ), 
		'section'  => 'readit_settings',  
		'settings' => 'readit_weibo', 
		'priority'   => 188
	)));
	
	// Phone Number
	$wp_customize->add_setting( 'readit_phone_number_icon',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_phone_number_icon', array(
		'label'    => esc_html__( 'Phone Number:', 'readit' ),
		'section'  => 'readit_settings',
		'settings' => 'readit_phone_number_icon',
		'priority'   => 190
	)));
	
	// Email
	$wp_customize->add_setting( 'readit_email_icon', 
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_email_icon', array(
		'label'    => esc_html__( 'Email:', 'readit' ),
		'section'  => 'readit_settings',
		'settings' => 'readit_email_icon',
		'priority'   => 195
	))); 
	
	// RSS
	$wp_customize->add_setting( 'readit_rss',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text',  
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_rss', array(
		'label'    => esc_html__( 'RSS URL:', 'readit' ), 
		'section'  => 'readit_settings', 
		'settings' => 'readit_rss',
		'priority'   => 200
	)));
	
	
	
	
	// Add Intro
	$wp_customize->add_section( 'readit_headline_section' , array(
    	'title' => __( 'Headline', 'readit' ),
    	'priority' => 30,
    	'description' => __( 'Enter your own headline content', 'readit' )
	) );
	
	// Intro Text
	$wp_customize->add_setting( 'readit_headline_text',  
	array( 
		'sanitize_callback' => 'readit_sanitize_text',
		'default' => 'Welcome to Readit,',
	)); 
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_headline_text', array(
    'label' => __( 'Headline Text', 'readit' ),
    'section' => 'readit_headline_section',
    'settings' => 'readit_headline_text',
	'priority'   => 10
	))); 
	
	// Intro Text
	$wp_customize->add_setting( 'readit_headline_subtext',  
	array( 
		'sanitize_callback' => 'readit_sanitize_text',
		'default' => 'a modern WordPress blog.',
	)); 
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_headline_subtext', array(
    'label' => __( 'Headline Subtext', 'readit' ),
    'section' => 'readit_headline_section',
    'settings' => 'readit_headline_subtext',
	'priority'   => 20
	)));
	
	$wp_customize->add_setting( 'readit_header_color', array( 
        'default'     => '#222222', 
		'sanitize_callback' => 'sanitize_hex_color', 
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_header_color', array(
        'label'	   => __('Header Color', 'readit' ),
        'section'  => 'readit_headline_section',
        'settings' => 'readit_header_color', 
		'priority' => 30
    )));
	
	$wp_customize->add_setting( 'readit_headline_text_color', array( 
        'default'     => '#FFFFFF', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_headline_text_color', array(
        'label'	   => __('Headline Text Color', 'readit' ), 
        'section'  => 'readit_headline_section', 
        'settings' => 'readit_headline_text_color',
		'priority' => 40
    )));
	
	// Add Footer Section
	$wp_customize->add_section( 'footer-custom' , array(
    	'title' => __( 'Footer', 'readit' ),
    	'priority' => 32,
    	'description' => __( 'Customize your footer area', 'readit' )
	) );
	
	// Footer Byline Text 
	$wp_customize->add_setting( 'readit_footerid',  
	array( 
		'sanitize_callback' => 'readit_sanitize_text',
	)); 
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_footerid', array(
    'label' => __( 'Footer Byline Text', 'readit' ),
    'section' => 'footer-custom',
    'settings' => 'readit_footerid',
	'priority'   => 6 
	)));
	
	$wp_customize->add_setting( 'readit_footer_text', array( 
        'default'     => '#b9babe', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_footer_text', array(
        'label'	   => __('Footer Text Color', 'readit' ),
        'section'  => 'footer-custom',
        'settings' => 'readit_footer_text', 
		'priority' => 50
    ))); 
	
	$wp_customize->add_setting( 'readit_footer_link', array( 
        'default'     => '#FFFFFF', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_footer_link', array(
        'label'	   => __('Footer Link Color', 'readit' ), 
        'section'  => 'footer-custom',
        'settings' => 'readit_footer_link', 
		'priority' => 60
    ))); 
	
	$wp_customize->add_setting( 'readit_footer_bg', array( 
        'default'     => '#222222', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_footer_bg', array(
        'label'	   => __('Footer Background Color', 'readit' ),
        'section'  => 'footer-custom',
        'settings' => 'readit_footer_bg', 
		'priority' => 70
    ))); 
	
	//Animations
	$wp_customize->add_section( 'readit_animations' , array(  
	    'title'       => __( 'Animations', 'readit' ),
	    'priority'    => 36,    
	    'description' => __( 'We can make things fly across the screen.', 'readit' ),
	)); 
	
    $wp_customize->add_setting(
        'readit_animate',
        array(
            'sanitize_callback' => 'readit_sanitize_checkbox',
            'default' => 0,
    ));
	
    $wp_customize->add_control( 
        'readit_animate',
        array(
            'type' => 'checkbox',
            'label' => __('Check this box if you want to disable the animations.', 'readit'),
            'section' => 'readit_animations',  
            'priority' => 1,           
    ));

	// Choose excerpt or full content on blog
    $wp_customize->add_section( 'readit_layout_section' , array( 
	    'title'       => __( 'Blog Layout', 'readit' ),
	    'priority'    => 45, 
	    'description' => __( 'Change how readit displays posts', 'readit' ),
	));

	$wp_customize->add_setting( 'readit_post_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'readit_sanitize_index_content',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_post_content', array(
		'label'    => __( 'Post content', 'readit' ),
		'section'  => 'readit_layout_section',
		'settings' => 'readit_post_content',
		'type'     => 'radio',
		'choices'  => array(
			'option1' => 'Excerpts',
			'option2' => 'Full content',
			), 
	)));
	
	//Excerpt
    $wp_customize->add_setting(
        'exc_length',
        array(
            'sanitize_callback' => 'absint',
            'default'           => '40',
    ));
	
    $wp_customize->add_control( 'exc_length', array( 
        'type'        => 'number',
        'priority'    => 2, 
        'section'     => 'readit_layout_section',
        'label'       => __('Excerpt length', 'readit'),
        'description' => __('Choose your excerpt length here. Default: 40 words', 'readit'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5
        ), 
	));

	// Set site name and description to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage'; 
	
	// Move sections up 
	$wp_customize->get_section('static_front_page')->priority = 10; 
	 
}
add_action( 'customize_register', 'readit_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function readit_customize_preview_js() {
	wp_enqueue_script( 'readit_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'readit_customize_preview_js' );

/**
 * Sanitizes a hex color. Identical to core's sanitize_hex_color(), which is not available on the wp_head hook.
 *
 * Returns either '', a 3 or 6 digit hex color (with #), or null.
 * For sanitizing values without a #, see sanitize_hex_color_no_hash().
 *
 * @since 1.7
 */
function readit_sanitize_hex_color( $color ) {
	if ( '#FF0000' === $color ) 
		return '';

	// 3 or 6 hex digits, or the empty string.
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
		return $color;

	return null;
}

/**
 * Sanitizes our post content value (either excerpts or full post content).
 *
 * @since 1.7
 */
function readit_sanitize_index_content( $content ) {
	if ( 'option2' == $content ) {
		return 'option2';
	} else {
		return 'option1';
	}
}

//Checkboxes
function readit_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

//Integers
function readit_sanitize_int( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

//Text
function readit_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//Sanitizes Fonts 
function readit_sanitize_fonts( $input ) {  
    $valid = array(
            'Montserrat:400,700' => 'Montserrat',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Oswald:400,700' => 'Oswald',
			'Raleway:400,700' => 'Raleway',
            'Droid Sans:400,700' => 'Droid Sans',
            'Lato:400,700,400italic,700italic' => 'Lato',
            'Arvo:400,700,400italic,700italic' => 'Arvo',
            'Lora:400,700,400italic,700italic' => 'Lora',
			'Merriweather:400,300italic,300,400italic,700,700italic' => 'Merriweather',
			'Oxygen:400,300,700' => 'Oxygen',
			'PT Serif:400,700' => 'PT Serif', 
            'PT Sans:400,700,400italic,700italic' => 'PT Sans',
            'PT Sans Narrow:400,700' => 'PT Sans Narrow',
			'Cabin:400,700,400italic' => 'Cabin',
			'Fjalla One:400' => 'Fjalla One',
			'Francois One:400' => 'Francois One',
			'Josefin Sans:400,300,600,700' => 'Josefin Sans',  
			'Libre Baskerville:400,400italic,700' => 'Libre Baskerville',
            'Arimo:400,700,400italic,700italic' => 'Arimo',
            'Ubuntu:400,700,400italic,700italic' => 'Ubuntu',
            'Bitter:400,700,400italic' => 'Bitter',
            'Droid Serif:400,700,400italic,700italic' => 'Droid Serif',
			'Lobster:400' => 'Lobster',
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Mandali:400' => 'Mandali',
			'Vesper Libre:400,700' => 'Vesper Libre',
			'NTR:400' => 'NTR',
			'Dhurjati:400' => 'Dhurjati',
			'Faster One:400' => 'Faster One',
			'Mallanna:400' => 'Mallanna',
			'Averia Libre:400,300,700,400italic,700italic' => 'Averia Libre',
			'Galindo:400' => 'Galindo',
			'Titan One:400' => 'Titan One',
			'Abel:400' => 'Abel',
			'Nunito:400,300,700' => 'Nunito',
			'Poiret One:400' => 'Poiret One',
			'Signika:400,300,600,700' => 'Signika',
			'Muli:400,400italic,300italic,300' => 'Muli',
			'Play:400,700' => 'Play',
			'Bree Serif:400' => 'Bree Serif',
			'Archivo Narrow:400,400italic,700,700italic' => 'Archivo Narrow',
			'Cuprum:400,400italic,700,700italic' => 'Cuprum',
			'Noto Serif:400,400italic,700,700italic' => 'Noto Serif',
			'Pacifico:400' => 'Pacifico',
			'Alegreya:400,400italic,700italic,700,900,900italic' => 'Alegreya',
			'Asap:400,400italic,700,700italic' => 'Asap',
			'Maven Pro:400,500,700' => 'Maven Pro',
			'Dancing Script:400,700' => 'Dancing Script',
			'Karla:400,700,400italic,700italic' => 'Karla',
			'Merriweather Sans:400,300,700,400italic,700italic' => 'Merriweather Sans',
			'Exo:400,300,400italic,700,700italic' => 'Exo',
			'Varela Round:400' => 'Varela Round',
			'Cabin Condensed:400,600,700' => 'Cabin Condensed',
			'PT Sans Caption:400,700' => 'PT Sans Caption',
			'Cinzel:400,700' => 'Cinzel',
			'News Cycle:400,700' => 'News Cycle',
			'Inconsolata:400,700' => 'Inconsolata',
			'Architects Daughter:400' => 'Architects Daughter',
			'Quicksand:400,700,300' => 'Quicksand',
			'Titillium Web:400,300,400italic,700,700italic' => 'Titillium Web',
			'Quicksand:400,700,300' => 'Quicksand',
			'Monda:400,700' => 'Monda',
			'Didact Gothic:400' => 'Didact Gothic',
			'Coming Soon:400' => 'Coming Soon',
			'Ropa Sans:400,400italic' => 'Ropa Sans',
			'Tinos:400,400italic,700,700italic' => 'Tinos',
			'Glegoo:400,700' => 'Glegoo',
			'Pontano Sans:400' => 'Pontano Sans',
			'Fredoka One:400' => 'Fredoka One',
			'Lobster Two:400,400italic,700,700italic' => 'Lobster Two',
			'Quattrocento Sans:400,700,400italic,700italic' => 'Quattrocento Sans',
			'Covered By Your Grace:400' => 'Covered By Your Grace',
			'Changa One:400,400italic' => 'Changa One',
			'Marvel:400,400italic,700,700italic' => 'Marvel',
			'BenchNine:400,700,300' => 'BenchNine',
			'Orbitron:400,700,500' => 'Orbitron',
			'Crimson Text:400,400italic,600,700,700italic' => 'Crimson Text',
			'Bangers:400' => 'Bangers',
			'Courgette:400' => 'Courgette',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

//No sanitize - empty function for options that do not require sanitization -> to bypass the Theme Check plugin
function readit_no_sanitize( $input ) {
}

/**
 * Add CSS in <head> for styles handled by the theme customizer 
 *
 * @since 1.5
 */
function readit_add_customizer_css() {
	
	?>
	<!-- readit customizer CSS -->
	<style>
	
		<?php if ( get_theme_mod( 'readit_link_color' ) ) : ?>
		a  { color: <?php echo esc_attr( get_theme_mod( 'readit_link_color' ), '#000000' ) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'readit_hover_color' ) ) : ?>
		a:hover { color: <?php echo esc_attr( get_theme_mod( 'readit_hover_color', '#999999' )) ?>; }
		<?php endif; ?>

		
		<?php if ( get_theme_mod( 'readit_social_color' ) ) : ?>
		.social-media-icons .fa { color: <?php echo esc_attr( get_theme_mod( 'readit_social_color', '#b9babe' )) ?>;  
		-o-transition:.5s;
  		-ms-transition:.5s;
  		-moz-transition:.5s;
  		-webkit-transition:.5s;
  		transition:.5s;  }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'readit_social_color_hover' ) ) : ?>
		.social-media-icons .fa:hover { color: <?php echo esc_attr( get_theme_mod( 'readit_social_color_hover', '#999999' )) ?>; } 
		<?php endif; ?>
		 
		<?php if ( get_theme_mod( 'readit_custom_color' ) ) : ?>
		button, input[type="button"], input[type="reset"], input[type="submit"] { background: <?php echo esc_attr( get_theme_mod( 'readit_custom_color', '#000000' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'readit_custom_color' ) ) : ?>
		button, input[type="button"], input[type="reset"], input[type="submit"], .share-button label { border-color: <?php echo esc_attr( get_theme_mod( 'readit_custom_color', '#000000' )) ?>; } 
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'readit_custom_color' ) ) : ?>
		button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover { border-color: <?php echo esc_attr( get_theme_mod( 'readit_custom_color', '#000000' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'readit_site_title_color' ) ) : ?>
		h1.site-title a, .site-description { color: <?php echo esc_attr( get_theme_mod( 'readit_site_title_color', '#FFFFFF' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'readit_text_color' ) ) : ?>
		body, select, textarea, div.show p, .dummy-title { color: <?php echo esc_attr( get_theme_mod( 'readit_text_color', '#404040' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'readit_entry' ) ) : ?>
		.entry-header .entry-title, .featured-img-header .entry-title, .page-entry-title { color: <?php echo esc_attr( get_theme_mod( 'readit_entry', '#FFFFFF' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'readit_nav_bg' ) ) : ?>
		.cd-primary-nav { background: <?php echo esc_attr( get_theme_mod( 'readit_nav_bg', '#000000' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'readit_header_color' ) ) : ?>
		.entry-header, .bg-img { background: <?php echo esc_attr( get_theme_mod( 'readit_header_color', '#222222' )) ?>; }
		<?php endif; ?> 
		
		<?php if ( get_theme_mod( 'readit_headline_text_color' ) ) : ?>
		.blog-entry-title, .page-entry-title, .title h1 { color: <?php echo esc_attr( get_theme_mod( 'readit_headline_text_color', '#FFFFFF' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'readit_footer_text' ) ) : ?>
		.site-info { color: <?php echo esc_attr( get_theme_mod( 'readit_footer_text', '#b9babe' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'readit_footer_link' ) ) : ?>
		.site-info a { color: <?php echo esc_attr( get_theme_mod( 'readit_footer_link', '#FFFFFF' )) ?>; }
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'readit_footer_bg' ) ) : ?>
		.site-footer { background: <?php echo esc_attr( get_theme_mod( 'readit_footer_bg', '#222222' )) ?>; } 
		<?php endif; ?>
		
		<?php if ( get_theme_mod( 'readit_headline_bg' ) ) : ?>
		.bg-img  { background: <?php echo esc_attr( get_theme_mod( 'readit_headline_bg', '#222222' )) ?>; } 
		<?php endif; ?>
		  
	</style>
    
<?php } 
add_action( 'wp_head', 'readit_add_customizer_css' );  

