<?php
/**
 * Header Layout Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_header_search_section' );

/**
 * D kaigi header search section function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_header_search_section( $wp_customize ) {

	$wp_customize->add_section(
		'd_kaigi_header_search_section',
		array(
			'title'      => esc_html__( 'Header Search', 'd-kaigi' ),
			'panel'      => 'd_kaigi_header_panel',
			'priority'   => 2,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_setting(
		'header_search_display_option',
		array(
			'sanitize_callback' => 'd_kaigi_sanitize_checkbox',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Toggle_Control(
			$wp_customize,
			'header_search_display_option',
			array(
				'label'    => esc_html__( 'Hide / Show Header Search', 'd-kaigi' ),
				'section'  => 'd_kaigi_header_search_section',
				'settings' => 'header_search_display_option',
				'type'     => 'toggle',
			)
		)
	);
}
