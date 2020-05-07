<?php
/**
 * General Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_customize_register_general_panel' );

/**
 * D kaigi customize register general panel function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_customize_register_general_panel( $wp_customize ) {
	$wp_customize->add_panel(
		'd_kaigi_general_panel',
		array(
			'priority'    => 10,
			'title'       => esc_html__( 'General Options', 'd-kaigi' ),
			'description' => esc_html__( 'General Options', 'd-kaigi' ),
		)
	);
}
