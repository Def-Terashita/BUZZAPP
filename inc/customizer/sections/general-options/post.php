<?php
/**
 * Post Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_customize_post_option' );

/**
 * D kaigi customize post option function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_customize_post_option( $wp_customize ) {

	$wp_customize->add_section(
		'd_kaigi_post_section',
		array(
			'title'    => esc_html__( 'Post Options', 'd-kaigi' ),
			'panel'    => 'd_kaigi_general_panel',
			'priority' => 1,
		)
	);

	$wp_customize->add_setting(
		'show_author',
		array(
			'sanitize_callback' => 'd_kaigi_sanitize_checkbox',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Toggle_Control(
			$wp_customize,
			'show_author',
			array(
				'label'    => esc_html__( 'Hide / Show Author Section', 'd-kaigi' ),
				'section'  => 'd_kaigi_post_section',
				'settings' => 'show_author',
				'type'     => 'toggle',
			)
		)
	);
}
