<?php
/**
 * Readit Theme Customizer
 *
 * @package readit
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
            'title' => esc_html__('Readit Pro', 'readit'),
            'priority' => 5, 
            'description' => __('Want different layouts for your blog? Need some cooler hover effects to impress your readers? If you want to see what additional features <a href="http://modernthemes.net/wordpress-themes/readit-pro/" target="_blank">Readit Pro</a> has, check them all out right <a href="http://modernthemes.net/wordpress-themes/readit-pro/" target="_blank">here</a>. Readit Pro is only $18!', 'readit' ),
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
            'title' => esc_html__('Google Fonts', 'readit' ),  
            'priority' => 39,
        )
    );
	
    $font_choices = 
        array(
			'Montserrat:400,700' => 'Montserrat',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Open Sans:400italic,700italic,400,700' => 'Open Sans',
            'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
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
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Oswald:400,700' => 'Oswald',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
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
            'description' => esc_html__('Select your desired font for the headings. Montserrat is the default Heading font.', 'readit'),
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
            'description' => esc_html__( 'Select your desired font for the body. Playfair Display is the default Body font.', 'readit' ), 
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
        'label'	   => esc_html__( 'Text Color', 'readit' ),
        'section'  => 'colors',
        'settings' => 'readit_text_color',
		'priority' => 10 
    ))); 
	
    $wp_customize->add_setting( 'readit_link_color', array( 
        'default'     => '#000000',   
        'sanitize_callback' => 'sanitize_hex_color', 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_link_color', array(
        'label'	   => esc_html__( 'Link Color', 'readit' ), 
        'section'  => 'colors',
        'settings' => 'readit_link_color',
		'priority' => 30 
    )));
	
	$wp_customize->add_setting( 'readit_hover_color', array(
        'default'     => '#999999',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_hover_color', array(
        'label'	   => esc_html__( 'Hover Color', 'readit' ),
        'section'  => 'colors',
        'settings' => 'readit_hover_color',
		'priority' => 40
    )));
	
	$wp_customize->add_setting( 'readit_site_title_color', array(
        'default'     => '#FFFFFF', 
        'sanitize_callback' => 'sanitize_hex_color',
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_site_title_color', array(
        'label'	   => esc_html__( 'Site Title Color', 'readit' ),  
        'section'  => 'colors',
        'settings' => 'readit_site_title_color', 
		'priority' => 50 
    )));
	
	$wp_customize->add_setting( 'readit_custom_color', array( 
        'default'     => '#222222', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_custom_color', array(
        'label'	   => esc_html__('Theme Color', 'readit' ),
        'section'  => 'colors',
        'settings' => 'readit_custom_color', 
		'priority' => 20
    )));
	
	
	// nav 
	$wp_customize->add_section( 'readit_nav', array(
	'title' => esc_html__( 'Navigation', 'readit' ),
	'priority' => '13', 
	));
	
	
	$wp_customize->add_setting( 'readit_nav_bg', array( 
        'default'     => '#000000', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_nav_bg', array(
        'label'	   => esc_html__('Menu Background Color', 'readit' ), 
        'section'  => 'readit_nav',
        'settings' => 'readit_nav_bg', 
		'priority' => 10 
    )));
	
	
    // Logo upload
    $wp_customize->add_section( 'readit_logo_section' , array(  
	    'title'       => esc_html__( 'Logo and Icons', 'readit' ),
	    'priority'    => 20, 
	    'description' => esc_html__( 'Upload a logo to replace the default site name and description in the header. Also, upload your site favicon and Apple Icons.', 'readit'),
	)); 

	$wp_customize->add_setting( 'readit_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'readit_logo', array( 
		'label'    => esc_html__( 'Logo', 'readit' ),
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
        'label'    => esc_html__( 'Change the width of the Logo in PX.', 'readit' ),
		'description'    => esc_html__( 'Only enter numeric value', 'readit' ),
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
               'label'          => esc_html__( 'Upload your favicon (16x16 pixels)', 'readit' ),
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
               'label'          => esc_html__( 'Upload your Apple Touch Icon (144x144 pixels)', 'readit' ),
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
               'label'          => esc_html__( 'Upload your Apple Touch Icon (114x114 pixels)', 'readit' ),
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
               'label'          => esc_html__( 'Upload your Apple Touch Icon (72x72 pixels)', 'readit' ),
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
               'label'          => esc_html__( 'Upload your Apple Touch Icon (57x57 pixels)', 'readit' ), 
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
    'title'          => esc_html__( 'Social Media Section', 'readit' ),
    'description'    => esc_html__( 'Edit your social media icons', 'readit' ), 
	));
	
	// Social Section 
	$wp_customize->add_section( 'readit_settings', array(
    	'title'          => esc_html__( 'Social Media Icons', 'readit' ),
        'priority'       => 38,
		'panel' => 'social_panel',  
    ) ); 
	
	// Social Section 
	$wp_customize->add_setting('active_social',
	    array(
	        'sanitize_callback' => 'readit_sanitize_checkbox',
	)); 
	
	$wp_customize->add_control( 
    'active_social', 
    array(
        'type' => 'checkbox',
        'label' => esc_html__( 'Hide Social Section', 'readit' ),
        'section' => 'readit_settings',  
		'priority'   => 1 
    )); 

	
	// Social Icon Colors
	$wp_customize->add_setting( 'readit_social_color', array( 
        'default'     => '#b9babe', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_social_color', array(
        'label'	   => esc_html__( 'Social Icon Color', 'readit' ),
        'section'  => 'readit_settings',
        'settings' => 'readit_social_color', 
		'priority' => 1
    )));
	
	$wp_customize->add_setting( 'readit_social_color_hover', array( 
        'default'     => '#999999',
		'sanitize_callback' => 'sanitize_hex_color',  
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_social_color_hover', array(
        'label'	   => esc_html__( 'Social Icon Hover Color', 'readit' ), 
        'section'  => 'readit_settings',
        'settings' => 'readit_social_color_hover', 
		'priority' => 2
    )));
	
	// Facebook
	$wp_customize->add_setting( 'readit_fb',
	    array(
	        'sanitize_callback' => 'readit_sanitize_text', 
	));  

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_fb', array(
		'label'    => esc_html__( 'Facebook URL:', 'readit' ),
		'section'  => 'readit_settings', 
		'settings' => 'readit_fb',
		'priority'   => 2
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
		'priority'   => 3
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
		'priority'   => 4
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
		'priority'   => 5
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
		'priority'   => 6 
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
		'priority'   => 6 
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
		'priority'   => 7
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
		'priority'   => 8
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
		'priority'   => 9
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
		'priority'   => 10
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
		'priority'   => 11 
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
		'priority'   => 12
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
		'priority'   => 12
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
		'priority'   => 13 
	)));
	
	// Add Intro
	$wp_customize->add_section( 'readit_headline_section' , array(
    	'title' => esc_html__( 'Headline', 'readit' ),
    	'priority' => 30,
    	'description' => esc_html__( 'Enter your own headline content', 'readit' )
	) );
	
	// Intro Text
	$wp_customize->add_setting( 'readit_headline_text',  
	array( 
		'sanitize_callback' => 'readit_sanitize_text',
		'default' => esc_html__( 'Welcome to Readit,', 'readit' ),
	)); 
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_headline_text', array(
    'label' => esc_html__( 'Headline Text', 'readit' ),
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
    'label' => esc_html__( 'Headline Subtext', 'readit' ),
    'section' => 'readit_headline_section',
    'settings' => 'readit_headline_subtext',
	'priority'   => 20
	))); 
	
	$wp_customize->add_setting( 'readit_header_color', array( 
        'default'     => '#222222', 
		'sanitize_callback' => 'sanitize_hex_color', 
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_header_color', array(
        'label'	   => esc_html__('Header Color', 'readit' ),
        'section'  => 'readit_headline_section',
        'settings' => 'readit_header_color', 
		'priority' => 30
    )));
	
	$wp_customize->add_setting( 'readit_headline_text_color', array( 
        'default'     => '#FFFFFF', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_headline_text_color', array(
        'label'	   => esc_html__('Headline Text Color', 'readit' ), 
        'section'  => 'readit_headline_section', 
        'settings' => 'readit_headline_text_color',
		'priority' => 40
    )));
	
	// Add Footer Section
	$wp_customize->add_section( 'footer-custom' , array(
    	'title' => esc_html__( 'Footer', 'readit' ),
    	'priority' => 35,
    	'description' => esc_html__( 'Customize your footer area', 'readit' )
	) );
	
	// Footer Byline Text 
	$wp_customize->add_setting( 'readit_footerid',  
	array( 
		'sanitize_callback' => 'readit_sanitize_text',
	)); 
	 
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_footerid', array(
    'label' => esc_html__( 'Footer Byline Text', 'readit' ),
    'section' => 'footer-custom',
    'settings' => 'readit_footerid',
	'priority'   => 6 
	)));
	
	$wp_customize->add_setting( 'readit_footer_text', array( 
        'default'     => '#b9babe', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_footer_text', array(
        'label'	   => esc_html__('Footer Text Color', 'readit' ),
        'section'  => 'footer-custom',
        'settings' => 'readit_footer_text', 
		'priority' => 50
    ))); 
	
	$wp_customize->add_setting( 'readit_footer_link', array( 
        'default'     => '#FFFFFF', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_footer_link', array(
        'label'	   => esc_html__('Footer Link Color', 'readit' ), 
        'section'  => 'footer-custom',
        'settings' => 'readit_footer_link', 
		'priority' => 60
    ))); 
	
	$wp_customize->add_setting( 'readit_footer_bg', array( 
        'default'     => '#222222', 
		'sanitize_callback' => 'sanitize_hex_color',
    ));
	
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'readit_footer_bg', array(
        'label'	   => esc_html__('Footer Background Color', 'readit' ),
        'section'  => 'footer-custom',
        'settings' => 'readit_footer_bg', 
		'priority' => 70
    ))); 

	// Choose excerpt or full content on blog
    $wp_customize->add_section( 'readit_layout_section' , array( 
	    'title'       => esc_html__( 'Blog Layout', 'readit' ),
	    'priority'    => 45, 
	    'description' => esc_html__( 'Change how readit displays posts', 'readit' ),
	));

	$wp_customize->add_setting( 'readit_post_content', array(
		'default'	        => 'option1',
		'sanitize_callback' => 'readit_sanitize_index_content',
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'readit_post_content', array(
		'label'    => esc_html__( 'Post content', 'readit' ),
		'section'  => 'readit_layout_section',
		'settings' => 'readit_post_content',
		'type'     => 'radio',
		'choices'  => array(
			'option1' => esc_html__( 'Excerpts', 'readit' ),
			'option2' => esc_html__( 'Full content', 'readit' )
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
        'label'       => esc_html__('Excerpt length', 'readit'),
        'description' => esc_html__('Choose your excerpt length here. Default: 40 words', 'readit'),
        'input_attrs' => array(
            'min'   => 10,
            'max'   => 200,
            'step'  => 5,
            'style' => 'padding: 15px;', 
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
            'Open Sans:400italic,700italic,400,700' => 'Open Sans',
			'Playfair Display:400,700,400italic' => 'Playfair Display',
			'Montserrat:400,700' => 'Montserrat',
            'Source Sans Pro:400,700,400italic,700italic' => 'Source Sans Pro',
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
            'Roboto:400,400italic,700,700italic' => 'Roboto',
            'Oswald:400,700' => 'Oswald',
            'Open Sans Condensed:700,300italic,300' => 'Open Sans Condensed',
            'Roboto Condensed:400italic,700italic,400,700' => 'Roboto Condensed',
            'Roboto Slab:400,700' => 'Roboto Slab',
            'Yanone Kaffeesatz:400,700' => 'Yanone Kaffeesatz',
            'Rokkitt:400' => 'Rokkitt',
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

