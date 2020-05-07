<?php
/**
 * Site Identity Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_change_site_identity_panel' );

/**
 * D kaigi change site identity panel function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_change_site_identity_panel( $wp_customize ) {
	$wp_customize->get_section( 'title_tagline' )->priority    = 3;
	$wp_customize->get_section( 'title_tagline' )->panel       = 'd_kaigi_header_panel';
	$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
}
