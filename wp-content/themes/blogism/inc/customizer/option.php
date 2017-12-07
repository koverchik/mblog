<?php
/**
 * Theme Options.
 *
 * @package Blogism
 */

$default = blogism_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => esc_html__( 'Theme Options', 'blogism' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);

// Header Section.
$wp_customize->add_section( 'section_header',
	array(
	'title'      => esc_html__( 'Header Options', 'blogism' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting show_title.
$wp_customize->add_setting( 'theme_options[show_title]',
	array(
	'default'           => $default['show_title'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_title]',
	array(
	'label'    => esc_html__( 'Show Site Title', 'blogism' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show_tagline.
$wp_customize->add_setting( 'theme_options[show_tagline]',
	array(
	'default'           => $default['show_tagline'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_tagline]',
	array(
	'label'    => esc_html__( 'Show Tagline', 'blogism' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

// Setting show_social_in_header.
$wp_customize->add_setting( 'theme_options[show_social_in_header]',
	array(
	'default'           => $default['show_social_in_header'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_in_header]',
	array(
	'label'    => esc_html__( 'Show Social Icons', 'blogism' ),
	'section'  => 'section_header',
	'type'     => 'checkbox',
	'priority' => 100,
	)
);

$wp_customize->add_setting( 'theme_options[search_in_header]',
	array(
		'default'           => $default['search_in_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogism_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[search_in_header]',
	array(
		'label'    => esc_html__( 'Enable Search Form', 'blogism' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Layout Section.
$wp_customize->add_section( 'section_layout',
	array(
	'title'      => esc_html__( 'Layout Options', 'blogism' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting global_layout.
$wp_customize->add_setting( 'theme_options[global_layout]',
	array(
	'default'           => $default['global_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[global_layout]',
	array(
	'label'    => esc_html__( 'Global Layout', 'blogism' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => blogism_get_global_layout_options(),
	'priority' => 100,
	)
);
// Setting archive_layout.
$wp_customize->add_setting( 'theme_options[archive_layout]',
	array(
	'default'           => $default['archive_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_layout]',
	array(
	'label'    => esc_html__( 'Archive Layout', 'blogism' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => blogism_get_archive_layout_options(),
	'priority' => 100,
	)
);

// Setting archive_image.
$wp_customize->add_setting( 'theme_options[archive_image]',
	array(
	'default'           => $default['archive_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[archive_image]',
	array(
	'label'    => esc_html__( 'Image in Archive', 'blogism' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => blogism_get_image_sizes_options( true, array( 'disable', 'large' ), false ),
	'priority' => 100,
	)
);

// Setting single_image.
$wp_customize->add_setting( 'theme_options[single_image]',
	array(
	'default'           => $default['single_image'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[single_image]',
	array(
	'label'    => esc_html__( 'Image in Single Post/Page', 'blogism' ),
	'section'  => 'section_layout',
	'type'     => 'select',
	'choices'  => blogism_get_image_sizes_options( true, array( 'disable', 'large' ), false ),
	'priority' => 100,
	)
);

// Home Page Section.
$wp_customize->add_section( 'section_home_page',
	array(
	'title'      => esc_html__( 'Home Page Options', 'blogism' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting home_content_status.
$wp_customize->add_setting( 'theme_options[home_content_status]',
	array(
	'default'           => $default['home_content_status'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[home_content_status]',
	array(
	'label'       => esc_html__( 'Show Home Content', 'blogism' ),
	'description' => esc_html__( 'Check this to show page content in Home page.', 'blogism' ),
	'section'     => 'section_home_page',
	'type'        => 'checkbox',
	'priority'    => 100,
	)
);

// Pagination Section.
$wp_customize->add_section( 'section_pagination',
	array(
	'title'      => esc_html__( 'Pagination Options', 'blogism' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting pagination_type.
$wp_customize->add_setting( 'theme_options[pagination_type]',
	array(
	'default'           => $default['pagination_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[pagination_type]',
	array(
	'label'       => esc_html__( 'Pagination Type', 'blogism' ),
	'section'     => 'section_pagination',
	'type'        => 'select',
	'choices'     => blogism_get_pagination_type_options(),
	'priority'    => 100,
	)
);

// Footer Section.
$wp_customize->add_section( 'section_footer',
	array(
	'title'      => esc_html__( 'Footer Options', 'blogism' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => esc_html__( 'Copyright Text', 'blogism' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Setting show_social_in_footer.
$wp_customize->add_setting( 'theme_options[show_social_in_footer]',
	array(
		'default'           => $default['show_social_in_footer'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogism_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[show_social_in_footer]',
	array(
		'label'    => esc_html__( 'Show Social Icons', 'blogism' ),
		'section'  => 'section_footer',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Blog Section.
$wp_customize->add_section( 'section_blog',
	array(
	'title'      => esc_html__( 'Blog Options', 'blogism' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting excerpt_length.
$wp_customize->add_setting( 'theme_options[excerpt_length]',
	array(
	'default'           => $default['excerpt_length'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'theme_options[excerpt_length]',
	array(
	'label'       => esc_html__( 'Excerpt Length', 'blogism' ),
	'description' => esc_html__( 'in words', 'blogism' ),
	'section'     => 'section_blog',
	'type'        => 'number',
	'priority'    => 100,
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 55px;' ),
	)
);

// Setting read_more_text.
$wp_customize->add_setting( 'theme_options[read_more_text]',
	array(
	'default'           => $default['read_more_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'theme_options[read_more_text]',
	array(
	'label'    => esc_html__( 'Read More Text', 'blogism' ),
	'section'  => 'section_blog',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Breadcrumb Section.
$wp_customize->add_section( 'section_breadcrumb',
	array(
	'title'      => esc_html__( 'Breadcrumb Options', 'blogism' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_option_panel',
	)
);

// Setting breadcrumb_type.
$wp_customize->add_setting( 'theme_options[breadcrumb_type]',
	array(
	'default'           => $default['breadcrumb_type'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_select',
	)
);
$wp_customize->add_control( 'theme_options[breadcrumb_type]',
	array(
	'label'       => esc_html__( 'Breadcrumb Type', 'blogism' ),
	'section'     => 'section_breadcrumb',
	'type'        => 'select',
	'choices'     => blogism_get_breadcrumb_type_options(),
	'priority'    => 100,
	)
);
