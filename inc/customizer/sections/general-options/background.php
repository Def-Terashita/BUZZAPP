<?php
/**
 * Background Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_change_background_panel' );

/**
 * D kaigi change background panel function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_change_background_panel( $wp_customize ) {
	$wp_customize->get_section( 'background_image' )->priority = 4;
	$wp_customize->get_section( 'background_image' )->panel    = 'd_kaigi_general_panel';
}
