<?php
/**
 * Header Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_customize_register_header_panel' );

/**
 * D kaigi customize register header panel function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_customize_register_header_panel( $wp_customize ) {
	$wp_customize->add_panel(
		'd_kaigi_header_panel',
		array(
			'priority'    => 11,
			'title'       => esc_html__( 'Header Options', 'd-kaigi' ),
			'description' => esc_html__( 'Header Options', 'd-kaigi' ),
		)
	);
}
