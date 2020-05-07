<?php
/**
 * Header Image Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_change_header_image_panel' );

/**
 * D kaigi change header image panel function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_change_header_image_panel( $wp_customize ) {
	$wp_customize->get_section( 'header_image' )->priority = 1;
	$wp_customize->get_section( 'header_image' )->panel    = 'd_kaigi_header_panel';
}
