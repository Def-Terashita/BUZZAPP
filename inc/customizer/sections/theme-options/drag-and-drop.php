<?php
/**
 * Drag & Drop Sections
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_drag_and_drop_sections' );

/**
 * D kaigi drag and drop sections function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_drag_and_drop_sections( $wp_customize ) {

	$wp_customize->add_section(
		'd_kaigi_sort_homepage_sections',
		array(
			'title'    => esc_html__( 'Drag & Drop', 'd-kaigi' ),
			'panel'    => 'd_kaigi_theme_options_panel',
			'priority' => 6,
		)
	);

	$wp_customize->add_setting(
		'reorder_news_section',
		array(
			'sanitize_callback' => 'wp_kses_post',
			'default'           => '',
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Custom_Text(
			$wp_customize,
			'reorder_news_section',
			array(
				'label'    => esc_html__( 'This feature is available in Pro Version.', 'd-kaigi' ),
				'section'  => 'd_kaigi_sort_homepage_sections',
				'settings' => 'reorder_news_section',
				'type'     => 'customtext',
			)
		)
	);
}
