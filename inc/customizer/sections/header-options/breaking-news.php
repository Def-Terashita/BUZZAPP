<?php
/**
 * Header Layout Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_breaking_news_section' );

/**
 * D kaigi breaking news section function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_breaking_news_section( $wp_customize ) {

	$wp_customize->add_section(
		'd_kaigi_breaking_news_section',
		array(
			'title'       => esc_html__( 'Breaking News', 'd-kaigi' ),
			'description' => esc_html__( 'Breaking News', 'd-kaigi' ),
			'panel'       => 'd_kaigi_header_panel',
			'priority'    => 2,
			'capability'  => 'edit_theme_options',
		)
	);

	$wp_customize->add_setting(
		'breaking_news_display',
		array(
			'sanitize_callback' => 'd_kaigi_sanitize_checkbox',
			'default'           => true,
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Toggle_Control(
			$wp_customize,
			'breaking_news_display',
			array(
				'label'    => esc_attr__( 'Show / Hide Breaking News', 'd-kaigi' ),
				'section'  => 'd_kaigi_breaking_news_section',
				'settings' => 'breaking_news_display',
				'type'     => 'toggle',
			)
		)
	);

	$wp_customize->add_setting(
		'breaking_news_section_title',
		array(
			'sanitize_callback' => 'wp_kses_post',
			'default'           => esc_attr__( 'Breaking News', 'd-kaigi' ),
		)
	);

	$wp_customize->add_control(
		'breaking_news_section_title',
		array(
			'label'    => esc_attr__( 'Title', 'd-kaigi' ),
			'section'  => 'd_kaigi_breaking_news_section',
			'settings' => 'breaking_news_section_title',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'breaking_news_category',
		array(
			'sanitize_callback' => 'd_kaigi_sanitize_category',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Customize_Dropdown_Taxonomies_Control(
			$wp_customize,
			'breaking_news_category',
			array(
				'label'    => esc_attr__( 'Choose category', 'd-kaigi' ),
				'section'  => 'd_kaigi_breaking_news_section',
				'settings' => 'breaking_news_category',
				'type'     => 'dropdown-taxonomies',
			)
		)
	);
}
