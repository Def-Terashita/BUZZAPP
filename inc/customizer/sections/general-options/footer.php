<?php
/**
 * Footer Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_customize_register_footer_section' );

/**
 * D kaigi customize register footer section function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_customize_register_footer_section( $wp_customize ) {

	$wp_customize->add_section(
		'd_kaigi_footer_section',
		array(
			'title'    => esc_html__( 'Footer / Copyright', 'd-kaigi' ),
			'panel'    => 'd_kaigi_general_panel',
			'priority' => 3,
		)
	);

	$wp_customize->add_setting(
		'copyright_edit_option',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Custom_Text(
			$wp_customize,
			'copyright_edit_option',
			array(
				'label'    => esc_html__( 'Footer Copyright text can be edited in Pro Version.', 'd-kaigi' ),
				'section'  => 'd_kaigi_footer_section',
				'settings' => 'copyright_edit_option',
			)
		)
	);
}
