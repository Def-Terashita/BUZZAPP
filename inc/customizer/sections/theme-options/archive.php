<?php
/**
 * Shop Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_customize_register_archive_news' );

/**
 * Undocumented function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_customize_register_archive_news( $wp_customize ) {
	$wp_customize->add_section(
		'd_kaigi_archive_news_sections',
		array(
			'title'    => esc_html__( 'Archive News', 'd-kaigi' ),
			'panel'    => 'd_kaigi_theme_options_panel',
			'priority' => 5,
		)
	);

	$wp_customize->add_setting(
		'archive_news_display_option',
		array(
			'sanitize_callback' => 'd_kaigi_sanitize_checkbox',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Toggle_Control(
			$wp_customize,
			'archive_news_display_option',
			array(
				'label'    => esc_html__( 'Hide / Show', 'd-kaigi' ),
				'section'  => 'd_kaigi_archive_news_sections',
				'settings' => 'archive_news_display_option',
				'type'     => 'toggle',
			)
		)
	);

	$wp_customize->add_setting(
		'archive_news_section_title',
		array(
			'sanitize_callback' => 'wp_kses_post',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		'archive_news_section_title',
		array(
			'label'    => esc_html__( 'Title', 'd-kaigi' ),
			'section'  => 'd_kaigi_archive_news_sections',
			'settings' => 'archive_news_section_title',
			'type'     => 'text',
		)
	);

	$wp_customize->add_setting(
		'archive_news_category',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'd_kaigi_sanitize_category',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Customize_Dropdown_Taxonomies_Control(
			$wp_customize,
			'archive_news_category',
			array(
				'label'    => esc_html__( 'Choose Category', 'd-kaigi' ),
				'section'  => 'd_kaigi_archive_news_sections',
				'settings' => 'archive_news_category',
				'type'     => 'dropdown-taxonomies',
			)
		)
	);
}
