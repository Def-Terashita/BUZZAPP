<?php
/**
 * Shop Settings
 *
 * @package d-kaigi
 */

add_action( 'customize_register', 'd_kaigi_customize_register_category_news' );

/**
 * D kaigi customize register category news function
 *
 * @param object $wp_customize .
 * @return void
 */
function d_kaigi_customize_register_category_news( $wp_customize ) {
	$wp_customize->add_section(
		'd_kaigi_category_news_sections',
		array(
			'title'    => esc_html__( 'Category News', 'd-kaigi' ),
			'panel'    => 'd_kaigi_theme_options_panel',
			'priority' => 5,
		)
	);

	$wp_customize->add_setting(
		'category_news_display_option',
		array(
			'sanitize_callback' => 'd_kaigi_sanitize_checkbox',
			'default'           => false,
		)
	);

	$wp_customize->add_control(
		new d_kaigi_Toggle_Control(
			$wp_customize,
			'category_news_display_option',
			array(
				'label'    => esc_html__( 'Hide / Show', 'd-kaigi' ),
				'section'  => 'd_kaigi_category_news_sections',
				'settings' => 'category_news_display_option',
				'type'     => 'toggle',
			)
		)
	);

	for ( $i = 1; $i <= 2; $i++ ) {

		$wp_customize->add_setting(
			'category_title_' . $i,
			array(
				'sanitize_callback' => 'wp_kses_post',
				'default'           => '',
			)
		);

		$wp_customize->add_control(
			'category_title_' . $i,
			array(
				'label'    => esc_attr__( 'Category Title', 'd-kaigi' ) . ' ' . $i,
				'section'  => 'd_kaigi_category_news_sections',
				'settings' => 'category_title_' . $i,
				'type'     => 'text',
			)
		);

		$wp_customize->add_setting(
			'category_news_' . $i,
			array(
				'sanitize_callback' => 'd_kaigi_sanitize_category',
				'default'           => '',
			)
		);

		$wp_customize->add_control(
			new d_kaigi_Customize_Dropdown_Taxonomies_Control(
				$wp_customize,
				'category_news_' . $i,
				array(
					'label'    => esc_attr__( 'Choose Category', 'd-kaigi' ) . ' ' . $i,
					'section'  => 'd_kaigi_category_news_sections',
					'settings' => 'category_news_' . $i,
					'type'     => 'dropdown-taxonomies',
				)
			)
		);
	}
}
