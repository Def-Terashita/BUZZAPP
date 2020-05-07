<?php
/**
 * Recommended Trips Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_customize_register_banner_section' );

/**
 * D kaigi customize register banner section function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_customize_register_banner_section( $wp_customize ) {

	$wp_customize->add_section(
		'd_kaigi_banner_sections',
		array(
			'title'       => esc_html__( 'Banner News', 'd-kaigi' ),
			'description' => esc_html__( 'Banner News :', 'd-kaigi' ),
			'panel'       => 'd_kaigi_theme_options_panel',
			'priority'    => 2,
		)
	);

	$wp_customize->add_setting(
		'banner_display_option',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'd_kaigi_sanitize_checkbox',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Toggle_Control(
			$wp_customize,
			'banner_display_option',
			array(
				'label'    => esc_html__( 'Hide / Show', 'd-kaigi' ),
				'section'  => 'd_kaigi_banner_sections',
				'settings' => 'banner_display_option',
				'type'     => 'toggle',
			)
		)
	);

	$wp_customize->add_setting(
		'banner_section_title',
		array(
			'sanitize_callback' => 'wp_kses_post',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		'banner_section_title',
		array(
			'label'    => esc_attr__( 'Title', 'd-kaigi' ),
			'section'  => 'd_kaigi_banner_sections',
			'settings' => 'banner_section_title',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'banner_category',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Customize_Dropdown_Taxonomies_Control(
			$wp_customize,
			'banner_category',
			array(
				'label'    => esc_html__( 'Choose category', 'd-kaigi' ),
				'section'  => 'd_kaigi_banner_sections',
				'settings' => 'banner_category',
				'type'     => 'dropdown-taxonomies',
			)
		)
	);
}
