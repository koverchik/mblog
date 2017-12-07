<?php
/**
 * Theme Options related to featured block.
 *
 * @package Blogism
 */

$default = blogism_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_featured_block_panel', array(
	'title'    => esc_html__( 'Featured Block', 'blogism' ),
	'priority' => 100,
) );

// Featured Block Type Section.
$wp_customize->add_section( 'section_theme_featured_block_type', array(
	'title'    => esc_html__( 'Featured Block Type', 'blogism' ),
	'priority' => 100,
	'panel'    => 'theme_featured_block_panel',
) );

// Setting featured_block_status.
$wp_customize->add_setting( 'theme_options[featured_block_status]', array(
	'default'           => $default['featured_block_status'],
	'sanitize_callback' => 'blogism_sanitize_select',
) );
$wp_customize->add_control( 'theme_options[featured_block_status]', array(
	'label'    => esc_html__( 'Enable Featured Block On', 'blogism' ),
	'section'  => 'section_theme_featured_block_type',
	'type'     => 'select',
	'priority' => 100,
	'choices'  => blogism_get_featured_block_content_options(),
) );

// Setting featured_block_type.
$wp_customize->add_setting( 'theme_options[featured_block_type]', array(
	'default'           => $default['featured_block_type'],
	'sanitize_callback' => 'blogism_sanitize_select',
) );
$wp_customize->add_control( 'theme_options[featured_block_type]', array(
	'label'           => esc_html__( 'Select Featured Block Type', 'blogism' ),
	'section'         => 'section_theme_featured_block_type',
	'type'            => 'select',
	'priority'        => 100,
	'choices'         => blogism_get_featured_block_type(),
	'active_callback' => 'blogism_is_featured_block_active',
) );

// Setting featured_block_number.
$wp_customize->add_setting( 'theme_options[featured_block_number]', array(
	'default'           => $default['featured_block_number'],
	'sanitize_callback' => 'blogism_sanitize_number_range',
) );
$wp_customize->add_control( 'theme_options[featured_block_number]', array(
	'label'           => esc_html__( 'No of Blocks', 'blogism' ),
	'description'     => esc_html__( 'Enter number between 1 and 6.', 'blogism' ),
	'section'         => 'section_theme_featured_block_type',
	'type'            => 'number',
	'priority'        => 100,
	'active_callback' => 'blogism_is_featured_block_active',
	'input_attrs'     => array( 'min' => 1, 'max' => 6, 'step' => 1, 'style' => 'width: 55px;' ),
) );

// Featured Block Options Section.
$wp_customize->add_section( 'section_theme_block_options', array(
	'title'      => esc_html__( 'Featured Block Options', 'blogism' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'theme_featured_block_panel',
) );

// Setting featured_block_column.
$wp_customize->add_setting( 'theme_options[featured_block_column]', array(
	'default'           => $default['featured_block_column'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'blogism_sanitize_number_range',
) );
$wp_customize->add_control( 'theme_options[featured_block_column]', array(
	'label'       => esc_html__( 'No of Columns', 'blogism' ),
	'section'     => 'section_theme_block_options',
	'type'        => 'number',
	'priority'    => 100,
	'input_attrs' => array( 'min' => 3, 'max' => 4, 'step' => 1, 'style' => 'width: 55px;' ),
) );
