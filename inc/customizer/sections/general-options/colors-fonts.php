<?php
/**
 * Colors and Fonts Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_change_colors_panel' );

/**
 * D kaigi change colors panel function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_change_colors_panel( $wp_customize ) {
	$wp_customize->get_section( 'colors' )->title    = esc_html__( 'Colors and Fonts', 'd-kaigi' );
	$wp_customize->get_section( 'colors' )->priority = 1;
	$wp_customize->get_section( 'colors' )->panel    = 'd_kaigi_general_panel';
}


add_action( 'customize_register', 'd_kaigi_customize_color_options' );

/**
 * D kaigi customize color options function
 *
 * @param ovject $wp_customize .
 * @return void
 */
function d_kaigi_customize_color_options( $wp_customize ) {
	$wp_customize->add_setting(
		'more_color_options',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Custom_Text(
			$wp_customize,
			'more_color_options',
			array(
				'label'    => esc_html__( 'More color options available in Pro Version.', 'd-kaigi' ),
				'section'  => 'colors',
				'settings' => 'more_color_options',
				'type'     => 'customtext',
			)
		)
	);
}
