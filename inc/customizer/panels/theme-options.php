<?php
/**
 * Homepage Settings
 *
 * @package Magazine Newspaper
 */

add_action( 'customize_register', 'd_kaigi_customize_register_theme_options_panel' );

/**
 * D kaigi customize register theme options panel function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_customize_register_theme_options_panel( $wp_customize ) {
	$wp_customize->add_panel(
		'd_kaigi_theme_options_panel',
		array(
			'priority'    => 12,
			'title'       => esc_html__( 'Theme Options', 'd-kaigi' ),
			'description' => esc_html__( 'Theme Options', 'd-kaigi' ),
		)
	);
}
